<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
    
} else {  }
include("../ekler/fonksiyonlar.php");

$dataAdi = "kullanici";

$kullaniciDataKolonlar = array('id', 'isim', 'soyad', 'mail', 'sifre', 'tel', 'tarih', 'ip', 'yetki', 'durum');
$kullaniciDataKolonOlculer = array('int', 'varc', 'varc', 'varc', 'varc', 'varc', 'dtme', 'varc', 'int', 'int');
sqlDurumuBak($dataAdi, $kullaniciDataKolonlar, $kullaniciDataKolonOlculer);

$dataAdi = "adres";

$adresDataKolonlar = array('id', 'kullanici', 'adres', 'postakodu', 'sehir', 'ulke', 'sirket');
$adresDataKolonOlculer = array('int', 'int', 'lng', 'varc', 'varc', 'varc', 'varc');
sqlDurumuBak($dataAdi, $adresDataKolonlar, $adresDataKolonOlculer);

$postdeger = "type"; if(empty(postAl($postdeger))) { $type = NULL; } else {  $type =  postAl($postdeger); }

if($type == "register"){
    $postdeger = "isim"; if(empty(postAl($postdeger))) { $isim = NULL; } else {  $isim =  postAl($postdeger); }
    $postdeger = "soyad"; if(empty(postAl($postdeger))) { $soyad = NULL; } else {  $soyad =  postAl($postdeger); }
    $postdeger = "mail"; if(empty(postAl($postdeger))) { $mail = NULL; } else {  $mail =  postAl($postdeger); }
    $postdeger = "sifre"; if(empty(postAl($postdeger))) { $sifre = NULL; } else {  $sifre =  postAl($postdeger); }
    $postdeger = "sifrerpt"; if(empty(postAl($postdeger))) { $sifrerpt = NULL; } else {  $sifrerpt =  postAl($postdeger); }
    $postdeger = "tel"; if(empty(postAl($postdeger))) { $tel = NULL; } else {  $tel =  postAl($postdeger); }
    $postdeger = "sirket"; if(empty(postAl($postdeger))) { $sirket = NULL; } else {  $sirket =  postAl($postdeger); }
    $postdeger = "yetki"; if(empty(postAl($postdeger))) { $yetki = 0; } else {  $yetki =  postAl($postdeger); }
    $postdeger = "durum"; if(empty(postAl($postdeger))) { $durum = 1; } else {  $durum =  postAl($postdeger); }
    $tarih = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    $durum = 1;

    
    $postdeger = "adres"; if(empty(postAl($postdeger))) { $adres = NULL; } else {  $adres =  postAl($postdeger); }
    $postdeger = "postakodu"; if(empty(postAl($postdeger))) { $postakodu = NULL; } else {  $postakodu =  postAl($postdeger); }
    $postdeger = "sehir"; if(empty(postAl($postdeger))) { $sehir = NULL; } else {  $sehir =  postAl($postdeger); }
    $postdeger = "ulke"; if(empty(postAl($postdeger))) { $ulke = NULL; } else {  $ulke =  postAl($postdeger); }

    if(empty($isim) || empty($soyad) || empty($mail) || empty($sifre) || empty($tel) || empty($adres) || empty($postakodu) || empty($sehir) || empty($ulke)) {
        $result = array("ERR" => "Tüm Alanların Doldurulması Gerekmete", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    if(empty($sirket)) {
        $result = array("ERR" => "Tüm Alanların Doldurulması Gerekmete", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    if($sifre != $sifrerpt){ 
        $result = array("ERR" => "Şifre Kontrolü Başarısız", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kistas = "`mail` = '$mail'";
    $existVal = VarmiKontrol("kullanici", $kistas);

    if($existVal != 0) { 
        $result = array("ERR" => "Kayıtlı Mail Adresi", "resp" => ""); 
        echo json_encode($result);
        die();
    }

    $kullaniciSaveValues = "NULL, '$isim', '$soyad', '$mail', '$sifre', '$tel', '$tarih', '$ip', '$yetki', '$durum'";
    addToSql("kullanici",$kullaniciSaveValues,$kullaniciDataKolonlar);
    $kistas = "`id` != '0' ORDER BY `kullanici`.`id` DESC";
    $kullaniciArray = bilgiGetirArray("kullanici",$kistas);
    $kullanici = $kullaniciArray["id"];

    $adresSaveValues = "NULL, '$kullanici', '$adres', '$postakodu', '$sehir', '$ulke', '$sirket'";
    addToSql("adres",$adresSaveValues,$adresDataKolonlar);
    $_SESSION["user"] = $kullanici;
    $result = array("ERR" => "", "resp" => "OK"); 
        echo json_encode($result);
        die();

    
}

if($type == "login"){ 
    $postdeger = "mail"; if(empty(postAl($postdeger))) { $mail = NULL; } else {  $mail =  postAl($postdeger); }
    $postdeger = "sifre"; if(empty(postAl($postdeger))) { $sifre = NULL; } else {  $sifre =  postAl($postdeger); }

    $kistas = "`mail` = '$mail' && `sifre` = '$sifre' && `yetki` = '1'";
    $existVal = VarmiKontrol("kullanici", $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı Eposta Yada Şifre", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $kullaniciArray = bilgiGetirArray("kullanici",$kistas);
    $kullanici = $kullaniciArray["id"];
    $_SESSION["user"] = $kullanici;
    $result = array("ERR" => "", "resp" => "OK"); 
        echo json_encode($result);
        die();

}

?>