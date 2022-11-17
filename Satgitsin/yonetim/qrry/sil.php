<?php
include("../ekler/fonksiyonlar.php");
function getSubTotal($tablo,$kistas,$ttlClmn){
    $sonuc = 0.00;
    include("baglan.php");
    $sql = "SELECT SUM(`$ttlClmn`) FROM `$tablo` WHERE $kistas";
    $q = mysqli_query($baglan, $sql);
    $row = mysqli_fetch_array($q);
    if(!empty($row[0])) {
        $sonuc = $row[0];
    }
    return($sonuc);
}
$kistas = "`id` !=  '0'";
$columnArry = array('id', 'adi', 'yetkili', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson("tedarikci",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry);


?>