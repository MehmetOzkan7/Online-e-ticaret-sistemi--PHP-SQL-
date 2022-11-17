<?php include 'header.php'; 


$kistas = "`kullanici` =  '$userID'";
$adrsArry = bilgiGetirArray("adres",$kistas); 



	
	echo '<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Hesap Bilgilerim</div>
							<div class="bigtitle">Hesap Bilgilerim</div>
						</div>
						
					</div>
					</div>
				</div>
			</div>
		</div>
		
		<form class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kişisel Bilgiler</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" disabled placeholder="'.$userArry["isim"].'">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="last_name" disabled placeholder="'.$userArry["soyad"].'">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="email" disabled placeholder="'.$userArry["mail"].'">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="phone" disabled placeholder="'.$userArry["tel"].'">
						</div>
						
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Adres Bilgileri</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="company" disabled placeholder="'.$adrsArry["sirket"].'">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="address" disabled placeholder="'.$adrsArry["adres"].'">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="city" disabled placeholder="'.$adrsArry["sehir"].'">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="postcode" disabled placeholder="'.$adrsArry["postakodu"].'">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="country" disabled placeholder="'.$adrsArry["ulke"].'">
						</div>
						
					</div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>';
	
	

include 'footer.php' ?>