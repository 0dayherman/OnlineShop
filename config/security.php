<?php
if($_SESSION['level']==""){
	header("location: ../login.php?p=403");
}
else if($_SESSION['level'] =="customer"){
	header("location: ../customer/index.php?p=403");
}
?>