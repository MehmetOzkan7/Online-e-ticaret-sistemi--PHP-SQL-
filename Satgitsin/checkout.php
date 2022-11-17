<?php include 'header.php'?>


	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Checkout</div>
							<div class="bigtitle">Checkout</div>
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
			<div class="col-md-6 new-cus">
				<div class="title-bg">
					<div class="title">New Customer</div>
				</div>
				<form role="form">
					<p>Checkout Options</p>
					<div class="form-group">
						<div class="radio">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
							Register Account
						  </label>
						</div>
						<div class="radio">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Guest Checkout
						  </label>
						</div>
					</div>
					<p>
						By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have made.
					</p>
					<button class="btn btn-default btn-red">Continue</button>
				</form>
			</div>
			<div class="col-md-6 al-cus">
				<div class="title-bg">
					<div class="title">Already Customer</div>
				</div>
				<form role="form">
					<p>
						I am returning customer
					</p>
					<div class="form-group">
						<input type="text" class="form-control" id="exampleInput" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="exampleInpupas" placeholder="Password">
					</div>
					<button class="btn btn-default btn-red">Login</button>
				</form>
			</div>
		</div>
		<form class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6 bill">
					<div class="title-bg">
						<div class="title">Billing Address</div>
					</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="name" placeholder="Name">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="last_name" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" id="company" placeholder="Company">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" id="address" placeholder="Address">
							</div>
						</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="city" placeholder="City">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="post_code" placeholder="Post Code">
							</div>
						</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="country" placeholder="Country">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="state" placeholder="States">
							</div>
						</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="phone" placeholder="Phone Number">
							</div>
						</div>
				</div>
				<div class="col-md-6 ship">
					<div class="title-bg">
						<div class="title">Shipping Address</div>
					</div>
					<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="name-2" placeholder="Name">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="last_name-2" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" id="company-2" placeholder="Company">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" class="form-control" id="address-2" placeholder="Address">
							</div>
						</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="city-2" placeholder="City">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="post_code-2" placeholder="Post Code">
							</div>
						</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="country-2" placeholder="Country">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="state-2" placeholder="States">
							</div>
						</div>
						<div class="form-group dob">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email-2" placeholder="Email">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="phone-2" placeholder="Phone Number">
							</div>
						</div>
				</div>
			</div>
			<div class="title-bg">
				<div class="title">Order Comments</div>
			</div>
			<p>Notes about order, for example instructions for delivery.</p>
			<div class="form-group ">
				<div class="col-sm-12">
					<textarea class="form-control"></textarea>
				</div>
			</div>
			<div class="checkbox">
				<label>
				  <input type="checkbox">  I have read and agree to the Terms and conditions
				</label>
			</div>
			<div id="title-bg">
				<div class="title">Payment Method</div>
			</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" checked="">
						Credit Card 
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
						Paypal 
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios5" value="option5">
						Direct Bank Transfer
					</label>
				</div>
			<div class="title-bg">
				<div class="title">Confirm Order</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered chart">
					<thead>
						<tr>
							<th>Name</th>
							<th>Model</th>
							<th>Item No.</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Some Camera</td>
							<td>PR - 2</td>
							<td>225883</td>
							<td>1</td>
							<td>$94.00</td>
							<td>$94.00</td>
						</tr>
						<tr>
							<td>Some Camera</td>
							<td>PR - 2</td>
							<td>225883</td>
							<td>1</td>
							<td>$94.00</td>
							<td>$94.00</td>
						</tr>
						<tr>
							<td>Some Camera</td>
							<td>PR - 2</td>
							<td>225883</td>
							<td>1</td>
							<td>$94.00</td>
							<td>$94.00</td>
						</tr>
						<tr>
							<td>Some Camera</td>
							<td>PR - 2</td>
							<td>225883</td>
							<td>1</td>
							<td>$94.00</td>
							<td>$94.00</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-md-3 col-md-offset-9">
				<div class="subtotal-wrap">
					<div class="subtotal">
						<p>Sub Total : $26.00</p>
						<p>Vat 17% : $54.00</p>
					</div>
					<div class="total">Total : <span class="bigprice">$255.00</span></div>
					<button class="btn btn-default btn-red btn-sm">Order Now</button>
				</div>
				<div class="clearfix"></div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php'?>