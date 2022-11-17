<?php





function textencodeArray() { 
$gvnlkArry = array(
    "a" => "4", "b" => "y", "c" => "u","d" => "o","e" => "t","f" => "v","g" => "3","h" => "5","i" => "p","j" => "7",
    "k" => "_","l" => "0","m" => "n","n" => "m","o" => "d","p" => "i","r" => "s","s" => "r","t" => "e",
    "u" => "c","v" => "f","y" => "b","z" => "2","0" => "l","1" => "6","2" => "z","3" => "g","4" => "a","5" => "h","6" => "1","7" => "j","8" => "o","9" => "u","_" => "k");
return($gvnlkArry);
}

function carpanDeger(){
    $carpan = 3;
    return($carpan);
}

function toplamDeger(){
    $toplam = 1522;
    return($toplam);
}

function textEncode($value){
    $gvnlkArry = textencodeArray();
    $valLength = strlen($value); 
    $newVal = NULL;
    for ($i=0; $i < $valLength ; $i++) { 
    $expVal = substr($value, $i, 1);
    if (in_array($expVal, $gvnlkArry)) {
    $newVal = $newVal.$gvnlkArry[$expVal]; } else {  $newVal = $newVal.$expVal; }
    } return($newVal);
 }
 
 function textDecode($value){
    $gvnlkArry = textencodeArray();
    $valLength = strlen($value); 
    $newVal = NULL;
    $reverseGvnlkArry = array_flip($gvnlkArry);
    for ($i=0; $i < $valLength ; $i++) { 
    $expVal = substr($value, $i, 1);
    if (in_array($expVal, $gvnlkArry)) {
        $newVal = $newVal.$reverseGvnlkArry[$expVal]; } else {  $newVal = $newVal.$expVal; }
    } return($newVal);
}

function numberEncode($value){ 
    $carpan = carpanDeger();
    $toplam = toplamDeger();
    $newVal = ($value * $carpan) + $toplam;
    $newVal = textEncode($newVal);
    return($newVal);
}

function numberDecode($value){ 
    $value = textDecode($value);
    $carpan = carpanDeger();
    $toplam = toplamDeger();
    $newVal = ($value - $toplam) / $carpan;
    return($newVal);
}

function photoUploadFromJson($photoPostName, $oldPhotoName, $photoUrl, $photoMaxDim) { 
$photoAdi = NULL;
if(!empty($photoPostName)) {
$photo = postAl($photoPostName); 
if(!empty($photo) && $photo != "null" ) {
$parcala = explode("base64", $photo); 
$photo = $parcala[1];
$turGenel = $parcala[0];
$imajmi = strpos($turGenel, "image");
if ($imajmi !== false) { 
$dsyaTuru = NULL;
$sorgu = "jpg";
$turSor = strpos($turGenel,$sorgu);
if ($turSor !== false) {  $dsyaTuru = $sorgu;  }
$sorgu = "jpeg";
$turSor = strpos($turGenel,$sorgu);
if ($turSor !== false) {  $dsyaTuru = $sorgu;  }
$sorgu = "JPG";
$turSor = strpos($turGenel,$sorgu);
if ($turSor !== false) {  $dsyaTuru = $sorgu;  }
$sorgu = "JPEG";
$turSor = strpos($turGenel,$sorgu);
if ($turSor !== false) {  $dsyaTuru = $sorgu;  }
$sorgu = "png";
$turSor = strpos($turGenel,$sorgu);
if ($turSor !== false) {  $dsyaTuru = $sorgu;  }
$sorgu = "gif";
$turSor = strpos($turGenel,$sorgu);
if ($turSor !== false) {  $dsyaTuru = $sorgu;  }

if(!empty($dsyaTuru)) { 
$length = 4;
$rndm = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnoprstuvwxyz', ceil($length/strlen($x)) )),1,$length);
$photoAdi = date("yhimds").$rndm.".".$dsyaTuru;
$silPhotoYol = $photoUrl.$oldPhotoName ; 
if(is_file($silPhotoYol)) { unlink($silPhotoYol); }
$photoYol = $photoUrl.$photoAdi ; 
$data = base64_decode($photo);    
file_put_contents($photoYol, $data); 
$maxDim = $photoMaxDim; 
$file_name = $photoYol;
list($width, $height, $type, $attr) = getimagesize( $file_name );
if ( $width > $maxDim || $height > $maxDim ) {
    $target_filename = $file_name;
    $ratio = $width/$height;
    if( $ratio > 1) {
        $new_width = $maxDim;
        $new_height = $maxDim/$ratio;
    } else {
        $new_width = $maxDim*$ratio;
        $new_height = $maxDim;
    }
    $src = imagecreatefromstring( file_get_contents( $file_name ) );
    $dst = imagecreatetruecolor( $new_width, $new_height );
    imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
    imagedestroy( $src );
    imagejpeg( $dst, $target_filename ); // adjust format as needed
    imagedestroy( $dst );
}



 }  }  } }

return($photoAdi);
}

