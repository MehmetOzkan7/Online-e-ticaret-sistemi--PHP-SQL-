<?php 
ob_start();
session_start();
include("ekler/baglan.php");
include("ekler/fonksiyonlar.php");
if(isset($_SESSION['user']))
{
	$userID = $_SESSION['user'];
	$userYetki = NULL;	
	$kistas = "`id` =  '$userID'";
	$userArry = bilgiGetirArray("kullanici",$kistas);
	$kistas = "`kullanici` =  '$userID' && `tur` =  '2'";
	$cuzdanTplm = getSubTotal("odemeler",$kistas,"miktar");
	$kistas = "`kullanici` =  '$userID'";
	$alverTplm = getSubTotal("alisveris",$kistas,"tutar");
	$kistas = "`kullanici` =  '$userID' && `durum` =  '0'";
	$sptTplm = getSubTotal("sepet",$kistas,"toplam");
	$klnCzdn = $cuzdanTplm - $alverTplm;

	

} else {  
$userID = NULL;
$userYetki = NULL;	
$cuzdanTplm = 0;
}
$jsİncFile = NULL;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E ticaret</title>

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>

	.urnAktifOturumYok{
		cursor:pointer; 
		font-size:14px; 
		color:#be3935
	  }

	  .urnAktif{
		cursor:pointer; 
		font-size:14px; 
		color:#be3935
	  }

	  .urnPasif {
		font-size:14px; 
		color:#707780
	  }

	  
	  </style>
</head>
<body>
	<div id="wrapper">
		<div class="header"><!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo">
						<a href="index.php"><img src="images\logo.png" alt="logo" class="logo img-responsive"></a>
					</div>
					<div class="col-md-8"> 
						<?php if(empty($userID)){  ?>
						<input id="userPerm" type="hidden" value="0">
						<div class="pushright">
							<div class="top">
								<a href="#" id="reg" class="btn btn-default btn-dark">Giriş Yap<span>--ya da--</span>Kayıt Ol</a>
								<div class="regwrap">
									<div class="row">
										<div class="col-md-6 regform">
											<div class="title-widget-bg">
												<div class="title-widget">Giriş Yap</div>
											</div>
											<form id="loginForm" role="form">
											<div class="row text-center text-danger" id="loginErrPlace"></div>
												<div class="form-group">
													<input type="text" class="form-control" name="mail" placeholder="E Posta Adresiniz">
													<input type="hidden"  name="type" value="login">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" name="sifre" placeholder="Şifreniz">
												</div>
												<div class="form-group">
													<button type="button" class="btn btn-default btn-red btn-sm loginBtn">Giriş Yap</button>
												</div>
											</form>
										</div>
										<div class="col-md-6">
											<div class="title-widget-bg">
												<div class="title-widget">Kayıt ol</div>
											</div>
											<p>
												Müşterimiz değil misiniz? Hemen kayıt olun...
											</p>
											<form method="get" action="register.php">
												<button class="btn btn-default btn-yellow">Kayıt Ol</button>
												
											</form>

											<hr>

											<form method="get" action="register.php">
												
												<button class="btn btn-default btn-yellow">Yönetici Girişi</button>
											</form>
											
										</div>
									</div>
								</div>
								
							
							</div>
						</div> <?php  } else {
							echo '<input id="userPerm" type="hidden" value="1"><ul class="small-menu" style="padding: 12px 18px 0px 0px; background: #525962;"><!--small-nav -->
							<li><a href="cikis.php" class="mycheck" style="background: url(images/logOut.png) no-repeat; color:white;">Çıkış Yap</a></li>
						</ul><!--small-nav -->';
						}?>
					</div>
				</div>
			</div>
			<div class="dashed"></div>
		</div><!--Header -->
		<div class="main-nav"><!--end main-nav -->
		
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="index.php" class="active">Anasayfa</a><div class="curve"></div></li>
									
									
									<li><a href="urunlersayf.php">Ürünler</a></li>
									
									<li><a href="hakkimizdasayf.php">Hakkımızda</a></li>
									<li><a href="iletisim.php">İletişim</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 machart">
							<?php  
							if(!empty($userID)) { 
								echo '<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Cart</span>|<span class="allprice">'.$klnCzdn.' TL / <i class="sptTplBedel">0.00</i>  </span></button>';
							}
							?>
							
							<div class="popcart">
								<table class="table table-condensed popcart-inner btnIcinSptDty">
									<tbody>
										
									</tbody>
								</table>
								<!-- <span class="sub-tot">Sub-Total : <span>$277.60</span> | <span>Vat (17.5%)</span> : $36.00 </span>
								<br> -->
								<div class="btn-popcart">
									<a href="cart.php" class="btn btn-default btn-red btn-sm closeSepet">Siparişi Bitir</a>
								</div>
								<div class="popcart-tot">
									<p>
										Toplam<br>
										<span class="sptTplBedel"></span>
									</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end main-nav -->

		<div class="container">
			<?php
			if(!empty($userID)) {
				echo '<ul class="small-menu"><!--small-nav -->
				<li><a href="hesabim.php" class="myacc">Hesabım</a></li>
				<li><a href="gecmis.php" class="myshop">Geçmiş Siparişlerim</a></li>
				<li><a href="cart.php" class="mycheck">Sepete Git/Ödeme Ekranı</a></li>
				
			</ul><!--small-nav -->';
			}
			
			?>
			<div class="clearfix"></div>
			<div class="lines"></div>


		</div>
