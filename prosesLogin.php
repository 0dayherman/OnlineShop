<?php 

session_start();

include "config/config.php";
	
$username = $_POST['username'];
$password = $_POST['password'];

//query database untuk mengecek data credential user

$query = mysqli_query($db,"select * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);

//checking apakah username dan password ada didalama database

if ($cek > 0){



		$data = mysqli_fetch_assoc($query);

	//cek jika login sebagai admin
	if ($data['level'] == 'admin') {

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = "admin";
			//kirim ke halaman dashbord admin
			header('location:admin/index.php?p=beranda');

		}else if ($data['level'] == 'customer') {

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			$_SESSION['level'] = "customer";

			//kirim ke halaman dashboard operator
			header('location:customer/index.php?p=beranda');

		}else{
			header('location:login.php?p=gagalLogin');
		}
	}else{
			header('location:login.php?p=gagalLogin');
	}

?>