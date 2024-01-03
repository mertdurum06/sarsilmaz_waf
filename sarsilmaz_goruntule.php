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
    <title>Sarsılmaz | Kural Listesi</title>
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
        .rule {
            background: #fff;
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .rule h3 {
            margin: 0;
            color: #333;
        }
        .rule p {
            color: #666;
            margin: 10px 0 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sarsılmaz WAF Kural Listesi</h1>
        <?php
        require "D:/xamp/htdocs/vendor/autoload.php";
        use Symfony\Component\Yaml\Yaml;

        // rules.yaml dosyasından kuralları çek
        $rules = Yaml::parseFile('D:/xamp/htdocs/sarsilmaz_rules.yaml');
        
        // Kuralları göster
        foreach ($rules as $rule) {
            echo "<div class='rule'>
                    <h3>ID: " . htmlspecialchars($rule['id']) . "</h3>
                    <p>Log: " . htmlspecialchars($rule['log']) . "</p>
                    <p>Rule: " . htmlspecialchars(implode(', ', $rule['rule'])) . "</p>
                </div>";
        }
        ?>
    </div>
</body>
</html>
