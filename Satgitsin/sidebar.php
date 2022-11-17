<?php 
$allKtgrArry = array();
$mainKtgrArry = array();
$subKtgrArry = array();
$kistas = "`durum` !=  '0' ORDER BY `kategori`.`adi` ASC";
$tablo = "kategori";
$queryBilgiAl = "SELECT * FROM `$tablo` WHERE $kistas";
$sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
while($row = mysqli_fetch_array($sonucBilgiAl)) { 
	$allKtgrArry[$row["id"]] = $row["adi"];
	if($row["bag"] == 0) {
		$mainKtgrArry[$row["id"]] = $row["adi"];
	}  
	
	
}
$sonucBilgiAl->close();

echo '<div class="col-md-3"><!--sidebar-->
					<div class="title-bg">
						<div class="title">Kategoriler</div>
					</div>

					<div class="categorybox" style="display: flex;">
						<ul>';
						foreach ($mainKtgrArry as $key => $value) { 
							echo '<li><a href="urunlersayf.php?ktgr='.$key.'&&subKtgr=0" data-mainKtgr="'.$key.'" data-subKtgr="0">'.$value.'</a></li>';
							$kistas = "`bag` =  '$key'";
							$existVal = VarmiKontrol("kategori", $kistas);
							if($existVal != 0) { 
								$queryBilgiAl = "SELECT * FROM `$tablo` WHERE $kistas";
								$sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
								while($row = mysqli_fetch_array($sonucBilgiAl)) { 
									echo '<ul>
									<li><a href="urunlersayf.php?ktgr='.$key.'&&subKtgr='.$row["id"].'" data-mainKtgr="'.$key.'" data-subKtgr="'.$row["id"].'">'.$row["adi"].'</a></li>
									</ul>';
								}
								$sonucBilgiAl->close();
							}
						}
							echo '</div>

				

				</div><!--sidebar-->'; ?>