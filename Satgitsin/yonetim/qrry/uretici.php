<?php
include("../ekler/fonksiyonlar.php");
$dataAdi = "uretici";

$ureticiDataKolonlar = array('id', 'adi', 'durum');
$ureticiDataKolonOlculer = array('int', 'varc', 'int');
sqlDurumuBak($dataAdi, $ureticiDataKolonlar, $ureticiDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "Add"){

    $postdeger = "adi"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }
    $postdeger = "drm"; if(empty(postAl($postdeger))) { $durum = 0; } else {  $durum =  postAl($postdeger); }

    if(empty($adi)) { 
        $result = array("ERR" => "Üretici Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`adi` = '$adi'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Üretici Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $ureticiSaveValues = "NULL, '$adi', '$durum'";
    addToSql($dataAdi,$ureticiSaveValues,$ureticiDataKolonlar);
}

if($type == "Update"){

    $postdeger = "adi"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }
    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = 0; } else {  $id =  postAl($postdeger); }

    if(empty($adi)) { 
        $result = array("ERR" => "Üretici Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`adi` = '$adi' && `id` != '$id'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Üretici Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $updateColumns = array("adi");
    $updateVal = array($adi);
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

    $ureticiArry = bilgiGetirArray($dataAdi,$kistas);
    $newVal = 1;
    $oldVal = $ureticiArry["durum"];
    if($oldVal == "1") { $newVal = 0; }
    $updateColumns = array("durum");
    $updateVal = array($newVal);
    updateToSql($dataAdi,$updateColumns,$updateVal,$kistas);

    if($newVal == 0){
        $urunKistas = "`uretici` = '$id'";
        $updateColumns = array("durum");
        $updateVal = array($newVal);
        updateToSql("urun",$updateColumns,$updateVal,$urunKistas);
    }

    
}

$kistas = "`id` !=  '0'";
$columnArry = array('id', 'adi', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson($dataAdi,$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
$result = array("ERR" => "", "resp" => $response); 
    echo json_encode($result);
    die();

?>