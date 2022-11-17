<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
    
} else {  }
include("../ekler/fonksiyonlar.php");

$kistas = "`durum` =  '1' ORDER BY RAND() LIMIT 7";
$columnArry = array('id', 'kod', 'urunadi', 'resim', 'kategori', 'altkategori', 'satisfiyat', 'stok', 'detay');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$respUrnYedili =  sqlAllTblForJson("urun",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$kistas = "`durum` =  '1' ORDER BY RAND() LIMIT 6";
$respUrnAltili =  sqlAllTblForJson("urun",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$kistas = "`durum` =  '1'";
$respUrnAll =  sqlAllTblForJson("urun",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$result = array("ERR" => "", "respUrnYedili" => $respUrnYedili, "respUrnAltili" => $respUrnAltili, "respUrnAll" => $respUrnAll); 
    echo json_encode($result);
    die();


?>