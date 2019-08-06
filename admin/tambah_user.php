<?php
session_start();
include "header.php";

if(isset($_SESSION['username'])){

    include('../config/config.php');
?>
<div class="container shadow" style="width: 600px;">
	<form class="form" action="" method="POST">
		<h5 class="text-center">Tambah User</h5>
                  <div class="form-group">
                      <input type="text" name="username" class="form-control" placeholder="Username" required="">
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password" required="">
                  </div>
                  <div class="form-group">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required="">
                  </div>
                  <div class="form-group">
                  	 <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
                  </div>
                  <div class="form-group">
                      <input type="number" name="hp" class="form-control" placeholder="No Telp/HP" required="">
                  </div>

                  <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary mb-2"><i class="fa fa-save"></i> Simpan</button>
                  </div>

              </form>
</div>

<?php

// kode untuk menyimpan menu ke database
if(isset($_POST['simpan'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];

    // lakukan penyimpanan ke database
    $simpan = $db->query("INSERT INTO tb_user (username,password,nama,alamat,hp, level) VALUES('$username','$password','$nama','$alamat', '$hp', 'customer')");

    if($simpan) {
        echo "<script>
        		swal('Berhasil ditambah','','success');
        	  </script>";
        echo "<meta http-equiv='refresh' content='1; url=users.php'>";
    } else {
        // gagal menyimpan
        echo "<script>alert('Gagal menyimpan, suatu kesalahan terjadi!')</script>";
    }
}

} else {
    // suruh user login
    header('location: ../login.php');
}

?>
<?php include "footer.php";?>