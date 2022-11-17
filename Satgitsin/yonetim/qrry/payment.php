<?php
include("../ekler/fonksiyonlar.php");

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }
$postdeger = "tur"; if(empty(postAl($postdeger))) { $tur = NULL; } else {  $tur =  postAl($postdeger); }

if($tur != 1 && $tur != 2) {
    $result = array("ERR" => "Hatalı İşlem Talebi".$tur, "resp" => ""); 
        echo json_encode($result);
        die();
}



if($type == "del"){
    $postdeger = "payID"; if(empty(postAl($postdeger))) { $payID = NULL; } else {  $payID =  postAl($postdeger); }
    $postdeger = "user"; if(empty(postAl($postdeger))) { $user = NULL; } else {  $user =  postAl($postdeger); }

    $kistas = "`id` = '$payID' && `kullanici` = '$user' && `tur` = '$tur'";
    $existVal = VarmiKontrol("odemeler", $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı İşlem Talebi".$kistas, "resp" => ""); 
        echo json_encode($result);
        die();
    }
    delSql("odemeler",$kistas);
    
}
$kistas = "`tur` = '$tur'";
$columnArry = array('id', 'kullanici', 'miktar', 'tarih');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson("odemeler",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$userArry = array();

if($tur == 2) {
    foreach ($response as $key => $value) {  
        $columnArry = array('id', 'isim', 'soyad');
        $userID =  $value["kullanici"];
        $kistas = "`id` =  '$userID'";
        $urunDty =  sqlAllTblForJson("kullanici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
        array_push($userArry,$urunDty); 
    }
}

if($tur == 1) {
    foreach ($response as $key => $value) {  
        $columnArry = array('id', 'adi', 'yetkili');
        $userID =  $value["kullanici"];
        $kistas = "`id` =  '$userID'";
        $urunDty =  sqlAllTblForJson("tedarikci",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
        array_push($userArry,$urunDty); 
    }
}

$result = array("ERR" => "", "resp" => $response, "user" => $userArry); 
    echo json_encode($result);
    die();







?>