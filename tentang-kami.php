<?php 
include_once "inc/koneksi.php";
session_start();
if(isset($_SESSION['login_user'])){
	$status = "Logout";
	$link_login = "logout.php";
} else {
	$status = "Login";
	$link_login = "login.php";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIG Kuliner Malang</title>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

	<script src="http://maps.google.com/maps/api/js?key=AIzaSyD-E7EVcl6AGEbgXxbULpoWIyxtrsqVFxA"></script>
	<!-- <script src="js/peta.js"></script> -->

	<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>

	<script>

		function initialize(){
			
		}

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
				<a class="navbar-brand" href="index.php?rangeHarga=&filter=Filter">SIG BAKSO</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="pengaturan-data.php">Pengaturan Data</a></li>
				<li class="active"><a href="tentang-kami.php">Tentang Kami</a></li> 
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $link_login ?>"><?php echo $status ?></a></li> 
			</ul>
		</div>
	</nav>

	<!-- CONTENT -->
	<section class="tentang" id="tentang">
		<div class="container">
			<div class="row">
				<h2 class="judul-tentang text-center">Tentang Kami</h2><br>
			</div>
			<div class="row">
				<div class="col-md-2">
					
				</div>
				<div class="col-md-4">
					<p>Project ini disusun untuk memenuhi tugas Matakuliah Sistem Informasi Geografis, semoga dengan selesainya tugas ini menjadikan kami lebih baik lagi dalam pembuatan software yang berguna untuk Agama, Negara dan Dunia.</p>
				</div>
				<div class="col-md-4">
					<p>Kami adalah mahasiswa semester tujuh yang sedang mengambil Matakuliah Sistem Informasi Geografis. Dalam penyusunan tugas akhir ini kami berterimakasih kepada bapak dosen Ir. Jasmani, M.Kom selaku dosen pengampu Matakuliah Sistem Informasi Geografis karena telah membimbing kami dalam penyelesaian tugas ini.</p>
				</div>
				<div class="col-md-2">
					
				</div>
			</div>
		</div>
	</section>

  <section class="portofolio" id="portofolio">
		<div class="container">
			<div class="row">
				<div judul-portofolio>
					<h2 class="text-center">Team Kerja</h2><br>
				</div>
			</div>
			<div class="row">
				<div class="isi-portofolio">
					<div class="col-md-4 text-center">	
						<img src="gambar/profil/abdan.jpg" alt="cabin">
						<h3><b>Abdan Syakuro</b></h3>
						<h4>Web Programing</h4>
					</div>
					<div class="col-md-4 text-center profil">
						<img src="gambar/profil/dahlan.jpg" alt="cake">
						<h3><b>M. Dahlan Z.</b></h3>
						<h4>Web Designer</h4>
					</div>
					<div class="col-md-4 text-center">
						<img src="gambar/profil/rizal.jpg" alt="circus">
						<h3><b>Rizal Faizun</b></h3>
						<h4>System Analist</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- FOOTER -->
	<footer>
		<div class="container-fluid">
			<div class="col-md-12">
				<p class="text-center">Copyright @2016 - Abdan, Dahlan, Rizal</p>
			</div>
		</div>
	</footer>
</body>
</html>