<!-- ======= Header ======= -->
<header id="header">
	<div class="container d-flex">
		<div class="logo mr-auto">
			<h1 class="text-light"><a href="index.php"><span>FoodStuff</span></a></h1>        
		</div>

		<nav class="nav-menu d-none d-lg-block">
			<ul>
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="tbooking.php">Table Booking</a></li>
				<li><li><a href="contact.php">Contact</a></li>
				<li><a class="nav-link" href="about_us.php">About Us</a></li>
				<li class="drop-down"><a href="#"><?php echo $_SESSION['username']; ?></a>
					<ul>
						<li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Cart-Product&nbsp;&nbsp;<span id="cart-item" class="badge badge-danger"></span></a></li>
						<li><a href="editprofile.php">Profile</a></li>
						<li><a href="changepass.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav><!-- .nav-menu -->
	</div>
  </header><!-- End Header -->