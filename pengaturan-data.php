<?php 
  include_once "inc/koneksi.php";
  include_once "session.php";
  if(isset($_SESSION['login_user'])){
    $status = "Logout";
    $link_login = "logout.php";
  } else {
    $status = "Login";
    $link_login = "login.php";
  }
  $query = mysqli_query($con,"select * from w_bakso");
  $id    = [];
  $nama  = [];
  $alamat= [];
  $lat   = [];
  $lon   = [];
  $harga = [];
  while ($data = mysqli_fetch_array($query)){
    $id[] = $data['id'];
    $nama[] = $data['nama_warung'];
    $alamat[] = $data['alamat'];
    $lat[] = $data['latitude'];
    $lon[] = $data['longitude'];
    $gambar[] = $data['gambar'];
    $harga[] = $data['harga'];
    $jam_buka[] = $data['jam_buka'];
    $jam_tutup[] = $data['jam_tutup'];
    $deskripsi[] = $data['deskripsi'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Data</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/jquery.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyD-E7EVcl6AGEbgXxbULpoWIyxtrsqVFxA"></script>
  <script>
    function initialize(){
      
      // Variabel untuk menyimpan informasi (desc)
      var infoWindow = new google.maps.InfoWindow;
      
      var lokasi = new google.maps.LatLng(-7.951347,112.607460);
      var myOptions = {
        zoom: 16,
        center: lokasi,
        mapTypeId: 'roadmap'
      };
      var peta = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
 

      //posisi awal marker   
      var latLng = new google.maps.LatLng(-7.951347,112.607460);
      /* buat marker yang bisa di drag lalu 
        panggil fungsi updateMarkerPosition(latLng)
       dan letakan posisi terakhir di id=latitude dan id=longitude
       */
      
      function updateMarkerPosition(latLng) {
        var lat = ""+[latLng.lat()]+"";
        var lng = ""+[latLng.lng()]+"";
        document.getElementById('latitude').value = lat.substring(0, 10);
        document.getElementById('longitude').value = lng.substring(0,10);
      }
      var marker = new google.maps.Marker({
          position : lokasi,
          title : 'lokasi',
          map : peta,
          draggable : true
        });
         
      updateMarkerPosition(latLng);
      google.maps.event.addListener(marker, 'drag', function() {
       // ketika marker di drag, otomatis nilai latitude dan longitude
       //menyesuaikan dengan posisi marker 
         updateMarkerPosition(marker.getPosition());
      });

      $("#bersihakan").click(function(){
        $("#nama").val("");
        $("#alamat").val("");
        $("#latitude").val("");
        $("#longitude").val("");
        $("#harga").val("");
        $("#jamBuka").val("");
        $("#jamTutup").val("");
        $("#deskripsi").val("");
      });
      
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
        <a class="navbar-brand" href="index.php">SIG BAKSO</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php?rangeHarga=&filter=Filter">Home</a></li>
        <li class="active"><a href="pengaturan-data.php">Pengaturan Data</a></li>
        <li><a href="tentang-kami.php">Tentang Kami</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $link_login ?>"><?php echo $status ?></a></li>
      </ul>
    </div>
  </nav>

  <section>
    <div class="container">
      <div class="row" id="tambah-data">
        <!-- Input data -->
        <div class="col-md-6">
          <form class="form-horizontal" method="post" action="tambahData.php" enctype="multipart/form-data">
            <fieldset>

            <!-- Form Name -->
            <legend>Tambah data lokasi warung</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="nama">Nama Warung</label>  
              <div class="col-md-6">
              <input id="nama" name="nama" placeholder="masukkan nama" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="alamat">Alamat</label>  
              <div class="col-md-8">
              <input id="alamat" name="alamat" placeholder="masukkan alamat" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="latitude">Latitude</label>  
              <div class="col-md-5">
              <input id="latitude" name="latitude" placeholder="masukkan latitude" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="longitude">Longitude</label>  
              <div class="col-md-5">
              <input id="longitude" name="longitude" placeholder="masukkan longitude" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="harga">Harga</label>  
              <div class="col-md-5">
              <input id="harga" name="harga" placeholder="masukkan kisaran harga" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="jamBuka">Jam Buka</label>  
              <div class="col-md-4">
              <input id="jamBuka" name="jamBuka" placeholder="masukkan jam buka" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="jamTutup">Jam Tutup</label>  
              <div class="col-md-4">
              <input id="jamTutup" name="jamTutup" placeholder="masukkan jam tutup" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="deskripsi">Deskripsi</label>
              <div class="col-md-4">                     
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
              </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="gambar">Foto Warung</label>
              <div class="col-md-4">
                <input id="upload_gambar" name="upload_gambar" class="input-file" type="file">
              </div>

            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="simpan"></label>
              <div class="col-md-8">
                <input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-success">
                <input type="button" id="bersihakan" name="bersihkan" value="Bersihkan" class="btn btn-danger">
              </div>
            </div>

            </fieldset>
          </form>
        </div>

        <!-- Peta -->
        <div class="col-md-6">
          <div  id="map_canvas" style="width:100%; height:500px"></div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="col-md-12" id="tampil-data">
        <h3><center><b>Data Warung Bakso Malang</center></b></h3><br>
        <table class="table-head table table-fixed table-hover">
          <thead>
            <tr>
              <th class="top col-xs-1">No.</th>
              <th class="top col-xs-2">Nama Warung</th>
              <th class="top col-xs-3">Alamat</th>
              <th class="top col-xs-2">Latitude</th>
              <th class="top col-xs-2">Longitude</th>
              <th class="top col-xs-1">Harga</th>
              <th class="top col-xs-1">Pilihan</th>
            </tr>
          </thead>
        </table>
        <div class="table-scroll">
        <table class="table table-hover">
            <tbody>
              <?php
                for ($i=0; $i < count($nama); $i++) { 
              ?>
              <form action="hapusData.php" method="GET">
              <tr>
                <td class="top col-xs-1"><?php echo($i+1) ?></td>  
                <td class="top col-xs-2"><?php echo($nama[$i]) ?></td>
                <td class="top col-xs-3"><?php echo($alamat[$i]) ?></td>
                <td class="top col-xs-2"><?php echo($lat[$i]) ?></td>
                <td class="top col-xs-2"><?php echo($lon[$i]) ?></td>
                <td class="top col-xs-1"><?php echo($harga[$i]) ?></td>
                <input type="text" id="id" hidden="hidden" name="id" value="<?php echo $id[$i] ?>">
                <td class="col-xs-1"><input type="submit" name="hapus" value="Hapus" class="btn btn-danger"></td>
              </tr>
              </form>
              <?php
                }
              ?>
            </tbody>
          
        </table>
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