function delSql($dataAdi,$kistas){
    include("baglan.php");
    $sql = "DELETE FROM `$dataAdi` WHERE $kistas";
    $baglan->query($sql);
}

function updateToSql($dataAdi,$updateArray,$updateValues,$kistas){
    include("baglan.php");
    $updateVal = NULL;
    foreach ($updateArray as $key => $kolon) {
    if($kolon != "id") { 
    $updateVal = $updateVal." `".$kolon."` =  '".$updateValues[$key]."',"; }
    }
    $updateVal = substr($updateVal, 0, -1);
    $sql = "UPDATE `$dataAdi` SET $updateVal WHERE $kistas";
    $baglan->query($sql);
}

function addToSql($dataAdi,$saveValues,$dataKolonlar){
    include("baglan.php");
    $columns = implode(", ",$dataKolonlar);
    $sql = "INSERT INTO `$dataAdi`  ($columns)VALUES($saveValues)";
    $baglan->query($sql);

}


function SqlVarmiKontrol($tablo) {
include("baglan.php");
$query = "SELECT * FROM `$tablo`"; 
if(!$baglan->query($query)) { $sonuc = 0;  } else { $sonuc = 1;   }
return($sonuc); }




function VarmiKontrol($tablo, $kistas) {
$rowcountVarmi = 0; 
include("baglan.php");
$query = "SELECT * FROM `$tablo`"; 
if(!$baglan->query($query)) {   } else { 
$queryVarmi = "SELECT * FROM `$tablo` WHERE $kistas";
$resultVarmi = mysqli_query( $baglan, $queryVarmi );
$rowcountVarmi = mysqli_num_rows( $resultVarmi );
$resultVarmi->close();  
return($rowcountVarmi);  } }


function bilgiGetirArray($tablo,$kistas) { 
$satirBilgiAl = NULL;
include("baglan.php");
$query = "SELECT * FROM `$tablo`";
if(!$baglan->query($query)) {  } else { 
$sonucBilgiAl = VarmiKontrol($tablo, $kistas);
if ($sonucBilgiAl > 0) { 
$queryBilgiAl = "SELECT * FROM `$tablo` WHERE $kistas";
$resultBilgiAl = mysqli_query($baglan, $queryBilgiAl);
$rowcountBilgiAl = mysqli_num_rows($resultBilgiAl);
$resultBilgiAl->close(); 
if($rowcountBilgiAl != 0) { 
$sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
$satirBilgiAl = $sonucBilgiAl->fetch_array(MYSQLI_ASSOC);
$sonucBilgiAl->close(); } }}
return($satirBilgiAl); }


function sqlAllTblForJson($tablo,$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry) { 
    if (array_key_exists("name", $newClmnNameArry)) { echo $newClmnNameArry["name"]; }
    $rowArray = array();
    $resultArray = array();
    $satirBilgiAl = NULL;
    include("baglan.php");
    $query = "SELECT * FROM `$tablo`";
    if(!$baglan->query($query)) {  } else { 
    $sonucBilgiAl = VarmiKontrol($tablo, $kistas);
    if ($sonucBilgiAl > 0) { 
    $queryBilgiAl = "SELECT * FROM `$tablo` WHERE $kistas";
    $resultBilgiAl = mysqli_query($baglan, $queryBilgiAl);
    $rowcountBilgiAl = mysqli_num_rows($resultBilgiAl);
    $resultBilgiAl->close(); 
    if($rowcountBilgiAl != 0) { 
    $sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
    while($row = mysqli_fetch_array($sonucBilgiAl)) { 
        $rowArray = array(); 
        foreach ($columnArry as $value) { 
            $valueName = $value;
            $addValue = $row[$value]; 
            if(in_array($value,$numberEncodeArry)){
                $addValue =numberEncode($addValue);
            }
            if(in_array($value,$textEncodeArry)){
                $addValue =textEncode($addValue);
            }
            if (array_key_exists($value, $newClmnNameArry)) {
                $valueName = $newClmnNameArry[$value];
            }
            $rowArray[$valueName] =  $addValue;  
        }
                
       array_push($resultArray,$rowArray);
    }
    $sonucBilgiAl->close(); } }}
    return($resultArray);


}


function postAl($deger) {
$sonuc = NULL; 
if(isset($_REQUEST[$deger])) { 
include("baglan.php");
$sonuc = mysqli_real_escape_string($baglan, $_POST[$deger]); }
return($sonuc); }

function getAl($deger) {
$sonuc = NULL; 
if(isset($_REQUEST[$deger])) { 
include("baglan.php");
$sonuc = mysqli_real_escape_string($baglan, $_GET[$deger]);  }
return($sonuc); }

function numericCyrpto($number)
{
    $number = $number*6;
    $number = $number + 1423;
    return $number;
}

function numericCyrptoDecode($number)
{
    $number = $number - 1423;
    $number = $number / 6;
    return $number;
}

