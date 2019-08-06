<?php
@session_start();
@ob_start();
$db = new mysqli("localhost","root","","db_tokoonline");
if(mysqli_connect_errno()){
  print_f("connect failed %s\n,mysqli_connect_error($db)");
  exit();
  }
?>
