<?php include 'header.php' ?>


	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Register</div>
							<div class="bigtitle">Register</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		<form id="registerForm" class="form-horizontal checkout" role="form">
		<div class="row text-center text-danger" id="errPlace"></div>
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Personal Details</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="isim" placeholder="Name">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="soyad" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="mail" placeholder="Email">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="tel" placeholder="Phone">
							<input type="hidden"  name="type" value="register">
						</div>
						
					</div>
					<div class="title-bg">
						<div class="title">Account Details</div>
					</div>
					<div class="form-group dob">
					<div class="col-sm-6">
							<input type="password" class="form-control" name="sifre" placeholder="Password">
						</div>
					<div class="col-sm-6">
							<input type="password" class="form-control" name="sifrerpt" placeholder="Confirm Password">
						</div>
						
					</div>
					
					<button type="button" class="btn btn-default btn-red sendRqst">Register</button>
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Your address</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="sirket" placeholder="Company">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="adres" placeholder="Address">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="sehir" placeholder="city">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="postakodu" placeholder="Post Code">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="ulke" placeholder="country">
						</div>
						
					</div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>
	
	

<?php  include ('footer.php'); ?>