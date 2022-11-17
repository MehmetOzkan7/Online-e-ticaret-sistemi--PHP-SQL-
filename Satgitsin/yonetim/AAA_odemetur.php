<?php
$dataAdi = odemetur;

$odemeturDataKolonlar = array('id', 'adi');
$odemeturDataKolonOlculer = array('int', 'varc');
$odemeturDataKolonSifrele = array('id' => 'code', 'adi' => 'lc8');
sqlDurumuBak($dataAdi, $odemeturDataKolonlar, $odemeturDataKolonOlculer);



$postdeger = "xxxx"; if(empty(postAl($postdeger))) { $adi = NULL; } else {  $adi =  postAl($postdeger); }



$adi = bilgiGetir($odemetur, 'adi', $kistasDgr);




$postdeger = "xxxx"; if(empty(postAl($postdeger))) { $adi = bilgiGetir($odemetur, 'adi', $kistasDgr); } else {  $adi =  postAl($postdeger); }




$odemeturSaveValues = "NULL, '$adi'";
$odemeturUpdateValues = array($id, $adi);

$columns = implode(", ",$odemeturDataKolonlar);
$sql = "INSERT INTO `$dataAdi`  ($columns)VALUES($odemeturSaveValues)";
$baglan->query($sql);

$updateVal = NULL;
foreach ($odemeturDataKolonlar as $key => $kolon) {
if($kolon != "id") { 
$updateVal = $updateVal." `".$kolon."` =  '".$odemeturUpdateValues[$key]."',"; }
}
$updateVal = substr($updateVal, 0, -1);
$sql = "UPDATE `$dataAdi` SET $updateVal WHERE `xxx` = '$xxx'";
$baglan->query($sql);

?>