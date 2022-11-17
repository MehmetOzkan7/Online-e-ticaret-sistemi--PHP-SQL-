<?php
ob_start();
session_start();
if(isset($_SESSION['admin']))
{
    
} else {  }
include("../ekler/fonksiyonlar.php");


    $postdeger = "mail"; if(empty(postAl($postdeger))) { $mail = NULL; } else {  $mail =  postAl($postdeger); }
    $postdeger = "sifre"; if(empty(postAl($postdeger))) { $sifre = NULL; } else {  $sifre =  postAl($postdeger); }

    $kistas = "`mail` = '$mail' && `sifre` = '$sifre' && `yetki` = '2'";
    $existVal = VarmiKontrol("kullanici", $kistas);

    if($existVal == 0) { 
        $result = array("ERR" => "Hatalı Eposta Yada Şifre", "resp" => ""); 
        echo json_encode($result);
        die();
    }
    $kullaniciArray = bilgiGetirArray("kullanici",$kistas);
    $kullanici = $kullaniciArray["id"];
    $_SESSION["admin"] = $kullanici;
    $result = array("ERR" => "", "resp" => "OK"); 
        echo json_encode($result);
        die();


?>