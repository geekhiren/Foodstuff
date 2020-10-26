<?php
include('includes/header.php');
include('database/security.php');
include('includes/navbar.php');
include('database/conn.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4 text-center">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-center mb-4">
		<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<a href="order.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</a>
							
							<?php 

							$query="SELECT * FROM users";
							$query_run=mysqli_query($conn,$query);
							$row=mysqli_num_rows($query_run);	

							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row ?></div>
						</div>
						<div class="col-auto">
							<i class="fa fa-user-circle fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<a href="order.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Order</a>
							
							<?php 

							$query="SELECT * FROM orders";
							$query_run=mysqli_query($conn,$query);
							$orow=mysqli_num_rows($query_run);	

							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $orow ?></div>
						</div>
						<div class="col-auto">
							<i class="fa fa-cart-arrow-down fa-2x text-gray-300" aria-hidden="true"></i>             
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<a href="product.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Product</a>
							
							<?php 

							$query="SELECT * FROM product";
							$query_run=mysqli_query($conn,$query);
							$prow=mysqli_num_rows($query_run);	

							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $prow ?></div>
						</div>
						<div class="col-auto">
							<i class="fa fa-spinner fa-2x text-gray-300" aria-hidden="true"></i>           
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<a href="reserved.php" class="text-xs font-weight-bold text-warning text-uppercase mb-1">Table Booking</a>
							
							<?php 

							$query="SELECT * FROM reservation";
							$query_run=mysqli_query($conn,$query);
							$rrow=mysqli_num_rows($query_run);	

							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rrow ?></div>
						</div>
						<div class="col-auto">							
							<i class="fa fa-info fa-2x text-gray-300" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<a href="contact_fetch.php" class="text-xs font-weight-bold text-warning text-uppercase mb-1">Table Contact-Records</a>
							<?php 

							$query="SELECT * FROM contactus";
							$query_run=mysqli_query($conn,$query);
							$crow=mysqli_num_rows($query_run);	

							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $crow ?></div>
						</div>
						<div class="col-auto">
							<i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr class="mx-auto mt-3">
	<!-- Content Row -->

	<?php 
	include('includes/scripts.php');
	include('includes/footer.php');
	?>