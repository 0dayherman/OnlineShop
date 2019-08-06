<!DOCTYPE html>
<html>
<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title></title>
</head>
<body>
<?php
session_start();

if(isset($_SESSION['username'])){

    include('../config/config.php');
$dir = "../assets/img/";
$dir_target = $dir . basename($_FILES['name_f']['name']);
$nama_f = basename($_FILES['name_f']['name']);

$nama = empty($_POST['nama']) ? "Tanpa Nama": $_POST['nama'];
$ket = $_POST['keterangan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

//identifikasi file
$type = strtolower(pathinfo($dir_target,PATHINFO_EXTENSION));
//ext file yang di terima
$acc_ext = array("jpg","png","jpeg","gif");

/*ext file yg sring di gunakan hacker bisa anda tambah sendiri*/
$evil = array("php","html","phtml");

if(in_array($type,$acc_ext)){

if(move_uploaded_file($_FILES['name_f']['tmp_name'], $dir_target)){

$simpan = $db->query("INSERT INTO tb_barang (namabarang,spesifikasi,harga,jumlahbarang,namagambar) VALUES('$nama','$ket','$harga','$jumlah','$nama_f')");
    echo "<script>
                swal('Berhasil Tambah','','success');
              </script>";
	echo "<meta http-equiv='refresh' content='1; url=produk.php'>";

}else{
echo "Gagal menyimpan :(";
}
}else if(in_array($type,$evil)){
echo "<script>alert('evil file detected');
window.location=('images/ferguso.jpg')</script>";
}else{
echo "<script>alert('failed to save');
window.location=('index.php')</script>";

}

}else{
    header('location: ../login.php');
}
?>
</body>
</html>
