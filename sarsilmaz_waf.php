<?php
// error_reporting'i 0 olarak set ederek programalama hata mesajları client'a bastırılmaz.
error_reporting(0);

// Gerekli kütüphaneleri yüklüyoruz.
require "D:/xamp/htdocs/vendor/autoload.php";
use Symfony\Component\Yaml\Yaml;

// TELEGRAM Api
$telegram_api = "#";

// Kuralların bulunduğu kural listesi dosyamızı import ve parse ediyoruz.
$rulefile = Yaml::parseFile('D:/xamp/htdocs/sarsilmaz_rules.yaml');

// HTTP req alıyoruz. Ayrıca tüm harfleri küçük harfe çeviriyoruz. Böylece büyük harflerle gönderilen payloadlarda wafımıza takılabiliyor.
$uriRequest = strtolower($_SERVER['REQUEST_URI']);

// İstemci ip alıyoruz.
$clientip = $_SERVER['REMOTE_ADDR'];

// URI'de kontrol sağlıyoruz.
foreach ($rulefile as $rule) {
    $id = $rule['id'];
    $log = $rule['log'];
    $rules = $rule['rule'];
    // Kurallarla bir eşleşme varsa önce loglama fonksiyonu daha sonra engelleme fonksiyonu devreye giriyor.
    foreach ($rules as $pattern) {
        if (stripos($uriRequest, $pattern) !== false) {
            urilogla($telegram_api,$log,$clientip);
            engelle($clientip,$log);
        }
    }
}

// BODY'de kontrol sağlıyoruz.
$body = file_get_contents('php://input');
foreach ($rulefile as $rule) {
    $id = $rule['id'];
    $log = $rule['log'];
    $rules = $rule['rule'];
    // Kurallarla bir eşleşme varsa önce loglama fonksiyonu daha sonra engelleme fonksiyonu devreye giriyor.
    foreach ($rules as $pattern) {
        if (stripos($body, $pattern) !== false) {
            bodylogla($telegram_api,$log,$clientip,$body);
            engelle($clientip,$log);
        }
    }
}

// HEADER'larda kontrol sağlıyoruz.
foreach (getallheaders() as $headers => $hvalues) {
    foreach ($rulefile as $rule) {
        $id = $rule['id'];
        $log = $rule['log'];
        $rules = $rule['rule'];
        // Kurallarla bir eşleşme varsa önce loglama fonksiyonu daha sonra engelleme fonksiyonu devreye giriyor.
        foreach ($rules as $pattern) {
            if (stripos($hvalues, $pattern) !== false) {
                headerlogla($telegram_api,$log,$clientip,$headers,$hvalues);
                engelle($clientip,$log);
            }
        }
    }
}

// URI Log mesajını kaydetme işlevi.
function urilogla($telegram_api,$log,$clientip) {
    // logları sarsilmaz_log.log'a kaydediyoruz.
    file_put_contents('D:/xamp/htdocs/sarsilmaz_log.log', 'TARIH: '. date('Y-m-d H:i:s') . ' | BULGU: ' . $log . ' | URI: ' . $_SERVER['REQUEST_URI'] . ' | CLIENT: ' . $clientip . "\n", FILE_APPEND);
    // Telegram botuna ilgili log kaydı notify ediliyor.
    function telegramaUriGonder($telegram_api,$log,$clientip){
        $data = [
            'chat_id' => '',
            'text' => 'TARIH: '. date('Y-m-d H:i:s').' | BULGU: '.$log.' | URI: '.$_SERVER['REQUEST_URI'].' | CLIENT: '.$clientip
      ];
      $response = file_get_contents("https://api.telegram.org/bot$telegram_api/sendMessage?" . http_build_query($data) );
    }
    telegramaUriGonder($telegram_api,$log,$clientip);
}

// HEADER Log mesajını kaydetme işlevi.
function headerlogla($telegram_api,$log,$clientip,$headers,$hvalues) {
    // logları sarsilmaz_log.log'a kaydediyoruz.
    file_put_contents('D:/xamp/htdocs/sarsilmaz_log.log','TARIH: '. date('Y-m-d H:i:s') . ' | BULGU: ' . $log . ' | HEADER: ' . $headers . ' | VALUE: ' . $hvalues . ' | CLIENT: ' . $clientip . "\n", FILE_APPEND);
    // Telegram botuna ilgili log kaydı notify ediliyor.    
    function telegramaHeaderGonder($telegram_api,$log,$clientip,$headers,$hvalues){
        $data = [
            'chat_id' => '',
            'text' => 'TARIH: '. date('Y-m-d H:i:s').' | BULGU: ' . $log . ' | HEADER: ' . $headers . ' | VALUE: ' . $hvalues . ' | CLIENT: ' . $clientip 
      ];
      $response = file_get_contents("https://api.telegram.org/bot$telegram_api/sendMessage?" . http_build_query($data) );
    }
    telegramaHeaderGonder($telegram_api,$log,$clientip,$headers,$hvalues);
}

