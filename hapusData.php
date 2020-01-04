<?php 
include_once "inc/koneksi.php";
if (isset($_GET['hapus']) && $_GET['hapus']=='Hapus') {
	$id = $_GET['id'];
	$query = mysqli_query($con,"DELETE FROM `w_bakso` WHERE id=$id");
	if ($query) {
		echo "Berhasil hapus data";
		header("location: http://localhost/sigkulinermalang/pengaturan-data.php");
	} else {
		echo "Ada kesalahan";
	}
} else {
	echo "Anda harus ke halaman pengaturan data";
}
?>