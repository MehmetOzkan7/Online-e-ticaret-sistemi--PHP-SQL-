<?php
include("../ekler/fonksiyonlar.php");

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "getDetail") {
    $postdeger = "alverID"; if(empty(postAl($postdeger))) { $alverID = NULL; } else {  $alverID =  postAl($postdeger); }
    $postdeger = "user"; if(empty(postAl($postdeger))) { $user = NULL; } else {  $user =  postAl($postdeger); }
    $kistas = "`alverno` =  '$alverID' && `kullanici` =  '$user'";
    $existVal = VarmiKontrol("sepet", $kistas);

    if($existVal == "0") { 
        $result = array("ERR" => "Kayıtlı Alışveriş Bulunamadı Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $urunArray = array();
    $columnArry = array('id', 'urun', 'adet', 'fiyat', 'toplam', 'durum', 'alverno');
    $newClmnNameArry = array();
    $numberEncodeArry = array(); 
    $textEncodeArry = array();
    $response =  sqlAllTblForJson("sepet",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
    foreach ($response as $key => $value) {  
        $columnArry = array('kod', 'urunadi');
        $urunIdsi =  $value["urun"];
        $kistas = "`id` =  '$urunIdsi'";
        $urunDty =  sqlAllTblForJson("urun",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
        array_push($urunArray,$urunDty); 
    }
    
    $kistas = "`no` =  '$alverID'";
    $columnArry = array('durum','no');
    $alverDrm =  sqlAllTblForJson("alisveris",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

    $kistas = "`id` =  '$user'";
    $columnArry = array('id', 'isim', 'soyad');
    $userArry =  sqlAllTblForJson("kullanici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

    $kistas = "`id` =  '$user'";
    $columnArry = array('adres', 'postakodu', 'sehir', 'ulke', 'sirket');
    $adresArry =  sqlAllTblForJson("adres",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
    
    $result = array("ERR" => "", "adres" => $adresArry, "isim" => $userArry, "sepet" => $response, "urun" => $urunArray, "alverDrm" => $alverDrm); 
    echo json_encode($result);
    die();

   
}

if($type == "updt") { 
    $postdeger = "alverNo"; if(empty(postAl($postdeger))) { $alverID = NULL; } else {  $alverID =  postAl($postdeger); }
    $postdeger = "user"; if(empty(postAl($postdeger))) { $user = NULL; } else {  $user =  postAl($postdeger); }
    $postdeger = "drm"; if(empty(postAl($postdeger))) { $drm = NULL; } else {  $drm =  postAl($postdeger); }
    $kistas = "`no` =  '$alverID' && `kullanici` =  '$user'";
    $existVal = VarmiKontrol("alisveris", $kistas);

    if($existVal == "0") { 
        $result = array("ERR" => "Kayıtlı Alışveriş Bulunamadı Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $updateColumns = array("durum");
    $updateVal = array($drm);
    updateToSql("alisveris",$updateColumns,$updateVal,$kistas);

 }

$kistas = "`id` !=  '0'";
$columnArry = array('id', 'tarih', 'kullanici', 'tutar', 'no', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson("alisveris",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
$kullaniciArray = array();


foreach ($response as $key => $value) { 
    $userIDsi =  $value["kullanici"];
    $kistas = "`id` =  '$userIDsi'";
    $columnArry = array('isim', 'soyad');
    $newClmnNameArry = array();
    $numberEncodeArry = array(); 
    $textEncodeArry = array();
    $kullnici =  sqlAllTblForJson("kullanici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
    array_push($kullaniciArray,$kullnici); 
    
}

$result = array("ERR" => "", "resp" => $response, "kullaniciArray" => $kullaniciArray); 
    echo json_encode($result);
    die();



?>