<?php 
//mengambil koneksi dari database
include "config/config.php";
//tarik dari form pendaftaran
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$level = $_POST['level'];

$query = "INSERT INTO tb_user (username, password, nama ,alamat, hp, level)values('$username','$password','$nama','$alamat','$hp','customer')";
	
	if(mysqli_query($db,$query))
	{
		// alihkan ke halaman login kembali
		header("location:login.php?p=Sdaftar");
	}else
	{
		header("location:login.php?p=Gdaftar");
	}
mysqli_close($db);
?>