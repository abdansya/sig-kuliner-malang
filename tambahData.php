<?php
include_once "inc/koneksi.php";

if (isset($_POST['simpan']) || isset($_POST['hapus'])) {
	$nama_warung = strip_tags($_POST['nama']);
	$alamat = strip_tags($_POST['alamat']);
	$latitude = strip_tags($_POST['latitude']);
	$longitude = strip_tags($_POST['longitude']);
	$harga = strip_tags($_POST['harga']);
	$jam_buka = strip_tags($_POST['jamBuka']);
	$jam_tutup = strip_tags($_POST['jamTutup']);
	$deskripsi = ($_POST['deskripsi']);
	

	// Upload file gambar
	$eror		= false;
	$folder		= 'gambar/';
	//type file yang bisa diupload
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	//tukuran maximum file yang dapat diupload
	$max_size	= 10000000; // 10MB
	//Mulai memorises data
	$file_name	= rand(1000,100000)."-".$_FILES['upload_gambar']['name'];
	$file_size	= $_FILES['upload_gambar']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	if (is_numeric($nama_warung)){
		echo "Maaf nama warung tidak boleh angka";
	} else {

		//check apakah type file sudah sesuai
		if(!in_array($extensi,$file_type)){
			$eror   = true;
			$pesan .= '- Type file yang anda upload tidak sesuai<br />';
		}
		if($file_size > $max_size){
			$eror   = true;
			echo $pesan .= '- Ukuran file melebihi batas maximum<br />';
		}	else {
			//mulai memproses upload file
			if(move_uploaded_file($_FILES['upload_gambar']['tmp_name'], $folder.$file_name)){
				//catat nama file ke database
				$sql = "INSERT INTO `w_bakso` (`nama_warung`, `alamat`, `latitude`, `longitude`, `gambar`, `harga`, `jam_buka`, `jam_tutup`, `deskripsi`) VALUES ('$nama_warung', '$alamat', '$latitude', '$longitude', '$file_name', '$harga', '$jam_buka', '$jam_tutup', '$deskripsi')";
				$query = mysqli_query($con, $sql);
				if ($query) {
					echo '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
					header("location: http://localhost/sigkulinermalang/pengaturan-data.php");
				} else {
					echo mysqli_error($con);
				}
			} else{
				echo "Proses upload eror";
			}
		}
	}

} else {
	echo "Maaf anda harus masuk lewat input data";
}

?>