<?php
include("../ekler/fonksiyonlar.php");

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }
if($type == "makePayment") {
    
    $dataAdi = "odemeler";

    $odemelerDataKolonlar = array('id', 'kullanici', 'miktar', 'tur', 'tarih');
    $odemelerDataKolonOlculer = array('int', 'int', 'dcml', 'int', 'date');
    sqlDurumuBak($dataAdi, $odemelerDataKolonlar, $odemelerDataKolonOlculer);
    

    $postdeger = "kullanici"; if(empty(postAl($postdeger))) { $kullanici = NULL; } else {  $kullanici =  postAl($postdeger); }
    $postdeger = "miktar"; if(empty(postAl($postdeger))) { $miktar = NULL; } else {  $miktar =  postAl($postdeger); }
    $postdeger = "tur"; if(empty(postAl($postdeger))) { $tur = 0; } else {  $tur =  postAl($postdeger); }
    $postdeger = "tarih"; if(empty(postAl($postdeger))) { $tarih = NULL; } else {  $tarih =  postAl($postdeger); }

    if($tur != 1 && $tur != 2){
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($kullanici) || empty($miktar) || empty($tarih)){ 
        $result = array("ERR" => "Tüm Alanları Doldurunuz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if($tur != 1 && $tur != 2){
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $saveValues = "NULL, '$kullanici', '$miktar', '$tur', '$tarih'";
    addToSql($dataAdi,$saveValues,$odemelerDataKolonlar);

    $dataAdi = "kullanici";
}


$kistas = "`yetki` =  '1'";
$columnArry = array('id', 'isim', 'soyad', 'mail', 'sifre', 'tel', 'tarih');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson("kullanici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
$adresArry = array();
$shopArry = array();
$cuzdanArry = array();
$kalanArry = array();

foreach ($response as $key => $value) { 
    $userIDsi =  $value["id"];
    $kistas = "`kullanici` =  '$userIDsi'";
    $columnArry = array('adres', 'postakodu', 'sehir', 'ulke', 'sirket');
    $adresiNedir =  sqlAllTblForJson("adres",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
    array_push($adresArry,$adresiNedir); 
    $kistas = "`kullanici` = '$userIDsi'";
    $tablo = "alisveris";
    $ttlClmn = "tutar";
    $shopTtl = getSubTotal($tablo,$kistas,$ttlClmn);
    array_push($shopArry,$shopTtl);  
    
    $kistas = "`kullanici` = '$userIDsi' && `tur` = '2'";
    $tablo = "odemeler";
    $ttlClmn = "miktar";
    $yuklenenBkye = getSubTotal($tablo,$kistas,$ttlClmn);
    array_push($cuzdanArry,$yuklenenBkye);  
    $fark = round($yuklenenBkye - $shopTtl, 2);
    array_push($kalanArry,$fark);  
}

$result = array("ERR" => "", "resp" => $response, "adresArry" => $adresArry, "shopArry" => $shopArry, "cuzdanArry" => $cuzdanArry, "kalanArry" => $kalanArry); 
    echo json_encode($result);
    die();



?>