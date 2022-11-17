<?php
include("../ekler/fonksiyonlar.php");
$dataAdi = "kategori";

$kategoriDataKolonlar = array('id', 'adi', 'bag', 'durum');
$kategoriDataKolonOlculer = array('int', 'varc', 'int', 'int');
sqlDurumuBak($dataAdi, $kategoriDataKolonlar, $kategoriDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "Add"){ 

    $postdeger = "adi"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }
    $postdeger = "bag"; if(empty(postAl($postdeger))) { $bag = 0; } else {  $bag =  postAl($postdeger); }
    $postdeger = "durum"; if(empty(postAl($postdeger))) { $durum = 0; } else {  $durum =  postAl($postdeger); }

    if(empty($adi)) { 
        $result = array("ERR" => "Kategori Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`adi` = '$adi' && `bag` = '$bag'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Kategori Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $saveValues = "NULL, '$adi', '$bag', '$durum'";
    addToSql($dataAdi,$saveValues,$kategoriDataKolonlar);
}

if($type == "Update"){

    $postdeger = "adi"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }
    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = 0; } else {  $id =  postAl($postdeger); }
    $postdeger = "bag"; if(empty(postAl($postdeger))) { $bag = 0; } else {  $bag =  postAl($postdeger); }

    if(empty($adi)) { 
        $result = array("ERR" => "Kategori Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    

    $kistas = "`adi` = '$adi' && `id` != '$id'  && `bag` = '$bag'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Kategori Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $updateColumns = array("adi", "bag");
    $updateVal = array($adi, $bag);
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

    if($newVal == 0){
        $kistas = "`bag` = '$id'"; 
        updateToSql($dataAdi,$updateColumns,$updateVal,$kistas);
    }

    
}

$kistas = "`id` !=  '0'";
$columnArry = array('id', 'adi', 'bag', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson($dataAdi,$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
$result = array("ERR" => "", "resp" => $response); 
    echo json_encode($result);
    die();

?>