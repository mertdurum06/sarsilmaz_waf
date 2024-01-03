<?php

session_start();

if(!isset($_SESSION["login"]))
    {
 
    header("Location: /admin/login.php");
     
    }

    $veritabani = new PDO("mysql:dbname=users;host=localhost","root","");
    $sorgu = $veritabani->prepare("SELECT COUNT(*) FROM user");
    $sorgu->execute();
    $say = $sorgu->fetchColumn();

    $sorgu2 = $veritabani->prepare("SELECT COUNT(*) FROM haberler");
    $sorgu2->execute();
    $say2 = $sorgu2->fetchColumn();

    $sorgu3 = $veritabani->prepare("SELECT COUNT(*) FROM duyurular");
    $sorgu3->execute();
    $say3 = $sorgu3->fetchColumn();
    $username = $_SESSION['username'];
    
?>

<!DOCTYPE html>
<html lang="tr" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="/admin/sarsılmaz.png" type="image/x-icon" />
  <title>SCS | Yönetim Paneli</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
  <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
    <img
         class="rounded-pill img-fluid"
         width="65"
         src="/admin/sarsılmaz.png">
         <br>
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <a class="text-decoration-none"></a>
      </h5>
    </div>
  </div>

  <ul class="list-unstyled">
    <li class="has-dropdown">
      <i class="uil-estate fa-fw"></i><a href="/admin/index.php">Fonksiyonlar</a>
      <ul>
        <li><a href="/admin/haberler.php">Haberler</a></li>
        <li><a href="/admin/haber-ekle.php">Haber Ekle</a></li>
        <li><a href="/admin/haber-duzenle.php">Haber Düzenle</a></li>
        <li><a href="/admin/haber-sil.php">Haber Sil</a></li>
        <br>
        <li><a href="/admin/duyurular.php">Duyurular</a></li>
        <li><a href="/admin/duyuru-ekle.php">Duyuru Ekle</a></li>
        <li><a href="/admin/duyuru-duzenle.php">Duyuru Düzenle</a></li>
        <li><a href="/admin/duyuru-sil.php">Duyuru Sil</a></li>
      </ul>
    </li>

    <li class="has-dropdown">
      <i class="uil-estate fa-fw"></i><a href="/admin/index.php">Site Ayarları</a>
      <ul>
        <li><a href="/admin/site-baslik.php">Başlık Yazısı</a></li>
      </ul>
    </li>

    <li class="has-dropdown">
      <i class="uil-calendar-alt"></i><a href="/admin/index.php">Ayarlar</a>
      <ul>
        <li><a href="/admin/kullanici-islemleri.php">Panel Ayarları</a></li>
        <li><a href="/admin/cikis.php">Çıkış Yap</a></li>
      </ul>
    </li>
</aside>

<section id="wrapper">
  <nav class="navbar navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="uil-bars text-white"></i>
        </button>
        <a class="navbar-brand">Sarsılmaz Cyber  <span class="main-color">Security</span></a>
      </div>
      <div class="collapse navbar-collapse" id="toggle-navbar">
        <ul class="navbar-nav ms-auto">
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="p-4">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <center><h1 class="fs-3">Haber Sil</h1></center>
      </div>
    </div>

    <section class="statistics mt-4">
      <div class="row">
        <div class="col-lg-4">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-envelope-shield fs-2 text-center bg-primary rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0"><?php echo $say2; ?></h3> <span class="d-block ms-2">Haber</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-file fs-2 text-center bg-danger rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0"><?php echo $say3; ?></h3> <span class="d-block ms-2">Duyuru</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="box d-flex rounded-2 align-items-center p-3">
            <i class="uil-users-alt fs-2 text-center bg-success rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0"><?php echo $say; ?></h3> <span class="d-block ms-2">Kullanıcı</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>

    <div>
        <form action="h-sil.php" method="POST">
        <div class="p-4">
        <div class="welcome">
        <div class="content rounded-3 p-3">

          <label>ID : </label>
            <input type="number" name="id" id="id" style="background: transparent; border: none; color: white;" required="yes">
          </div>

          <br>

          <div class="content rounded-3 p-3">
            <center><a><input type="submit" style="background: transparent; border: none; color: red;" value="Haberi Sil" /></a></center>
          </div>
          
        </div>
        </div>
        </form>
    </div>
    
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.jshttps://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script><script  src="./script.js"></script>

</body>
</html>