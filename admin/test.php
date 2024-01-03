<?php

session_start();
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = '';
$DB_NAME = "users";
 
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// ---------------------------------- HABER ÇEKME -----------------------------------------

$haber_baslik_sorgu = "SELECT baslik FROM haberler WHERE id = '1'";

$haber_baslik_cevap = mysqli_query($con, $haber_baslik_sorgu);

$h_baslik = mysqli_fetch_assoc($haber_baslik_cevap);

echo $h_baslik["baslik"];


$haber_aciklama_sorgu = "SELECT aciklama FROM haberler WHERE id = '1'";

$haber_aciklama_cevap = mysqli_query($con, $haber_aciklama_sorgu);

$h_aciklama = mysqli_fetch_assoc($haber_aciklama_cevap);

echo $h_aciklama["aciklama"];


$haber_gorsel_sorgu = "SELECT gorsel FROM haberler WHERE id = '1'";

$haber_gorsel_cevap = mysqli_query($con, $haber_gorsel_sorgu);

$h_gorsel = mysqli_fetch_assoc($haber_gorsel_cevap);

echo $h_gorsel["gorsel"];

// -------------------------------- DUYURU ÇEKME ------------------------------------ 

$duyuru_baslik_sorgu = "SELECT baslik FROM haberler WHERE id = '1'";

$duyuru_baslik_cevap = mysqli_query($con, $haber_baslik_sorgu);

$d_baslik = mysqli_fetch_assoc($haber_baslik_cevap);

echo $d_baslik["baslik"];


$duyuru_aciklama_sorgu = "SELECT aciklama FROM duyurular WHERE id = '1'";

$duyuru_aciklama_cevap = mysqli_query($con, $duyuru_aciklama_sorgu);

$d_aciklama = mysqli_fetch_assoc($duyuru_aciklama_cevap);

echo $d_aciklama["aciklama"];


?>