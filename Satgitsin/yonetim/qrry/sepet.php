<?php
include("../ekler/fonksiyonlar.php");
$dataAdi = "sepet";

$sepetDataKolonlar = array('id', 'urun', 'adet', 'fiyat', 'toplam', 'durum', 'alverno');
$sepetDataKolonOlculer = array('int', 'int', 'int', 'dcml', 'dcml', 'int', 'varc');
sqlDurumuBak($dataAdi, $sepetDataKolonlar, $sepetDataKolonOlculer);

$alvrsCarpan = 7;
$alvrsTplm = 1548;

$dataAdi = "alisveris";

$alisverisDataKolonlar = array('id', 'tarih', 'tutar', 'no', 'durum');
$alisverisDataKolonOlculer = array('int', 'dtme', 'dcml', 'varc', 'int');
sqlDurumuBak($dataAdi, $alisverisDataKolonlar, $alisverisDataKolonOlculer);

?>