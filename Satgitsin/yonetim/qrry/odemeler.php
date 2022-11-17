<?php
include("../ekler/fonksiyonlar.php");
$dataAdi = "odemeler";

$odemelerDataKolonlar = array('id', 'kullanici', 'miktar', 'tur', 'tarih');
$odemelerDataKolonOlculer = array('int', 'int', 'dcml', 'int', 'date');
sqlDurumuBak($dataAdi, $odemelerDataKolonlar, $odemelerDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }
$postdeger = "tur"; if(empty(postAl($postdeger))) { $tur = 0; } else {  $tur =  postAl($postdeger); }

if($tur != 1 && $tur != 2){
    $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
    echo json_encode($result);
    die();
}

if($type == "Add") {
    $postdeger = "kullanici"; if(empty(postAl($postdeger))) { $kullanici = NULL; } else {  $kullanici =  postAl($postdeger); }
    $postdeger = "miktar"; if(empty(postAl($postdeger))) { $miktar = NULL; } else {  $miktar =  postAl($postdeger); }
    $postdeger = "tur"; if(empty(postAl($postdeger))) { $tur = 0; } else {  $tur =  postAl($postdeger); }
    $postdeger = "tarih"; if(empty(postAl($postdeger))) { $tarih = NULL; } else {  $tarih =  postAl($postdeger); }

    if(empty($kullanici) || empty($miktar) || empty($tarih)){ 
        $result = array("ERR" => "Tüm Alanları Doldurunuz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if($tur == 0){ 
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $saveValues = "NULL, '$kullanici', '$miktar', '$tur', '$tarih'";
    addToSql($dataAdi,$saveValues,$kategoriDataKolonlar);

}

if($type == "Del") {
    $postdeger = "kullanici"; if(empty(postAl($postdeger))) { $kullanici = NULL; } else {  $kullanici =  postAl($postdeger); }
    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = NULL; } else {  $id =  postAl($postdeger); }

    $kistas = "`id` = '$id' && `kullanici` = '$kullanici'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    

    delSql($dataAdi,$kistas);

}

$kistas = "`id` !=  '0' && `tur` =  '$tur'";
$columnArry = array('id', 'kullanici', 'miktar', 'tur', 'tarih');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson($dataAdi,$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$kistas = "`id` !=  '0'";
if($tur == 2) {
    $columnArry = array('id', 'isim', 'soyad');
    $respKllnci =  sqlAllTblForJson("kullanici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
}

if($tur == 1) {
    $columnArry = array('id', 'adi', 'yetkili');
    $respKllnci =  sqlAllTblForJson("kullanici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
}


$result = array("ERR" => "", "resp" => $response, "respKllnci" => $respKllnci); 
    echo json_encode($result);
    die();


?>