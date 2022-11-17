<?php include 'header.php';
$ktgr = 0;
$subKtgr = 0;
$page = 1; 
$end = 9;
$topTag = "Tüm Ürünler";
if(isset($_REQUEST["ktgr"])) {  $ktgr = mysqli_real_escape_string($baglan, $_GET["ktgr"]);  }
if(isset($_REQUEST["subKtgr"])) { $subKtgr = mysqli_real_escape_string($baglan, $_GET["subKtgr"]);  }
if(isset($_REQUEST["page"])) { $page = mysqli_real_escape_string($baglan, $_GET["page"]); 
if($page <= 0) { $page = 1; }
}

$kistas = "`durum` =  '1'";
if($ktgr != 0) { $kistas = $kistas." && `kategori` =  '$ktgr'"; 
$ktgrArry = bilgiGetirArray("kategori","`id` =  '$ktgr'");
$topTagFirst = $ktgrArry["adi"];
$topTag = $topTagFirst." > Tümü";
}
if($subKtgr != 0) { $kistas = $kistas." && `altkategori` =  '$subKtgr'"; 
	$ktgrArry = bilgiGetirArray("kategori","`id` =  '$subKtgr'");
	$topTag = $topTagFirst." > ".$ktgrArry["adi"];;
}

$countProduct = VarmiKontrol("urun", $kistas);
$pageCount = ceil($countProduct / $end);
if($page > $pageCount){ $page = $pageCount; }
$start = ($page - 1) * $end;
$kistas = $kistas." LIMIT $start,$end";

?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#"><?php echo $topTag; ?></a></div>
							<div class="bigtitle">Category</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Category - All products</div>
				<!-- <div class="title-nav">
					<a href="category.htm"><i class="fa fa-th-large"></i>grid</a>
					<a href="category-list.htm"><i class="fa fa-bars"></i>List</a>
				</div> -->
			</div>
			<div class="row prdct"><!--Products-->
			<?php
			$queryBilgiAl = "SELECT * FROM `urun` WHERE $kistas";
			$sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
			while($row = mysqli_fetch_array($sonucBilgiAl)) { 
						$mxLn = 20;
						$urnClass = "urnPasif";
						$urnText = "Stokta Kalmadı";
						if($row["stok"] >0) {
							$urnClass = "urnAktif";
							$urnText = '<i class="fa fa-plus-circle"></i> Sepete Ekle';
							if(empty($userID)) { $urnClass = "urnAktifOturumYok"; }
						}
						if(strlen($row["urunadi"]) > $mxLn) { $row["urunadi"]= substr($row["urunadi"],0,$mxLn); }
						echo '<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<a style="cursor:unset"><img src="productImages/'.$row["resim"].'" alt="" class="img-responsive"></a>
								<div class="pricetag blue" style="top:66%"><div class="inner" style="font-size:14px;">'.$row["satisfiyat"].' TL</div></div>
							</div>
							<span class="smalltitle"><a>'.$row["urunadi"].'</a></span>
							<span class="smalldesc '.$urnClass.'" data-id="'.$row["id"].'">'.$urnText.'</span>
						</div>
						</div>';
			
			}
			$sonucBilgiAl->close();
			?>
				
			</div><!--Products-->
			<ul class="pagination shop-pag"><!--pagination-->
			<?php
			$prevPage = $page - 1;
			if($prevPage <= 0) { $prevPage = 1; }
				echo '<li><a href="urunlersayf.php?ktgr='.$ktgr.'&&subKtgr='.$subKtgr.'&&page='.$prevPage.'"><i class="fa fa-caret-left"></i></a></li>';
				for ($i=1; $i <= $pageCount; $i++) { 
					echo '<li><a href="urunlersayf.php?ktgr='.$ktgr.'&&subKtgr='.$subKtgr.'&&page='.$i.'">'.$i.'</a></li>';
				}
				$next = $page + 1;
				if($pageCount < $next) { $next = $pageCount; }
				echo '<li><a href="urunlersayf.php?ktgr='.$ktgr.'&&subKtgr='.$subKtgr.'&&page='.$next.'"><i class="fa fa-caret-right"></i></a></li>';
			?>
				
				
				
			</ul><!--pagination-->

		</div>
		<?php include 'sidebar.php' ?>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php' ?>