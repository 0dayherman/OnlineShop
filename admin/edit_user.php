<?php


    if(isset($_GET['id']) && !empty($_GET['id'])){
        include('../config/config.php');

        $id = $_GET["id"];
        $query = $db->query("SELECT * FROM `tb_user` WHERE id_user=$id");
        if($query->num_rows > 0){
            $us = $query->fetch_assoc();
        }else{
            echo "<script>window.location = 'index.php'</script>";
        }

?>
<?php
include "header.php";
?>
<div class="container shadow" style="width: 600px;">
	<form class="form" action="" method="POST">
		<h5 class="text-center">Edit User</h5>
                  <div class="form-group">
                      <input type="text" name="username" class="form-control" value="<?php echo $us['username']; ?>" required>
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <input type="text" name="nama" class="form-control" value="<?php echo $us['nama']; ?>" required>
                  </div>
                  <div class="form-group">
                  	 <input type="text" name="alamat" class="form-control"  value="<?php echo $us['alamat']; ?>">
                  </div>
                  <div class="form-group">
                      <input type="text" name="hp" class="form-control" value="<?php echo $us['hp']; ?>"/>
                  </div>
                  <div class="form-group">
                      <input type="text" name="level" class="form-control" value="<?php echo $us['level']; ?>" disabled="disabled"/>
                  </div>

                  <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary mb-2"><i class="fa fa-save"></i> Simpan</button>
                  </div>

              </form>
</div>
<?php
    }else{
        echo "<script>window.location.href= 'index.php'</script>";
    }
//saving update user bro
if(isset($_POST['simpan'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $nm = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];

    $saving = $db->query("UPDATE tb_user SET username='$user',password='$pass',nama='$nm',alamat='$alamat',hp='$hp' WHERE id_user='$id'");
    if($saving){
        echo "<script>
        		swal('Berhasil Update','','success');
        	  </script>";
        echo "<meta http-equiv='refresh' content='1; url=users.php'>";

    }else{
        echo "Gagal Edit User !<br>terjadi kesalahan";
    }
}


?>
<?php include "footer.php";?>