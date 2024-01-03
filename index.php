<?php
require_once "sarsilmaz_waf.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<?php 

                  
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = '';
$DB_NAME = "users";
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$basliksorgu = "SELECT baslik FROM site";
$baslik = mysqli_query($con, $basliksorgu);
while ($row = $baslik->fetch_assoc()) {
    echo "<title>".$row['baslik']."</title>";
}
?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="sarsılmaz.png" type="image/x-icon" />
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
  </script>
  <script  src="script.js"></script>

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.topnav a:hover {
  background-color: #ddd;
  color: black;
}


.topnav .search-container {
  position: absolute;

      left: +85px;
      top: 10px;
  border:box;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  color: black;
}

.topnav .search-container button {
  position:absolute;
  left: 230px;
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
</style>
<script src="main.js"></script>
<body >

<section class="navigation">
  <div class="nav-container">
  
    <div class="brand">
     
           <img src="sarsılmaz.png" height="70px"></a> 
    </div>
   
 
    <nav>
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
     
      <ul class="nav-list" >
        <li>
          <a href="#!">Anasayfa</a>
          
        </li>
        <li>
          <a href="#!">Hizmetler</a>
          <ul class="nav-dropdown" >
            <li>
            <a href="#!">içerik</a>
            <a href="#!">içerik</a>
            <a href="#!">içerik</a>
              <li>
              <a href="#!"><h3>içerik</h3></a> 
             <li>                
               <a href="#!"></a>
            </li>
            </ul>                
            </li>
        <li>
          <a href="#!">Ürünler</a>
           <ul class="nav-dropdown">
            <li>
              <a href="#!"></a>
            
         </li>
            <li>
              <a href="#!"></a>
          </li>
            
          <li>
              <a href="#!"></a>
          </li>  
          </ul>
          
        </li>
        </li>
        
        <li>
          <a href="#!">Kariyer</a>
          <ul class="nav-dropdown">
            <li>
            <a href="#!"> </a>
              <a href="#!"></a>
        </li>
            <li>
            <a href="#!"> </a>
              <a href="#!"> </a>
            </li>
         <li>
            <a href="#!"> </a>
         </li>
          </ul>
        </li>
        <li>
          <a href="#!">Çözümlerimiz</a>
          <ul class="nav-dropdown">
        </li>
        <li>
             <a href="#!"></a>
      </li>
            <li>
              <a href="#!"></a>
            </li>
            <li>
              <a href="#!"></a>
          </li>
          </ul>
        
        <li>
          <a href="sitemap.php">Sitemap</a>
          <ul class="nav-dropdown">
      
           
          </ul>
        </li>
         <li>
          <a href="status.php">Status</a>
        
        <div class="topnav">
 
  <div class="search-container">
    <form action="arama.php">
      <input type="text" placeholder="aranan" name="aranan">
      <button type="submit"><i class="fa fa-search"></i></button>
      
    </form>
  </div>
</div>
      </ul>
    </nav>
    
  </div>
</section>



<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="sizma_testi.jpg" style="width:100%" height="550px">
  
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="penet.jpg" style="width:100%" height="550px">
  
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="web.svg" style="width:100%" height="550px">
  
</div>
<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="2.jpg"  style="width:100%" height="550px" >

</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides,1900 ) 
}
</script>


<div class="main">
<div class="row">
<?php                             
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = '';
$DB_NAME = "users";
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$haberler_sorgu = "SELECT baslik, aciklama, gorsel FROM haberler";
$haberler_cevap = $con->query($haberler_sorgu);

if($haberler_cevap->num_rows > 0) {
  while($row = $haberler_cevap->fetch_assoc()) {
        echo "<div class='column'>\n";
        echo "<div class='content'>\n";
        echo "<h3>".$row["baslik"]."</h3>\n";
        echo "<img src='".$row["gorsel"]."' height=150px width=185px>\n";  
        echo "<p>".$row["aciklama"]."</p>\n";
        echo "</div>\n";
        echo "</div>\n";
                              
    }
} 
?>
</div>
</div>


<table class="sl_duyuru">
<tr>
<?php                             
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = '';
$DB_NAME = "users";
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$duyurular_sorgu = "SELECT baslik, aciklama, link FROM duyurular";
$duyurular_cevap = $con->query($duyurular_sorgu);

if($duyurular_cevap->num_rows > 0) {
  while($row = $duyurular_cevap->fetch_assoc()) {
       echo "<td class='sl_duyuru_ikon'><i class='fa fa-paper-plane-o' aria-hidden='true'></i></td>";
        echo "<td class='sl_duyuru_baslik'>";
        echo "<b>".$row["baslik"]."</b>";
        echo "</td>"; 
        echo "<td>".$row["aciklama"]."<a href='".$row["link"]."'> tıklayınız...</a>\n";
        echo "</td>";
        echo "\n";                               
    }
} 
?>
</tr>
</table>

