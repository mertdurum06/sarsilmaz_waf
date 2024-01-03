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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='icon' type='image/x-icon' href='./sarsilmaz_icon.png'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarsılmaz | Panel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #000000;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #fff;
        }
        .buton1 {
            background: green;
            width: 20%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .buton2 {
            background: red;
            width: 20%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .buton3 {
            background: #2f4f4f;
            width: 20%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    <div class="container">
    <h1>SARSILMAZ</h1>

    <div class='buton1' onclick="window.location.href='D:/xamp/htdocs/sarsilmaz_ekle.php'">
        <center><a style="color: white;">KURAL EKLE</a></center>
    </div>
    <div class='buton2' onclick="window.location.href='D:/xamp/htdocs/sarsilmaz_sil.php'">
        <center><a style="color: white;">KURAL SİL</a></center>
    </div>
    <div class='buton3' onclick="window.location.href='D:/xamp/htdocs/sarsilmaz_goruntule.php'">
        <center><a style="color: white;">KURAL GÖRÜNTÜLE</a></center>
    </div>
    </div>
</body>
</html>
