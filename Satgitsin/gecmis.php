<?php include 'header.php' ?>
					
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Orders</div>
							<div class="bigtitle">Orders</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div id="title-bg">
			<div class="title">Orders</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>Date Added</th>
						
						
						<th>Price</th>
						<th>Status</th>
						
					</tr>
				</thead>
				<tbody> 
					<?php
					$kistas = "`kullanici` =  '$userID'";
					$queryBilgiAl = "SELECT * FROM `alisveris` WHERE $kistas";
					$sonucBilgiAl = mysqli_query($baglan, $queryBilgiAl);
					while($row = mysqli_fetch_array($sonucBilgiAl)) { 
						$status = "Ödeme Alındı";
						$tarih =  date("d-m-Y H:i:s", strtotime($row["tarih"]));  
						if($row["durum"] == 2) { $status = "Hazırlanıyor"; }
						if($row["durum"] == 3) { $status = "Kargoda"; }
						if($row["durum"] == 4) { $status = "Teslim Edildi"; }
						echo '<tr>
						<td>'.$row["no"].'</td>
						<td>'.$tarih.'</td>
						<td>'.$row["tutar"].'</td>
						<td>'.$status.'</td>
						
					</tr>';


					}
					$sonucBilgiAl->close();

					?>
					
				</tbody>
			</table>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php' ?>