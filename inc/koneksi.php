<?php 

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'gis_warung';

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
	echo "Koneksi bermasalah";
}

?>