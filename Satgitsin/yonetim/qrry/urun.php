<?php
include("../ekler/fonksiyonlar.php");

$dataAdi = "urun";

$urunDataKolonlar = array('id', 'kod', 'urunadi', 'resim', 'kategori', 'altkategori', 'uretici', 'alisfiyat', 'satisfiyat', 'stok', 'detay', 'durum');
$urunDataKolonOlculer = array('int', 'varc', 'varc', 'varc', 'int', 'int', 'int', 'dcml', 'dcml', 'int', 'lng', 'int');
sqlDurumuBak($dataAdi, $urunDataKolonlar, $urunDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "Add") { 
    
    $postdeger = "kod"; if(empty(postAl($postdeger))) { $kod = NULL; } else {  $kod =  postAl($postdeger); }
    $postdeger = "urunadi"; if(empty(postAl($postdeger))) { $urunadi = NULL; } else {  $urunadi =  postAl($postdeger); }
    $postdeger = "resim"; if(empty(postAl($postdeger))) { $resim = NULL; } else {  $resim =  postAl($postdeger); }
    $postdeger = "kategori"; if(empty(postAl($postdeger))) { $kategori = 0; } else {  $kategori =  postAl($postdeger); }
    $postdeger = "altkategori"; if(empty(postAl($postdeger))) { $altkategori = 0; } else {  $altkategori =  postAl($postdeger); }
    $postdeger = "uretici"; if(empty(postAl($postdeger))) { $uretici = 0; } else {  $uretici =  postAl($postdeger); }
    $postdeger = "alisfiyat"; if(empty(postAl($postdeger))) { $alisfiyat = "0.00"; } else {  $alisfiyat =  postAl($postdeger); }
    $postdeger = "satisfiyat"; if(empty(postAl($postdeger))) { $satisfiyat = "0.00"; } else {  $satisfiyat =  postAl($postdeger); }
    $postdeger = "stok"; if(empty(postAl($postdeger))) { $stok = 0; } else {  $stok =  postAl($postdeger); }
    $postdeger = "detay"; if(empty(postAl($postdeger))) { $detay = NULL; } else {  $detay =  postAl($postdeger); }
    $postdeger = "durum"; if(empty(postAl($postdeger))) { $durum = 0; } else {  $durum =  postAl($postdeger); }

    if(empty($kod)) { 
        $result = array("ERR" => "Ürün Barkodu Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($urunadi)) { 
        $result = array("ERR" => "Ürün Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($kategori)) { 
        $result = array("ERR" => "Ürün Kategorisi Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($uretici)) { 
        $result = array("ERR" => "Ürün Üreticisi Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`kod` = '$kod'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Barkod Numarası", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistasKtgr = "`id` = '$kategori'";
    $existValKtgr = VarmiKontrol("kategori", $kistasKtgr);

    if($existValKtgr == 0) { 
        $result = array("ERR" => "Hatalı Kategori Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $ktgrArry = bilgiGetirArray("kategori",$kistasKtgr);
    $chckKtgr = $ktgrArry["bag"];

    if($chckKtgr != 0) {
        $altkategori = $kategori;
        $kategori = $chckKtgr;
    }

    if(!empty($resim)) {
        $banner=$_FILES['resim']['name']; 
        $expbanner=explode('.',$banner);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="../../productImages/".$bannername;
        move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath); 
        $resim =  $bannername;

    }

    $urunSaveValues = "NULL, '$kod', '$urunadi', '$resim', '$kategori', '$altkategori', '$uretici', '$alisfiyat', '$satisfiyat', '$stok', '$detay', '$durum'";
    addToSql($dataAdi,$urunSaveValues,$urunDataKolonlar);

}

if($type == "Update") {
    $postdeger = "id"; if(empty(postAl($postdeger))) { $id = NULL; } else {  $id =  postAl($postdeger); }
    $postdeger = "kod"; if(empty(postAl($postdeger))) { $kod = NULL; } else {  $kod =  postAl($postdeger); }
    $postdeger = "urunadi"; if(empty(postAl($postdeger))) { $urunadi = NULL; } else {  $urunadi =  postAl($postdeger); }
    $postdeger = "resim"; if(empty(postAl($postdeger))) { $resim = NULL; } else {  $resim =  postAl($postdeger); }
    $postdeger = "kategori"; if(empty(postAl($postdeger))) { $kategori = 0; } else {  $kategori =  postAl($postdeger); }
    $postdeger = "altkategori"; if(empty(postAl($postdeger))) { $altkategori = 0; } else {  $altkategori =  postAl($postdeger); }
    $postdeger = "uretici"; if(empty(postAl($postdeger))) { $uretici = 0; } else {  $uretici =  postAl($postdeger); }
    $postdeger = "satisfiyat"; if(empty(postAl($postdeger))) { $satisfiyat = "0.00"; } else {  $satisfiyat =  postAl($postdeger); }
    $postdeger = "detay"; if(empty(postAl($postdeger))) { $detay = NULL; } else {  $detay =  postAl($postdeger); }

    if(empty($kod)) { 
        $result = array("ERR" => "Ürün Barkodu Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($urunadi)) { 
        $result = array("ERR" => "Ürün Adı Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($kategori)) { 
        $result = array("ERR" => "Ürün Kategorisi Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($uretici)) { 
        $result = array("ERR" => "Ürün Üreticisi Boş Bırakılamaz", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`kod` = '$kod' && `id` != '$id'";
    $existVal = VarmiKontrol($dataAdi, $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Barkod Numarası", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistasKtgr = "`id` = '$kategori'";
    $existValKtgr = VarmiKontrol("kategori", $kistasKtgr);

    if($existValKtgr == 0) { 
        $result = array("ERR" => "Hatalı Kategori Adı", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $ktgrArry = bilgiGetirArray("kategori",$kistasKtgr);
    $chckKtgr = $ktgrArry["bag"];

    if($chckKtgr != 0) {
        $altkategori = $kategori;
        $kategori = $chckKtgr;
    }


    if(!empty($resim)) {
        $data = explode(',', $resim);
        $resimDatasi = $data[1];
        $dosyaTur = $data[0];
        $dosyaTurexp = explode(';base64', $dosyaTur);
        $dosyaTur = $dosyaTurexp[0];
        $dosyaTurexp = explode('image/', $dosyaTur);
        $dosyaTur = $dosyaTurexp[1];
        $length = 4;
        $rndm = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnoprstuvwxyz', ceil($length/strlen($x)) )),1,$length);
        $photoAdi = date("yhimds").$rndm.".".$dosyaTur;
       

        $kistasImage = "`id` = '$id'";
        $urunArry = bilgiGetirArray($dataAdi,$kistasImage);
        $oldImage = $urunArry["resim"];
        $oldImagePath = "../../productImages/".$oldImage;

        $bannerpath="../../productImages/".$photoAdi;
        $file = fopen($bannerpath, "w");
        fwrite($file, base64_decode($resimDatasi));
        fclose($file);
        $resim =  $photoAdi;
        if(file_exists($oldImagePath) && !empty($oldImage)) {
            unlink($oldImagePath);
        }
       
    } else { 
        $kistasImage = "`id` = '$id'";
        $urunArry = bilgiGetirArray($dataAdi,$kistasImage);
        $resim = $urunArry["resim"];
    }

    $updateColumns = array('kod', 'urunadi', 'resim', 'kategori', 'altkategori', 'uretici',  'satisfiyat',  'detay');
    $updateVal = array($kod, $urunadi, $resim, $kategori, $altkategori, $uretici,  $satisfiyat,  $detay);
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

    
}

$kistas = "`id` !=  '0'";
$columnArry = array('id', 'kod', 'urunadi', 'resim', 'kategori', 'altkategori', 'uretici', 'alisfiyat', 'satisfiyat', 'stok', 'detay', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$response =  sqlAllTblForJson($dataAdi,$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$kistas = "`id` !=  '0' ORDER BY `uretici`.`adi` ASC";
$columnArry = array('id', 'adi', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$responseUretici =  sqlAllTblForJson("uretici",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$kistas = "`id` !=  '0' ORDER BY `kategori`.`adi` ASC";
$columnArry = array('id', 'adi', 'bag', 'durum');
$newClmnNameArry = array();
$numberEncodeArry = array(); 
$textEncodeArry = array();
$responseKtgr =  sqlAllTblForJson("kategori",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry); 

$result = array("ERR" => "", "resp" => $response, "respUretici" => $responseUretici, "respKtgr" => $responseKtgr); 
    echo json_encode($result);
    die();

?>