function startAndEndDateToMounth($sdate, $edate){
    
    $date_diff = abs(strtotime($edate) - strtotime($sdate));

    $years = floor($date_diff / (365*60*60*24));
    $months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
    
    return $years * 12 + $months;

}



function kolonKur($table, $column ,$uzunluk) {
include("baglan.php");
if($uzunluk == "varc") { $uzunluk = "VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL"; } 
if($uzunluk == "int") { $uzunluk = "INT( 11 ) NOT NULL"; } 
if($uzunluk == "dcml") { $uzunluk = "DECIMAL( 11, 2 ) NOT NULL"; } 
if($uzunluk == "date") { $uzunluk = "DATE NOT NULL"; } 
if($uzunluk == "dtme") { $uzunluk = "DATETIME NOT NULL"; } 
if($uzunluk == "lng") { $uzunluk = "LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL"; } 
$ekle = "ALTER TABLE $table ADD COLUMN IF NOT EXISTS `$column` $uzunluk";
//$ekle = "ALTER TABLE `$table` ADD `$column` $uzunluk"; 
$baglan->query($ekle); }

function TekkolonEkle($table, $column ,$uzunluk) 
{
    include("baglan.php");
    if($uzunluk == "varc") { $uzunluk = "VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL"; } 
    if($uzunluk == "int") { $uzunluk = "INT( 11 ) NOT NULL"; } 
    if($uzunluk == "dcml") { $uzunluk = "DECIMAL( 11, 2 ) NOT NULL"; } 
    if($uzunluk == "date") { $uzunluk = "DATE NOT NULL"; } 
    if($uzunluk == "dtme") { $uzunluk = "DATETIME NOT NULL"; } 
    if($uzunluk == "lng") { $uzunluk = "LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL"; } 
        $qry = "SELECT `$column` FROM `$table`";
        if(!$baglan->query($qry)) 
        { 
            $ekle = "ALTER TABLE `$table` ADD `$column` $uzunluk"; 
            $baglan->query($ekle);
        }  
}

function TekkolonKaldir($table, $column) 
{
    include("baglan.php");
    $qry = "SELECT `$column` FROM `$table`";
    if($baglan->query($qry)) 
    { 
        $ekle = "ALTER TABLE `$table` DROP `$column`";
        $baglan->query($ekle); 
    } 
    
} 


function sqlDurumuBak($dataAdi, $dataKolanlar, $dataKolanOlculer){
include("baglan.php");
$query = "CREATE TABLE IF NOT EXISTS `$dataAdi` ( `id` INT(11) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;";
$baglan->query($query);
foreach ($dataKolanlar as $key => $kolon) { 
    kolonKur($dataAdi, $kolon ,$dataKolanOlculer[$key]);
}

// $query = "SELECT * FROM `$dataAdi`";
// if(!$baglan->query($query)) { 
// $table = "CREATE TABLE $dataAdi ( `id` INT(11) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;";
// $baglan->query($table);
// foreach ($dataKolanlar as $key => $kolon) {  
// $kntrl = "SELECT `$kolon` FROM `$dataAdi`"; 
// if(!$baglan->query($kntrl)) {  kolonKur($dataAdi, $kolon ,$dataKolanOlculer[$key]); } }
//  } else {
// foreach ($dataKolanlar as $key => $kolon) {  
// $kntrl = "SELECT `$kolon` FROM `$dataAdi`"; 
// if(!$baglan->query($kntrl)) {  kolonKur($dataAdi, $kolon ,$dataKolanOlculer[$key]); } }
//  }  

}







function timeTravel($time){
    $time = date("Y-m-d H:i:s", strtotime($time));
                            $time = new DateTime($time);
                            $nowTiming = date("Y-m-d H:i:s");
                            $now = new DateTime($nowTiming);
                            $timeDif = $time->diff($now);
                            $timeDifVal = $timeDif->format('%d');
                            $timeVal = "days";
                            if ( $timeDifVal <= 0 ) {
                                 $timeDifVal = $timeDif->format('%h');
                                $timeVal = "hours";  
                          }

                          if ( $timeDifVal <= 0 ) {
                            $timeDifVal = $timeDif->format('%i');
                           $timeVal = "minute";  
                     }

                     if ( $timeDifVal <= 0 ) {
                        $timeDifVal = NULL;
                       $timeVal = "now";  
                 }
                 $response = $timeDifVal." ".$timeVal;
    return($response);             
 }


 function systemResponse($error,$response) {
    if(empty($error)) { $error = ""; }
    $result = array("ERR" => $error,"resp" => $response);
    echo json_encode($result);
}

function getSubTotal($tablo,$kistas,$ttlClmn){
    $sonuc = 0.00;
    include("baglan.php");
    $sql = "SELECT SUM(`$ttlClmn`) FROM `$tablo` WHERE $kistas";
    $q = mysqli_query($baglan, $sql);
    $row = mysqli_fetch_array($q);
    if(!empty($row[0])) {
        $sonuc = $row[0];
    }
    return($sonuc);
}
?>