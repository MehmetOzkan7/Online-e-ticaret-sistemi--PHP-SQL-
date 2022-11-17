<?php
include("ayarlar.php");
$baglan = mysqli_connect($SqlBaglanti, $SqlKllnci, $SqlSifre, $DbAdi);

if (!$baglan) {
    echo "Veri Bankasıyla Bağlantı Kurulamadı ".mysqli_connect_error();
    exit;
}

mysqli_set_charset($baglan,"utf8-general-ci");

?>