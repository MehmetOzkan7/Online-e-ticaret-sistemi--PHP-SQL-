<?php
ob_start();
session_start();
include("../ekler/fonksiyonlar.php");

function checkSepet($userID){
    include("../ekler/baglan.php");  
    $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
    $queryBilgiAl = "SELECT * FROM `sepet` WHERE $kistas";
    $sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
    while($row = mysqli_fetch_array($sonucBilgiAl)) { 
        $idsi = $row["id"];
        $urun = $row["urun"];
        $adet = $row["adet"];
        
        $urnArray = bilgiGetirArray("urun","`id` =  '$urun'");
        if($urnArray["durum"] == 0) { $adet = 0; }
        if($urnArray["durum"] == 1 && $urnArray["stok"] < $adet) { $adet = $urnArray["stok"]; }
        $fiyat = $urnArray["satisfiyat"];
        $tutar = $adet * $fiyat;
        $updateColumns = array("adet","fiyat","toplam");
        $updateVal = array($adet,$fiyat,$tutar);
        updateToSql("sepet",$updateColumns,$updateVal,"`id` =  '$idsi'");

    }
    $sonucBilgiAl->close();
    $kistas = "`kullanici` =  '$userID' && `durum` =  '0' && `adet` =  '0'";
    delSql("sepet",$kistas);
}

function dopaymStok($userID){
    include("../ekler/baglan.php");  
    $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
    $queryBilgiAl = "SELECT * FROM `sepet` WHERE $kistas";
    $sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
    while($row = mysqli_fetch_array($sonucBilgiAl)) {        
        $urun = $row["urun"];
        $adet = $row["adet"];
        
        $urnArray = bilgiGetirArray("urun","`id` =  '$urun'");
        $oldStok = $urnArray["stok"];
        $yeniStok = $oldStok - $adet;
        
        $updateColumns = array("stok");
        $updateVal = array($yeniStok);
        updateToSql("urun",$updateColumns,$updateVal,"`id` =  '$urun'");

    }
    $sonucBilgiAl->close();
}

if(isset($_SESSION['user']))
    {
        $userID = $_SESSION['user'];
        $userYetki = NULL;	
                
    } else {  
        $userID = NULL;
        $userYetki = NULL;	
        $cuzdanTplm = 0;
    }

if(empty($userID)) {
    $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
}
        $kistas = "`id` =  '$userID' && `yetki` =  '1' && `durum` =  '1'";
        $existVal = VarmiKontrol("kullanici", $kistas);
        if($existVal == 0) { 
            $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
            echo json_encode($result);
            die();
        }

        $dataAdi = "sepet";

        $sepetDataKolonlar = array('id', 'kullanici', 'urun', 'adet', 'fiyat', 'toplam', 'durum', 'alverno');
        $sepetDataKolonOlculer = array('int', 'int', 'int', 'int', 'dcml', 'dcml', 'int', 'varc');
        sqlDurumuBak($dataAdi, $sepetDataKolonlar, $sepetDataKolonOlculer);

        $alvrsCarpan = 7;
        $alvrsTplm = 1548;

        $dataAdi = "alisveris";

        $alisverisDataKolonlar = array('id', 'tarih', 'kullanici', 'tutar', 'no', 'durum');
        $alisverisDataKolonOlculer = array('int', 'dtme', 'int', 'dcml', 'varc', 'int');
        sqlDurumuBak($dataAdi, $alisverisDataKolonlar, $alisverisDataKolonOlculer); 

        checkSepet($userID);
        
        $kistas = "`kullanici` =  '$userID' && `tur` =  '2'";
        $cuzdanTplm = getSubTotal("odemeler",$kistas,"miktar");
        $kistas = "`kullanici` =  '$userID'";
        $alverTplm = getSubTotal("alisveris",$kistas,"tutar");
        $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
        $sptTplm = getSubTotal("sepet",$kistas,"toplam");
        $klnCzdn = $cuzdanTplm - $alverTplm - $sptTplm; 
 


