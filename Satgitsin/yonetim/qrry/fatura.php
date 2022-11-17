<?php
include("../ekler/fonksiyonlar.php");

$dataAdi = "fatura";

$faturaDataKolonlar = array('id', 'no', 'tedarikci', 'toplam', 'tarih');
$faturaDataKolonOlculer = array('int', 'varc', 'int', 'dcml', 'date');
sqlDurumuBak($dataAdi, $faturaDataKolonlar, $faturaDataKolonOlculer);

$ftrDtydataAdi = "fatura_detay";

$fatura_detayDataKolonlar = array('id', 'no', 'urun', 'adet', 'fiyat', 'tplm');
$fatura_detayDataKolonOlculer = array('int', 'int', 'int', 'int', 'dcml', 'dcml');
sqlDurumuBak($ftrDtydataAdi, $fatura_detayDataKolonlar, $fatura_detayDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }
$ftrId = NULL;
if($type == "New") {
    $postdeger = "no"; if(empty(postAl($postdeger))) { $no = NULL; } else {  $no =  postAl($postdeger); }
    $postdeger = "tedarikci"; if(empty(postAl($postdeger))) { $tedarikci = 0; } else {  $tedarikci =  postAl($postdeger); }
    $postdeger = "durum"; if(empty(postAl($postdeger))) { $durum = 0; } else {  $durum =  postAl($postdeger); }
    $postdeger = "tarih"; if(empty(postAl($postdeger))) { $tarih = NULL; } else {  $tarih =  postAl($postdeger); }

    if(empty($no)) { 
        $result = array("ERR" => "Fatura Numarası Belirtmelisiniz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($tarih)) { 
        $result = array("ERR" => "Fatura Tarihi Belirtmelisiniz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($tedarikci)) { 
        $result = array("ERR" => "Tedarikçi Belirtiniz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`no` = '$no' && `tedarikci` = '$tedarikci'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Fatura Numarası", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $ureticiSaveValues = "NULL, '$no', '$tedarikci', '$durum', '$tarih'";
    addToSql($dataAdi,$ureticiSaveValues,$faturaDataKolonlar);
}

if($type == "Add"){
    $postdeger = "fatura"; if(empty(postAl($postdeger))) { $fatura = 0; } else {  $fatura =  postAl($postdeger); }
    $postdeger = "urun"; if(empty(postAl($postdeger))) { $urun = 0; } else {  $urun =  postAl($postdeger); }
    $postdeger = "adet"; if(empty(postAl($postdeger))) { $adet = 0; } else {  $adet =  postAl($postdeger); }
    $postdeger = "fiyat"; if(empty(postAl($postdeger))) { $fiyat = "0.00"; } else {  $fiyat =  postAl($postdeger); }

    $kistas = "`id` = '$fatura'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı Fatura Numarası", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($urun)) { 
        $result = array("ERR" => "Urun Barkodunu Belirtiniz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($adet)) { 
        $result = array("ERR" => "Urun Adeti Belirtiniz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($fiyat)) { 
        $result = array("ERR" => "Urun Fiyatı Belirtiniz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`id` = '$fatura'";
    $existVal = VarmiKontrol("urun", $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı Barkod Numarası", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $tplm = $adet * $fiyat;
    $ureticiSaveValues = "NULL, '$fatura', '$urun', '$adet', '$fiyat', '$tplm'";
    addToSql($ftrDtydataAdi,$ureticiSaveValues,$fatura_detayDataKolonlar);

    $kistas = "`id` = '$urun'";
    $urnArry = bilgiGetirArray("urun",$kistas);
    $urnStok = $urnArry["stok"];
    $stok = $urnStok + $adet;
    $updateColumns = array("stok", "alisfiyat");
    $updateVal = array($stok, $fiyat);
    updateToSql("urun",$updateColumns,$updateVal,$kistas);

    $kistas = "`id` = '$fatura'";
    $urnArry = bilgiGetirArray("fatura",$kistas);
    $ftrtopla = $urnArry["toplam"];
    $toplam = $ftrtopla + $tplm;
    $updateColumns = array("toplam");
    $updateVal = array($toplam);
    updateToSql("fatura",$updateColumns,$updateVal,$kistas);

    $type = "InvLineList";

}

if($type == "Del"){ 
    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = 0; } else {  $id =  postAl($postdeger); }
    $postdeger = "fatura"; if(empty(postAl($postdeger))) { $fatura = 0; } else {  $fatura =  postAl($postdeger); }
    $kistas = "`id` = '$id' && `no` = '$fatura'";
    $existVal = VarmiKontrol($ftrDtydataAdi, $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı işlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $ftrArry = bilgiGetirArray($ftrDtydataAdi,$kistas);
    $urnId = $ftrArry["urun"];
    $urnAdet = $ftrArry["adet"];
    $strTopla = $ftrArry["tplm"];
    $kistasUrn = "`id` = '$urnId'";
    $urnArry = bilgiGetirArray("urun",$kistasUrn);
    $urnStok = $urnArry["stok"];
    $stok = $urnStok - $urnAdet;
    $updateColumns = array("stok");
    $updateVal = array($stok);
    updateToSql("urun",$updateColumns,$updateVal,$kistasUrn);
    $kistasFtraMain = "`id` = '$fatura'";
    $ftrMainArry = bilgiGetirArray("fatura",$kistasFtraMain);
    $ftrToplamOld = $ftrMainArry["toplam"];
    $ftrTplmNew = $ftrToplamOld - $strTopla;
    $updateColumns = array("toplam");
    $updateVal = array($ftrTplmNew);
    updateToSql("fatura",$updateColumns,$updateVal,$kistasFtraMain);
    
    
    delSql($ftrDtydataAdi,$kistas);

    $type = "InvLineList";
}

if($type == "InvLineList") {
    if(empty($fatura)) { 
        $postdeger = "id"; if(empty(postAl($postdeger))) { $id = 0; } else {  $id =  postAl($postdeger); }
    } else { 
                $id = $fatura;
    }
    
    
    $kistas = "`id` !=  '0' ORDER BY `urun`.`kod` ASC";
    $columnArry = array('id', 'kod', 'urunadi', 'resim', 'kategori', 'altkategori', 'uretici', 'alisfiyat', 'satisfiyat', 'stok', 'detay', 'durum');
    $newClmnNameArry = array();
    $numberEncodeArry = array(); 
    $textEncodeArry = array();
    $responseUrun =  sqlAllTblForJson("urun",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

    $kistas = "`no` =  '$id'";
    $columnArry = array('id', 'no', 'urun', 'adet', 'fiyat', 'tplm');
    $responseInvDty =  sqlAllTblForJson("fatura_detay",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

    $kistas = "`id` !=  '0'";
    $columnArry = array('id', 'no', 'tedarikci', 'toplam', 'tarih');
    $newClmnNameArry = array();
    $numberEncodeArry = array(); 
    $textEncodeArry = array();
    $responseInv =  sqlAllTblForJson("fatura",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

    $columnArry =  array('id', 'adi', 'yetkili', 'durum');
    $responseTdrk =  sqlAllTblForJson("tedarikci",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 


    $result = array("ERR" => "", "respUrun" => $responseUrun, "respftrId" => $id, "respftrDty" => $responseInvDty, "respInv" => $responseInv, "respTdrk" => $responseTdrk); 
    echo json_encode($result);
    die();
}

$kistas = "`id` !=  '0'";
$columnArry = array('id', 'no', 'tedarikci', 'toplam', 'tarih');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$responseInv =  sqlAllTblForJson("fatura",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$columnArry =  array('id', 'adi', 'yetkili', 'durum');
$responseTdrk =  sqlAllTblForJson("tedarikci",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$result = array("ERR" => "", "respInv" => $responseInv, "respTdrk" => $responseTdrk); 
    echo json_encode($result);
    die();






?>