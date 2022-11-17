<?php ?> 
<div class="f-widget featpro">
		<div class="container">
			<div class="title-widget-bg">
				<div class="title-widget">Ürünler</div>
				<div class="carousel-nav">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			</div>
			<div id="product-carousel" class="owl-carousel owl-theme">
				<?php
					$kistas = "`durum` =  '1' ORDER BY RAND() LIMIT 7";
					$columnArry = array('id', 'kod', 'urunadi', 'resim', 'kategori', 'altkategori', 'satisfiyat', 'stok', 'detay');
					$newClmnNameArry = array();
					$numberEncodeArry = array(); 
					$textEncodeArry = array();
					$respUrnYedili =  sqlAllTblForJson("urun",$kistas,$columnArry,$newClmnNameArry,$numberEncodeArry,$textEncodeArry);

					foreach ($respUrnYedili as $key => $value) {
						$mxLn = 20;
						$urnClass = "urnPasif";
						$urnText = "Stokta Kalmadı";
						if($value["stok"] >0) {
							$urnClass = "urnAktif";
							$urnText = '<i class="fa fa-plus-circle"></i> Sepete Ekle';
							if(empty($userID)) { $urnClass = "urnAktifOturumYok"; }
						}
						if(strlen($value["urunadi"]) > $mxLn) { $value["urunadi"]= substr($value["urunadi"],0,$mxLn); }
						echo '<div class="item">
						<div class="productwrap">
							<div class="pr-img">
								
								<a style="cursor:unset"><img src="productImages/'.$value["resim"].'" alt="" class="img-responsive"></a>
								<div class="pricetag blue" style="top:66%"><div class="inner" style="font-size:14px;"><span>'.$value["satisfiyat"].' TL</span></div></div>
							</div>
								<span class="smalltitle"><a>'.$value["urunadi"].'</a></span>
								<span class="smalldesc '.$urnClass.'" data-id="'.$value["id"].'">'.$urnText.'</span>
						</div>
					</div>';
					}

				?>
				
				
				
				
			</div>
		</div>
	</div>