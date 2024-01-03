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

// Yeni kural ekleme işlemleri
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newId = $_POST['id'];
    $newLog = $_POST['log'];
    $newRule = $_POST['rule'];

    $isNewRule = true; // Yeni bir kural ekleneceğini varsayalım

    // Eğer aynı id veya log mevcutsa sadece rules bölümüne ekleme yap
    foreach ($rulefile as $key => $rule) {
        if ($rule['id'] === $newId || $rule['log'] === $newLog) {
            $rulefile[$key]['rule'][] = $newRule;
            $isNewRule = false; // Yeni bir kural eklenmeyecek
            break;
        }
    }

    // Yeni kural eklenmediyse, yeni kuralı dosyaya ekle
    if ($isNewRule) {
        $newRuleData = "- id: " . $newId . "\n  log: " . $newLog . "\n  rule:\n    - " . $newRule . "\n\n";
        file_put_contents('D:/xamp/htdocs/sarsilmaz_rules.yaml', $newRuleData, FILE_APPEND | LOCK_EX);
    } else {
        // Kuralları YAML dosyasına tekrar yaz
        file_put_contents('D:/xamp/htdocs/sarsilmaz_rules.yaml', Yaml::dump($rulefile), LOCK_EX);
    }

    // Başarılı ekleme mesajı
    echo "<script>alert('Yeni kural başarıyla eklendi!');</script>";
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
    <title>Sarsılmaz | Kural Ekle</title>
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
            background: #4caf50;
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
        <h1>Sarsılmaz Yeni Kural</h1>
        <form method="POST">
            <label for="id">ID:</label><br>
            <input type="text" id="id" name="id"><br>
            <label for="log">Log:</label><br>
            <input type="text" id="log" name="log"><br>
            <label for="rule">Rule:</label><br>
            <input type="text" id="rule" name="rule"><br><br>
            <input type="submit" value="Ekle">
        </form>
    </div>
</body>
</html>
