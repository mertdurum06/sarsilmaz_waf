<?php
require_once "sarsilmaz_waf.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="sarsılmaz.png" type="image/x-icon" />
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="script.js"></script>

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.topnav a:hover {
  background-color: #ddd;
  color: black;
}


.topnav .search-container {
  position: absolute;

      left: +1350px;
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
          <a href="index.php">Anasayfa</a>
          
        </li>
        <li>
          <a href="#!">Üniversitemiz</a>
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
          <a href="#!">Akademik</a>
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
          <a href="#!">İdari</a>
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
          <a href="#!">Öğrenci</a>
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
        <li>
              <a href="#!"></a>
              <a href="#!"></a>
        </li>
           
          </ul>
        </li>
         <li>
          <a href="status.php">Status</a>
          <ul class="nav-dropdown">
        <li>
            <a href="#!"><h3> </h3></a>
     </ul>
        </li>
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



</script>


<div class="main">
<div class="row">
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$aranan = $_GET['aranan'];

$sql = "SELECT baslik,gorsel, aciklama FROM haberler WHERE baslik LIKE '%$aranan%' OR aciklama LIKE '%$aranan%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<div class='column'>\n";
        echo "<div class='content'>\n";
        echo "<h2>" . $row["baslik"] . "</h2>";
        echo "<img src='".$row["gorsel"]."' height=150px width=185px>\n"; 
        echo "<p>" . $row["aciklama"] . "</p>";
        echo "</div>\n";
        echo "</div>\n";
    }
} else {
    echo "Sonuç bulunamadı.";
}
echo "$aranan<br>";

$conn->close();
?>


</div>
</div>


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

