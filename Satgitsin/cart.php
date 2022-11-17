<?php include 'header.php' ?>



	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Shopping Cart</div>
							<div class="bigtitle">Shopping Cart</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="title-bg">
			<div class="title">Shopping Cart</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-bordered chart sepetTabloDetay btnIcinSptDty">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Image</th>
						<th>Name</th>
						<th>Code</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">
				
				<!-- <form class="form-horizontal" role="form">
					<div id="title-bg">
					<div class="title">Ödeme Şekli</div>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" checked="">
						Kredi Kartı
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
						Nakit
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios5" value="option5">
						Sanal Veresiye
					</label>
				</div>


				</form> -->
			</div>
			<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				<div class="subtotal">
					<!-- <p>Sub Total : $26.00</p>
					<p>Vat 17% : $54.00</p> -->
				</div>
				<div class="total">Total : <span class="bigprice sptTplBedel"></span></div>
				<!-- <a href="" class="btn btn-default btn-red btn-sm">Checkout</a>
				<a href="" class="btn btn-default btn-red btn-sm">Update</a> -->
				<div class="clearfix"></div>


				<a href="#" class="btn btn-default btn-yellow doPayment">Siparişi Tamamla</a>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php' ?>