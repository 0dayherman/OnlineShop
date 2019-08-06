<!DOCTYPE html>
<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
<?php

    if(isset($_GET["id"]) && !empty($_GET['id'])){
        // hapus produk
        include("../config/config.php");
        $id = $_GET["id"];
        $query = $db->query("DELETE FROM tb_barang WHERE id=$id");

        if($query) {
            // arahkan ke data artikel
             echo "<script>
                swal('Berhasil Hapus','','success');
              </script>";
        echo "<meta http-equiv='refresh' content='1; url=produk.php'>";
        } else {
            // tampilkan pesan error
            die("Gagal menghapus: " . mysqli_error($db));
        }

    } else {
        // arahkan ke data artikel
        header("location: index.php");
    }

?>
