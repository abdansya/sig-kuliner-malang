<?php 
include_once "inc/koneksi.php";

session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc

function tampil_session($user_check){
	global $con;
	$query = "SELECT nama FROM admin WHERE user ='$user_check'";
	if ($hasil = mysqli_query($con, $query))
	return $hasil;
	else return false;
} 

if($row = mysqli_fetch_assoc(tampil_session($user_check))){
	$login_session = $row['nama'];
}
if(!isset($login_session)){
	mysql_close($connection); // Menutup koneksi
	header('Location: login.php'); // Mengarahkan ke Login
}

?>