$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "AddLine"){
    $postdeger = "urun"; if(empty(postAl($postdeger))) { $urun = 0; } else {  $urun =  postAl($postdeger); }
    $postdeger = "adet"; if(empty(postAl($postdeger))) { $adet = 1; } else {  $adet =  postAl($postdeger); }
    $postdeger = "fiyat"; if(empty(postAl($postdeger))) { $fiyat = "0.00"; } else {  $fiyat =  postAl($postdeger); }
    $postdeger = "toplam"; if(empty(postAl($postdeger))) { $toplam = "0.00"; } else {  $toplam =  postAl($postdeger); }
    $postdeger = "durum"; if(empty(postAl($postdeger))) { $durum = 0; } else {  $durum =  postAl($postdeger); }
    $postdeger = "alverno"; if(empty(postAl($postdeger))) { $alverno = NULL; } else {  $alverno =  postAl($postdeger); }


    $kistas = "`id` = '$urun' && `durum` = '1'";
    $existVal = VarmiKontrol("urun", $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $urnArry = bilgiGetirArray("urun",$kistas);
    $stok = $urnArry["stok"];
    $fiyat = $urnArry["satisfiyat"];
    $toplam = $fiyat * $adet;

    if($klnCzdn < $toplam) {
        $result = array("ERR" => "Yetersiz Bakiye ! Bakiye Eklemek İçin Sistem Yöneticisine Danışın", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if($stok < $adet) {
        $result = array("ERR" => "Üzgünüz Yetersiz Stok Adeti", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`kullanici` = '$userID' && `urun` = '$urun' && `durum` = '0'";
    $existVal = VarmiKontrol("sepet", $kistas);
    if($existVal == 0) { $lineYenile = NULL; } else {
        $lineYenile = 1;
        $lineArray = bilgiGetirArray("sepet",$kistas);
        $oldMiktar = $lineArray["adet"];
        $adet = $adet + $oldMiktar;
        $toplam = $fiyat * $adet;
        if($stok < $adet) {
            $result = array("ERR" => "Üzgünüz Yetersiz Stok Adeti", "resp" => ""); 
            echo json_encode($result);
            die();
        }
    }

    if(empty($lineYenile)){
        $saveValues = "NULL, '$userID', '$urun', '$adet', '$fiyat', '$toplam', '$durum', '$alverno'"; 
        addToSql("sepet",$saveValues,$sepetDataKolonlar);
    } else {
        $updateColumns = array("adet", "fiyat", "toplam");
        $updateVal = array($adet, $fiyat, $toplam);
        updateToSql("sepet",$updateColumns,$updateVal,$kistas);
    }

        $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
        $sptTplm = getSubTotal("sepet",$kistas,"toplam");
        $columnArry = array('id', 'urun', 'adet', 'fiyat', 'toplam');
        $newClmnNameArry = array();
        $numberEncodeArry = array(); 
        $textEncodeArry = array();
        $sptDtyArry =  sqlAllTblForJson("sepet",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
        $resimArray = array();
        $isimArray = array();
        $kodArray = array();

        foreach ($sptDtyArry as $key => $value) {
    
            $urnIDsi =  $value["urun"];
            $kistas = "`id` = '$urnIDsi'";
            $urnunbilgiArry = bilgiGetirArray("urun",$kistas);
            array_push($resimArray,$urnunbilgiArry["resim"]);  
            array_push($isimArray,$urnunbilgiArry["urunadi"]); 
            array_push($kodArray,$urnunbilgiArry["kod"]);  
            
        }
        

    $result = array("ERR" => "", "msg" => "Ürün Sepetinize Başarıyla Eklendi", "sptTplm" => $sptTplm, "sptDtyArry" => $sptDtyArry, "resimArray" => $resimArray, "isimArray" => $isimArray, "kodArray" => $kodArray); 
        echo json_encode($result);
        die();
}

if($type == "doPayment"){
    $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
    $existVal = VarmiKontrol("sepet", $kistas);
    
    if($existVal == 0) { 
        $result = array("ERR" => "Sepetiniz Boş", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $sptTplm = getSubTotal("sepet",$kistas,"toplam");
    $userBakiye = $cuzdanTplm - $alverTplm;

    if($userBakiye < $sptTplm) {
        $result = array("ERR" => "Sepet Kapatılamıyor. Yeterli Bakiyeniz Bulunmamakta", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $tarih = date("Y-m-d H:i:s");
    
    $saveValues = "NULL, '$tarih', '$userID', '$sptTplm', '0', '1'"; 
    addToSql("alisveris",$saveValues,$alisverisDataKolonlar); 
    dopaymStok($userID);
    $length = 3;
    $rndm = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnoprstuvwxyz', ceil($length/strlen($x)) )),1,$length);

    $kistas = "`kullanici` =  '$userID' && `no` =  '0'";
    $alverArry = bilgiGetirArray("alisveris",$kistas);
    $alverId = $alverArry["id"];
    $alverNo = $alverId * $alvrsCarpan;
    $alverNo = $alverNo + $alvrsTplm;
    $alverNo = $rndm.$alverNo;
    $kistas = "`id` =  '$alverId'";
    $updateColumns = array("no");
    $updateVal = array($alverNo);
    updateToSql("alisveris",$updateColumns,$updateVal,$kistas);
    $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
    $updateColumns = array("durum", "alverno");
    $updateVal = array("1", $alverNo);
    updateToSql("sepet",$updateColumns,$updateVal,$kistas);    
    

 }

if($type == "updtLine"){ 
    $postdeger = "lineId"; if(empty(postAl($postdeger))) { $lineId = 0; } else {  $lineId =  postAl($postdeger); }
    $postdeger = "tur"; if(empty(postAl($postdeger))) { $tur = 0; } else {  $tur =  postAl($postdeger); }
    $adet = 1; 
    if($tur == "minus"){ $adet = -1; }
    $kistas = "`kullanici` =  '$userID' && `id` =  '$lineId'";
    $existVal = VarmiKontrol("sepet", $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı İşlem Talebi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $lineArry = bilgiGetirArray("sepet",$kistas);
    $urnIdsi = $lineArry["urun"];
    $oldAdet = $lineArry["adet"];

    $kistas = "`durum` =  '1' && `id` =  '$urnIdsi'";
    $existVal = VarmiKontrol("urun", $kistas);
    if($existVal == 0) { $adet = -1 * $oldAdet; }
    if($tur == "delLine"){ $adet = -1 * $oldAdet; }
    $kistas = "`id` =  '$urnIdsi'";
    $urnArry = bilgiGetirArray("urun",$kistas);
    $fiyat = $urnArry["satisfiyat"];
    $stok = $urnArry["stok"];
    $yeniAdet = $oldAdet + $adet;
    if($stok < $yeniAdet) {
        $result = array("ERR" => "Üzgünüz Yetersiz Stok Adeti", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $kntrlToplam = $sptTplm + ($adet * $fiyat);
    $kntrlCzdn = $klnCzdn + $sptTplm;
    if($kntrlCzdn < $kntrlToplam) {
        $result = array("ERR" => "Yetersiz Bakiye ! Bakiye Eklemek İçin Sistem Yöneticisine Danışın", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $yeniTutar = $yeniAdet * $fiyat;
    $kistas = "`id` =  '$lineId'";
    $updateColumns = array("adet", "fiyat", "toplam");
    $updateVal = array($yeniAdet, $fiyat, $yeniTutar);
    updateToSql("sepet",$updateColumns,$updateVal,$kistas);
    $kistas = "`kullanici` =  '$userID' && `durum` =  '0' && `adet` =  '0'";
    delSql("sepet",$kistas);

}

        $kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
        $sptTplm = getSubTotal("sepet",$kistas,"toplam");
        $columnArry = array('id', 'urun', 'adet', 'fiyat', 'toplam');
        $newClmnNameArry = array();
        $numberEncodeArry = array(); 
        $textEncodeArry = array();
        $sptDtyArry =  sqlAllTblForJson("sepet",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 
        $resimArray = array();
        $isimArray = array();
        $kodArray = array();

        foreach ($sptDtyArry as $key => $value) {
    
            $urnIDsi =  $value["urun"];
            $kistas = "`id` = '$urnIDsi'";
            $urnunbilgiArry = bilgiGetirArray("urun",$kistas);
            array_push($resimArray,$urnunbilgiArry["resim"]);  
            array_push($isimArray,$urnunbilgiArry["urunadi"]); 
            array_push($kodArray,$urnunbilgiArry["kod"]);  
            
        }
        $result = array("ERR" => "", "sptTplm" => $sptTplm, "sptDtyArry" => $sptDtyArry, "resimArray" => $resimArray, "isimArray" => $isimArray, "kodArray" => $kodArray); 
        echo json_encode($result);
        die();

?>