// BODY Log mesajını kaydetme işlevi.
function bodylogla($telegram_api,$log,$clientip,$body) {
    // logları sarsilmaz_log.log'a kaydediyoruz.
    file_put_contents('D:/xamp/htdocs/sarsilmaz_log.log','TARIH: '. date('Y-m-d H:i:s') . ' | BULGU: ' . $log . ' | BODY: ' . $body .'  | CLIENT: ' . $clientip . "\n", FILE_APPEND);
    // Telegram botuna ilgili log kaydı notify ediliyor.
    function telegramaBodyGonder($telegram_api,$log,$body,$clientip){
        $data = [
            'chat_id' => '',
            'text' => 'TARIH: '. date('Y-m-d H:i:s').' | BULGU: '.$log.' | BODY: ' . $body. ' | CLIENT: '.$clientip
      ];
      $response = file_get_contents("https://api.telegram.org/bot$telegram_api/sendMessage?" . http_build_query($data) );
    }
    telegramaBodyGonder($telegram_api,$log,$body,$clientip);
}

// İstekleri blokluyoruz.
function engelle($clientip,$log) {
    // İstekleri 403 hata kodu ile blokluyoruz ve 403 hata mesajını istemciye render ettiriyoruz.
    http_response_code(403);
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<link rel='icon' type='image/x-icon' href='./sarsilmaz_icon.png'>";
    echo "<title>BLOCKLANDINIZ</title>";
    echo "<link rel='stylesheet' href='./sarsilmaz_blocked.css'>";
    echo "</head>";
    echo "<body>";
    echo "<!DOCTYPE html>";
    echo "<meta charset='UTF-8'>";
    echo "<head>";
    echo "<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>";    echo "</head>";
    echo "<body>";
    echo "<svg xmlns='http://www.w3.org/2000/svg' id='robot-error' viewBox='0 0 260 118.9'>";
    echo "<defs>";
    echo "<clipPath id='white-clip'>";
    echo "<circle id='white-eye' fill='#cacaca' cx='130' cy='65' r='20'/>";
    echo "</clipPath>";
    echo "<text id='text-s' class='error-text' y='106'> 403</text>";
    echo "</defs>";
    echo "<path class='alarm' fill='#e62326' d='M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6'/>";
    echo "<use xlink:href='#text-s' x='-0.5px' y='-1px' fill='black'></use>";
    echo "<use xlink:href='#text-s' fill='#2b2b2b'></use>";
    echo "<g id='robot'>";
    echo "<g id='eye-wrap'>";
    echo "<use xlink:href='#white-eye'></use>";
    echo "<circle id='eyef' class='eye' clip-path='url(#white-clip)' fill='#000' stroke='#2aa7cc' stroke-width='2' stroke-miterlimit='10' cx='130' cy='65' r='11'/>";
    echo "<ellipse id='white-eye' fill='#2b2b2b' cx='130' cy='40' rx='18' ry='12' />";
    echo "</g>";
    echo "<circle class='lightblue' cx='105' cy='32' r='2.5' id='tornillo' />";
    echo "<use xlink:href='#tornillo' x='50'></use>";
    echo "<use xlink:href='#tornillo' x='50' y='60'></use>";
    echo "<use xlink:href='#tornillo' y='60'></use>";
    echo "</g>";
    echo "</svg>";
    echo "<h1>SARSILMAZ</h1>";
    echo "<h2>$log</h2>";
    echo "<h3>IP ADRESINIZ : $clientip</h3>";
    echo "<script>";
    echo "var root = document.documentElement;";
    echo "var eyef = document.getElementById('eyef');";
    echo "var cx = document.getElementById('eyef').getAttribute('cx');";
    echo "var cy = document.getElementById('eyef').getAttribute('cy');";
    echo "document.addEventListener('mousemove', evt => {";
    echo "let x = evt.clientX / innerWidth;";
    echo "let y = evt.clientY / innerHeight;";
    echo "root.style.setProperty('--mouse-x', x);";
    echo "root.style.setProperty('--mouse-y', y);";
    echo "cx = 115 + 30 * x;";
    echo "cy = 50 + 30 * y;";
    echo "eyef.setAttribute('cx', cx);";
    echo "eyef.setAttribute('cy', cy);";
    echo "});";
    echo "document.addEventListener('touchmove', touchHandler => {";
    echo "let x = touchHandler.touches[0].clientX / innerWidth;";
    echo "let y = touchHandler.touches[0].clientY / innerHeight;";
    echo "root.style.setProperty('--mouse-x', x);";
    echo "root.style.setProperty('--mouse-y', y);";
    echo "});";
    echo "</script>";
    echo "</body>";
    echo "</html>";  
// İsteği en sonda öldürüyoruz.
    die();
}
?>

