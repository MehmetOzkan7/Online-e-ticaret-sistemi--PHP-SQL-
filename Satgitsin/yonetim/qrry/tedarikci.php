<?php
include("../ekler/fonksiyonlar.php");
$dataAdi = "tedarikci";

$tedarikciDataKolonlar = array('id', 'adi', 'yetkili', 'durum');
$tedarikciDataKolonOlculer = array('int', 'varc', 'varc', 'int');
sqlDurumuBak($dataAdi, $tedarikciDataKolonlar, $tedarikciDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "Add"){ 

    $postdeger = "adi"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }
    $postdeger = "yetkili"; if(empty(postAl($postdeger))) { $yetkili = NULL; } else {  $yetkili =  postAl($postdeger); }
    $postdeger = "drm"; if(empty(postAl($postdeger))) { $durum = 0; } else {  $durum =  postAl($postdeger); }

    if(empty($adi)) { 
        $result = array("ERR" => "Tedarikçi Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`adi` = '$adi'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Tedarikçi Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $saveValues = "NULL, '$adi', '$yetkili', '$durum'";
    addToSql($dataAdi,$saveValues,$tedarikciDataKolonlar);
}


if($type == "Update"){

    $postdeger = "adi"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }
    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = 0; } else {  $id =  postAl($postdeger); }
    $postdeger = "yetkili"; if(empty(postAl($postdeger))) { $yetkili = NULL; } else {  $yetkili =  postAl($postdeger); }

    if(empty($adi)) { 
        $result = array("ERR" => "Tedarikçi Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($yetkili)) { 
        $result = array("ERR" => "Tedarikçi Yetkilisi Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`adi` = '$adi' && `id` != '$id'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Tedarikçi Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $updateColumns = array("adi", "yetkili");
    $updateVal = array($adi, $yetkili);
    $kistas = "`id` = '$id'";
    updateToSql($dataAdi,$updateColumns,$updateVal,$kistas);
}

if($type == "UpdtStts"){

    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = 0; } else {  $id =  postAl($postdeger); }
    $kistas = "`id` = '$id'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $tedarikArry = bilgiGetirArray($dataAdi,$kistas);
    $newVal = 1;
    $oldVal = $tedarikArry["durum"];
    if($oldVal == "1") { $newVal = 0; }
    $updateColumns = array("durum");
    $updateVal = array($newVal);
    updateToSql($dataAdi,$updateColumns,$updateVal,$kistas);

    
}

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

    $dataAdi = "tedarikci";
}

$kistas = "`id` !=  '0'";
$columnArry = array('id', 'adi', 'yetkili', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson($dataAdi,$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$alimArry = array();
$odemeArry = array();
$farkAryy = array();
foreach ($response as $key => $value) {
    
    $suplierID =  $value["id"];
    $kistas = "`tedarikci` = '$suplierID'";
    $tablo = "fatura";
    $ttlClmn = "toplam";
    $bakiye = getSubTotal($tablo,$kistas,$ttlClmn);
    array_push($alimArry,$bakiye);  
    $kistas = "`kullanici` = '$suplierID' && `tur` = '1'";
    $tablo = "odemeler";
    $ttlClmn = "miktar";
    $odemeTplm = getSubTotal($tablo,$kistas,$ttlClmn);
    array_push($odemeArry,$odemeTplm);  
    $fark = round($bakiye - $odemeTplm, 2);
    array_push($farkAryy,$fark);  
}
$result = array("ERR" => "", "resp" => $response, "respAlimTtl" => $alimArry, "respOdemeTtl" => $odemeArry, "respFarkTtl" => $farkAryy); 
    echo json_encode($result);
    die();


?>
