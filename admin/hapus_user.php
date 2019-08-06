<!DOCTYPE html>
<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
<?php

    if(isset($_GET["id"]) && !empty($_GET['id'])){
        // hapus artikel
        include("../config/config.php");
        $id = $_GET["id"];
        $query = $db->query("DELETE FROM tb_user WHERE id_user=$id");

        if($query) {
            echo "<script>
                swal('Berhasil Hapus','','success');
              </script>";
        echo "<meta http-equiv='refresh' content='1; url=barang.php'>";
        } else {
            // tampilkan pesan error
            die("gagal menghapus: " . mysqli_error($db));
        }

    } else {
        // arahkan ke data artikel
        header("location: index.php");
    }

?>
</body>
</html>