<script src="https://use.fontawesome.com/02e491ef33.js"></script>
<div class="container"></div>
<footer>
 
  <section class="ft-main">
    <div class="ft-main-item">
      <h2 class="ft-title">Hakkımızda</h2>
      <ul>
      Sarsılmaz Cyber Security, 2019 yılında Mert Durum ve Yunus Emre Aslan tarafında Ankara Odtü Teknokent'te kurulmuştur.
       <br> Şirketin faaliyet alanları Sızma Testi,Red Team veWeb Uygulama Güvenliği üzerinedir.<br> Şirket bünyesinde çalışanlar Siber Güvenlik Uzmanı Pozisyonundadır.
       
       <br>
       <br>
      <h2 class="ft-title"><a href="/admin/login.php">Admin Girişi </a></h2>
    </ul>
    </div>


    <div class="ft-main-item">
      <h2 class="ft-title">Kaynaklar</h2>
      <ul>
        
        <li><a href="">Geziler</a></li>
        <li><a href="#">Seminerler</a></li>
        <li><a href="#">Fotoğraflar</a></li>
      </ul>
    </div>
    <div class="ft-main-item">
      <h2 class="ft-title">İletişim</h2>
      <ul>
     <li><a href="mailto:info@sarsilmaz.com.tr">E-posta <br> </a>info@sarsilmaz.com.tr</li>
        <li><a href="tel:+90 312 378 2019">Telefon <br></a> +90 312 378 2019</li>
        <li><a href="mailto:danişmanlik@sarsilmaz.com.tr">Danışmanlık ve Hizmetler<br></a>danişmanlik@sarsilmaz.com.tr</li>
      </ul>
    </div>
    </div>
  </section>

 
  <section class="ft-social">
    <ul class="ft-social-list">
      <li><a href="https://www.facebook.com/sarsılmazcyber"><i class="fab fa-facebook"></i></a></li>
      <li><a href="https://twitter.com/sarsılmazcyber"><i class="fab fa-twitter"></i></a></li>
      <li><a href="https://www.instagram.com/sarsılmazcyber"><i class="fab fa-instagram"></i></a></li>
      
      <li><a href="https://www.youtube.com/channel/sarsılmazcybersecurıty"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </section>


  <section class="ft-legal">
    <ul class="ft-legal-list">
      
      <li><a href="http://mersin.edu.tr/dosyalar/Ayd%C4%B1nlatmaMetni_04032021.pdf">KİŞİSEL VERİLERİN KORUNMASI KANUNU</a></li>
      <li>&copy; 2024 © BAUM / Sarsılmaz Cyber Security, Türkiye Siber Güvenlik Kümelenmesi üyesidir..</li>
    </ul>
  </section>
</footer>

<style>
* {
  box-sizing: border-box;
  font-family: "Lato", sans-serif;
  margin: 0;
  padding: 0;
  color: white;

}


.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 8px -16px;
}


.row,
.row > .column {
  padding: 8px;
}


.column {
  float: left;
  width: 25%;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


.content {
  background-color: #1b1d44;
  padding: 10px;
}


@media screen and (max-width: 900px) {
  .column {
    width: 50%;
  }
}



ul {
  list-style: none;
  padding-left: 0;
}
footer {
  background-color: #1b1d44;
  color: white
  ;
  line-height: 1.5;
}
footer a {
  text-decoration: none;
  color: white;
}
a:hover {
  text-decoration: underline;
}
.ft-title {
  color: white;
  font-family: "Merriweather", serif;
  font-size: 1.375rem;
  padding-bottom: 0.625rem;
}


.container {
  flex: 1;
}

.ft-main {
  padding: 1.25rem 1.875rem;
  display: flex;
  flex-wrap: wrap;
}
@media only screen and (min-width: 29.8125rem /* 477px */) {
  .ft-main {
    justify-content: space-evenly;
  }
}
@media only screen and (min-width: 77.5rem /* 1240px */) {
  .ft-main {
    justify-content: space-evenly;
  }
}
.ft-main-item {
  padding: 1.25rem;
  min-width: 12.5rem;
}


form {
  display: flex;
  flex-wrap: wrap;
}
input[type="email"] {
  border: 0;
  padding: 0.625rem;
  margin-top: 0.3125rem;
}
input[type="submit"] {
  background-color: #00d188;
  color: #fff;
  cursor: pointer;
  border: 0;
  padding: 0.625rem 0.9375rem;
  margin-top: 0.3125rem;
}

.ft-social {
  padding: 0 1.875rem 1.25rem;
}
.ft-social-list {
  display: flex;
  justify-content: center;
  border-top: 1px #777 solid;
  padding-top: 1.25rem;
}
.ft-social-list li {
  margin: 0.5rem;
  font-size: 1.25rem;
}

.ft-legal {
  padding: 0.9375rem 1.875rem;
  background-color: #1b1d44;
}
.ft-legal-list {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
}
.ft-legal-list li {
  margin: 0.125rem 0.625rem;
  white-space: nowrap;
}

.ft-legal-list li:nth-last-child(2) {
    flex: 1;
}
body{
  background:#1b1d44;
}
</style>
</body>
</html>
