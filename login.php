<?php 
include_once "inc/koneksi.php";
session_start();
// Menyimpan Session
if(isset($_SESSION['login_user'])){
    header('Location: index.php'); // Mengarahkan ke Home Page
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIG Kuliner Malang</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link href="https://fonts.googleapis.com/css?family=Aldrich|Days+One|Orbitron" rel="stylesheet"> 

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style-login.css">
	
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyD-E7EVcl6AGEbgXxbULpoWIyxtrsqVFxA"></script>
	<!-- <script src="js/peta.js"></script> -->

	<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>

	<script>

		function initialize(){}

	</script>

</head>
<body onload="initialize()">
	<!-- HEADER -->
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="logo text-center">
						<img src="gambar/bakso-malang.png" alt="logo bakso">
						<h1>SISTEM INFORMASI GEOGRAFIS <br>KULINER BAKSO MALANG</h1>
					</div>
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<!-- NAVBAR -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">SIG BAKSO</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="pengaturan-data.php">Pengaturan Data</a></li> 
				<li><a href="tentang-kami.php">Tentang Kami</a></li> 
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php">Login</a></li> 
			</ul>
		</div>
	</nav>

	<!-- CONTENT -->
	<section>
		<div class="container">
	  	<div class="row">
	      <div class="col-md-4 col-md-offset-4">
	        <div class="panel panel-default">
	          <div class="panel-heading"> <strong class="">Login</strong>

	          </div>
	          <div class="panel-body">
	            <form class="form-horizontal" role="form" method="post" action="cekLogin.php">
	                <div class="form-group">
	                    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
	                    <div class="col-sm-9">
	                        <input class="form-control" name="user" id="inputEmail3" placeholder="Username" required="" type="text">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
	                    <div class="col-sm-9">
	                        <input class="form-control" name="pass" id="inputPassword3" placeholder="Password" required="" type="password">
	                    </div>
	                </div>
	                <div class="form-group last">
	                    <div class="col-sm-offset-3 col-sm-9">
	                        <button type="submit" name="submit" class="btn btn-success btn-sm">Sign in</button>
	                        <button type="reset" name="reset" class="btn btn-default btn-sm">Reset</button>
	                    </div>
	                </div>
	            </form>
	        	</div>
	      	</div>
	      </div>
	  	</div>
	  </div>
	</section>

	<!-- FOOTER -->
	<footer>
		<div class="container-fluid">
			<div class="col-md-12">
				<p class="text-center">Copyright @2016 - Abdan, Dhalan, Rizal</p>
			</div>
		</div>
	</footer>
</body>
</html>