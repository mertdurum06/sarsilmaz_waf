<?php
require_once "sarsilmaz_waf.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>IP Ping</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #1b1d44;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        form {
            text-align: center;
            padding: 20px;
        }
        input[type="text"] {
            padding: 5px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1b4d1b;
        }
        .result {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>IP Ping</h1>
        <p>Ping sonuçlarına erişin</p>
    </header>
    
    <form method="get">
        <input type="text" name="ip" placeholder="IP adresi girin">
        <input type="submit" value="Ping Gönder">
    </form>

    <?php
    
    if (isset($_GET['ip']) && !empty($_GET['ip'])) {
        $target = $_GET['ip'];
        $cmd = shell_exec("ping " . $target);
        echo '<div class="result"><pre>' . $cmd . '</pre></div>';
    } else {
        echo '<div class="result">Parametre eksik veya boş.</div>';
    }
    ?>
</body>
</html>
