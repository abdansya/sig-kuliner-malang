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
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
	<link href="https://fonts.googleapis.com/css?family=Aldrich|Days+One|Orbitron|Bree+Serif" rel="stylesheet"> 

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
  <script src="js/bootstrap.min.js"></script>

	<script>
		var directionsService = new google.maps.DirectionsService();
		var directionsDisplay = new google.maps.DirectionsRenderer();
		var latlong;
		function initialize(){
			// Variabel untuk menyimpan informasi (desc)
		  var infoWindow = new google.maps.InfoWindow;
			
			var lokasi = new google.maps.LatLng(-7.951347,112.607460);
			var myOptions = {
				zoom: 15,
				center: lokasi,
				mapTypeId: 'roadmap'
			};
			var peta = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

			<?php
				if (isset($_GET['filter']) && !empty($_GET['rangeHarga'])) {
					$rangeHarga = $_GET['rangeHarga'];
					$query = mysqli_query($con,"select * from w_bakso WHERE $rangeHarga");
			    while ($data = mysqli_fetch_array($query))
			    {
			        $nama = $data['nama_warung'];
			        $alamat = $data['alamat'];
			        $lat = $data['latitude'];
			        $lon = $data['longitude'];
			        $gambar = $data['gambar'];
			        $harga = $data['harga'];
			        $jam_buka = $data['jam_buka'];
			        $jam_tutup = $data['jam_tutup'];
			        $deskripsi = $data['deskripsi'];
			        
			        echo ("addMarker($lat, $lon, '$nama', '$alamat', '$gambar', '$harga', '$jam_buka', '$jam_tutup', '$deskripsi');\n");
			    }
				} else{
					$query = mysqli_query($con,"select * from w_bakso");
			    while ($data = mysqli_fetch_array($query))
			    {
			        $nama = $data['nama_warung'];
			        $alamat = $data['alamat'];
			        $lat = $data['latitude'];
			        $lon = $data['longitude'];
			        $gambar = $data['gambar'];
			        $harga = $data['harga'];
			        $jam_buka = $data['jam_buka'];
			        $jam_tutup = $data['jam_tutup'];
			        $deskripsi = $data['deskripsi'];
			        
			        echo ("addMarker($lat, $lon, '$nama', '$alamat', '$gambar', '$harga', '$jam_buka', '$jam_tutup', '$deskripsi');\n");
			    }
				}
				mysqli_close($con);
		  ?>

		  // Proses membuat marker
		  function addMarker(lat, lng, nama, alamat, gambar, harga, jamBuka, jamTutup, deskripsi) {
		      var lokasi = new google.maps.LatLng(lat, lng);
		      //bounds.extend(lokasi);
		      var marker = new google.maps.Marker({
		          map: peta,
		          position: lokasi,
		          icon: 'gambar/ikon-food-kecil.png'
		      });
		      //map.fitBounds(bounds);
		      bindInfoWindow(lat, lng, marker, peta, infoWindow, nama, alamat, gambar, harga, jamBuka, jamTutup, deskripsi);
		  }

		   // Menampilkan informasi pada masing-masing marker yang diklik
		  function bindInfoWindow(lat, lng, marker, map, infoWindow, inama, ialamat, igambar, iharga, ijamBuka, ijamTutup, ideskripsi) {
		    	google.maps.event.addListener(marker, 'click', function() {
		      latlong = ''+lat+','+lng+'';
		      infoWindow.setContent(inama);
		      infoWindow.open(map, marker);
		      document.getElementById("namaW").innerHTML=inama;
		      document.getElementById("alamatW").innerHTML="<i class='fa fa-map-marker fa-2x' aria-hidden='true'></i><span class='tab'>Alamat : "+ialamat+"</span>";
		      document.getElementById("gambarW").setAttribute('src', 'gambar/'+igambar);
		      document.getElementById("gambarW").setAttribute('style', "border: 1px solid black;");
		      document.getElementById("gambarShow").setAttribute('src', 'gambar/'+igambar);
		      document.getElementById("hargaW").innerHTML="<i class='fa fa-usd fa-2x' aria-hidden='true'></i><span class='tab'>Harga : Rp. "+iharga+"</sapan>";
		      document.getElementById("jam").innerHTML="<i class='fa fa-clock-o fa-2x' aria-hidden='true'></i><sapan class='tab'>Jam Buka : "+ijamBuka+" - "+ijamTutup+" WIB</span>";
		      document.getElementById("deskripsiW").innerHTML="<i class='fa fa-info-circle fa-2x' aria-hidden='true'></i><span class='tab'>Keterangan :<br>"+ideskripsi+"</span>";
		    });
		  }
		}


		// Direction
		$(document).ready(function() {
			// ketika tombol cari di klik, maka proses pencarian rute dimulai
			$("#cari").click(function(){
				dest = ''+latlong+'';
				var defaultLatLng = new google.maps.LatLng(-2.548926,118.0148634);

				/*
					nah, pada fungsi geolocation disini adalah
					ketika koordinat user berhasil didapat maka peta koordinat yang digunakan
					adalah koordinat user, namun jika tidak berhasil maka koordinat yang digunakan
					adalah koordinat default (pada variable defaultLatLng)
				*/
			    if (navigator.geolocation) {
			        function success(pos) {
			            drawMap(pos.coords.latitude,pos.coords.longitude);
			        }

			        function fail(error) {
			            drawMap(defaultLatLng);
			        }
			        
			        navigator.geolocation.getCurrentPosition(success, fail, { maximumAge: 500000, enableHighAccuracy:true, timeout: 6000 });

			    } else {
			        drawMap(defaultLatLng);  
			    }

			    function drawMap(lat,lng) {

			        var myOptions = {
			            zoom: 15,
			            center: new google.maps.LatLng(lat,lng),
			            mapTypeId: google.maps.MapTypeId.ROADMAP
			        };

			        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

			        // bikin marker untuk asal dengan koordinat user hasil dari geolocation
			        var markerorigin = new google.maps.Marker({
		                position: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
		                map: map,
		                title: "Origin",
		                visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
							});

			        // membuat request ke Direction Service
			        var request = {
							origin: markerorigin.getPosition(), // untuk daerah asal, kita ambil posisi user
					    destination: dest, // untuk daerah tujuan, kita ambil value dari textbox tujuan
					    provideRouteAlternatives:true, // set true, karena kita ingin menampilkan rute alternatif

					    /**
					     * kamu bisa tambahkan opsi yang lain seperti
					     * avoidHighways:true (set true untuk menghindari jalan raya, set false untuk menonantifkan opsi ini)
					     * atau kamu bisa juga menambahkan opsi seperti
					     * avoidTolls:true (set true untuk menghindari jalan tol, set false untuk menonantifkan opsi ini)
					     */
					    travelMode: google.maps.TravelMode.DRIVING // set mode DRIVING (mode berkendara / kendaraan pribadi)
					    /**
					     * kamu bisa ganti dengan 
					     * google.maps.TravelMode.BICYCLING (mode bersepeda)
					     * google.maps.TravelMode.WALKING (mode berjalan)
					     * google.maps.TravelMode.TRANSIT (mode kendaraan / transportasi umum)
					     */
					};


					directionsService.route(request, function(response, status) {
					  if (status == google.maps.DirectionsStatus.OK) {
					    directionsDisplay.setDirections(response); 
					  }
				  });
					// menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
			  	directionsDisplay.setMap(map);
		  		directionsDisplay.setPanel(document.getElementById('directions-panel'));
		  		
		  		// menampilkan layer traffic atau lalu-lintas pada peta
		  		var trafficLayer = new google.maps.TrafficLayer();
  				trafficLayer.setMap(map);
				
			    }
			});
		});


		//Slider
		$( function() {
	    $( "#slider-range" ).slider({
	      range: true,
	      min: 1000,
	      max: 30000,
	      values: [ 4000, 11000 ],
	      slide: function( event, ui ) {
	        $( "#amount" ).val( "Rp." + ui.values[ 0 ] + " - Rp." + ui.values[ 1 ] );
	        $( "#hargaMin" ).val( "harga >=" + $( "#slider-range" ).slider( "values", 0 ) +
					" AND harga <=" + $( "#slider-range" ).slider( "values", 1 ) );
	      }
	    });
	    $( "#amount" ).val( "Rp." + $( "#slider-range" ).slider( "values", 0 ) +
	      " - Rp." + $( "#slider-range" ).slider( "values", 1 ) );

	  } );

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
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="pengaturan-data.php">Pengaturan Data</a></li>
				<li><a href="tentang-kami.php">Tentang Kami</a></li> 
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $link_login; ?>"><?php echo $status ?></a></li> 
			</ul>
		</div>
	</nav>

	<!-- CONTENT -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<!-- Navigasi -->
					<aside>
						<!-- <h2 class="text-center"><b>INFORMASI</b></h2> -->
						<p>
						  <label for="amount">Query rentang harga dan petunjuk arah:</label>
						  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<form action="index.php" method="GET">
							<input type="text" id="hargaMin" hidden="hidden" name="rangeHarga">
							<input type="submit" name="filter" value="Filter" class="btn btn-info" style="width: 43%; float: left;">
						</form>
						<button type="button" name="direction" id="cari" class="btn btn-info" style="width: 43%;">Direction</button>
						<hr>
						<h3 id="namaW" class="text-center"></h3><br>
						<a href="" data-toggle="modal" data-target="#myModal"><img id="gambarW"></a><br>
						<p class="jam"><span id="jam"></span></p>
						<p id="alamatW"></p>
						<p id="hargaW"></p>
						<p id="deskripsiW"></p>
					</aside>
				</div>
				<!-- Peta -->
				<div class="col-md-9">
					<div class="content">
						<div	id="map_canvas" style="width:100%; height:550px"></div>
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

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
	   <div class="modal-dialog" role="document">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
	         </div>
	         <div class="modal-body">
	            <img id="gambarShow" style="width: 100%;">
	         </div>
	      </div>
	   </div>
	</div>


</body>
</html>