<?php
require_once "sarsilmaz_waf.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sitemap Dosyası</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #1b1d44;
            text-align: center;
            padding: 20px;
            color:white;
        }
        .content {
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
        <h1>Sitemap Dosyası</h1>
        <p>Dosya içeriği aşağıda gösteriliyor.</p>
    </header>

    <div class="content">
        <?php
        
        if (isset($_GET["file"])) {
            $dosya = $_GET["file"];
            $dosyaYolu = "./sitemap/" . $dosya;

            if (file_exists($dosyaYolu)) {
                include $dosyaYolu;
            } else {
                echo "Belirtilen dosya bulunamadı.";
            }
        } else {
            echo "Dosya adı belirtilmedi.";
        }
        ?>
    </div>
</body>
</html>
