<?php session_start(); ?>


<?php 
if(isset($_SESSION['user_role'])){
	if($_SESSION['user_role'] == 'administrator'){
		header("Location: admin/index.php");
	}
}

?>

<!doctype html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
			<title>User Panel</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css"><link
				href="https://fonts.googleapis.com/css?family=Chau+Philomene+One|Great+Vibes|Lato|Lobster|Roboto|Ubuntu|Lora|Cabin sans-serif|Fascinate|Saira+Stencil+One|Open Sans|Montserrat"
				rel="stylesheet">

			<link rel="stylesheet" href="css/fontawesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
			<script src="https://rawgit.com/naikus/svg-gauge/master/dist/gauge.min.js"></script>
			<link rel="stylesheet" href="https://codepen.io/nosurprisethere/pen/rJzKOe">
			<script src="js/Chart.min.js"></script>
			<script src="js/utils.js"></script>
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<style>
				canvas{
					-moz-user-select: none;
					-webkit-user-select: none;
					-ms-user-select: none;
					}
			</style>  
		</head>

		<body>
	
	<!-- start of nav bar-->

	<nav class="navbar navbar-expand-lg navbar-light fixed-top ">
		<a class="navbar-brand text-white" href="#">SG House</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto col-lg-5">
				<!-- <li class="nav-item active">
				<a class="nav-link text-white" href="#">Site<span class="sr-only">(current)</span></a>
				</li> -->
		
				<!-- <li class="nav-item dropdown">
					<a class="nav-link text-white dropdown-toggle" href="#" id="navbarstore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Store
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarstore">
						<a class="dropdown-item" href="#">Products</a>
						<a class="dropdown-item" href="#">Packages</a>
					
						<div class="dropdown-divider"></div>
					</div>
				</li> -->
			</ul>
			
			<div class="col-lg-5 d-flex">
				<ul class="navbar-nav mr-auto">
					<li>
						<button type="button" class="btn btn-outline-primary">Block1</button>
						<button type="button" class="btn btn-outline-secondary">#Add Block</button>
					
					</li>
				</ul>
			</div>
			<div class="col-lg-4 d-flex">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
						<?php echo $_SESSION['username']  ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<!-- <a class="dropdown-item" href="#">Profile</a> -->
						<a class="dropdown-item" href="include/logout.php">Log Out</a>
						<!-- <div class="dropdown-divider"></div> -->
						<!-- <a class="dropdown-item" href="#">Something else here</a> -->
						</div>
					</li>
				</ul>
			</div>
			
		</div>
</nav>
	
	
	<!-- end of nav bar-->