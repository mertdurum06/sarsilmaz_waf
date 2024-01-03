<?php
require_once "D:/xamp/htdocs/sarsilmaz_waf.php";
// Unauthorized istemcilerin waf ile ilgili modüllere ulaşamaması için HTTP üzerinde çalışan bir basic authentication fonksiyonu.
function httpBasicAuth() {
	$user = 'admin';
	$pass = 'admin';
	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	$creds = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$authOlamayinca = (
		!$creds ||
		$_SERVER['PHP_AUTH_USER'] != $user ||
		$_SERVER['PHP_AUTH_PW']   != $pass
	);
	if ($authOlamayinca) {
		header('HTTP/1.1 401 Authorization Required');
		header('WWW-Authenticate: Basic realm="Access denied"');
		exit;
	}
}
httpBasicAuth();
// Gerekli kütüphaneleri yüklüyoruz
require "D:/xamp/htdocs/vendor/autoload.php";
use Symfony\Component\Yaml\Yaml;

// rules.yaml dosyasından kuralları al
$rulefile = Yaml::parseFile('D:/xamp/htdocs/sarsilmaz_rules.yaml');

// Yeni kural ekleme ve silme işlemleri
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleteId = $_POST['delete_id'];
    $deleteRule = $_POST['delete_rule'];

    // Eğer id ve kural eşleşmesi varsa, kuralı sil
    foreach ($rulefile as $key => $rule) {
        if ($rule['id'] === $deleteId && in_array($deleteRule, $rule['rule'])) {
            // İlgili kuralı sil
            unset($rulefile[$key]['rule'][array_search($deleteRule, $rule['rule'])]);
            // Eğer kuralın altındaki kurallar tamamen silindiyse, ana kuralı da sil
            if (empty($rulefile[$key]['rule'])) {
                unset($rulefile[$key]);
            }
            break;
        }
    }

    // rules.yaml dosyasına güncellenmiş kuralları yaz
    file_put_contents('D:/xamp/htdocs/sarsilmaz_rules.yaml', Yaml::dump($rulefile), LOCK_EX);

    // Başarılı silme mesajı
    echo "<script>alert('Kural başarıyla silindi!');</script>";
    // 3 saniye sonra aynı sayfaya yönlendir
    header("Refresh:0; url=D:/xamp/htdocs/sarsilmaz_dash.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='icon' type='image/x-icon' href='./sarsilmaz_icon.png'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarsılmaz | Kural Sil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #252525;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background: red;
            color: #fff;
            cursor: pointer;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sarsılmaz Kural Silme</h1>
        <form method="POST">
            <label for="delete_id">ID:</label><br>
            <input type="text" id="delete_id" name="delete_id"><br>
            <label for="delete_rule">Rule:</label><br>
            <input type="text" id="delete_rule" name="delete_rule"><br><br>
            <input type="submit" value="Sil">
        </form>
    </div>
</body>
</html>
