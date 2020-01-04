<?php 

include_once "inc/koneksi.php";
session_start();

if (isset($_POST['user']) AND isset($_POST['pass']))
{
   $username=$_POST['user'];
   $password=$_POST['pass'];
   $username=strip_tags($username);
   $password=strip_tags($password);
   $nama_petugas = "";
   $error = "";
   $query = "select * from admin where user='$username' and pass='$password'";
   $result = mysqli_query($con, $query);
   $rows = mysqli_num_rows($result);
   if($rows==1){
      $_SESSION['login_user']=$username;
   	header("location: index.php");
   } else {
   	header("location: login.php");
      $error = "Username atau password salah";
   }
}
else
{
   die("Maaf, anda harus mengakses halaman ini dari form.html");
}
  
if(empty($username)||empty($password))
{
   die("Maaf, anda harus mengisi username");
}

?>