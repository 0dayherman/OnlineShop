<?php 
include "assets/template/header.php";
if (isset($_SESSION['username'])) {
}
else{
	echo "<script>
	alert('Anda belum login');
	window.location.href='login.php';
	</script>";

}
?>

<div class="container shadow pt-5 mb-5" style="margin-top: 120px; width: 600px;">
	<center>
	<h5>
        <strong>Form Pengiriman</strong>
    </h5>
    <small>Masukkan Nama  lengkap untuk pengiriman barang/produk yang anda pesan<br></small>
	</center>
	<form action="checkout.php" method="POST">
	  <div class="form-group">
	    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required="">
	  </div>
	  <div class="form-group">
	    <input type="number" name="hp" class="form-control" placeholder="No. Telp/HP" required="">
	  </div>
	  <div class="form-group">
	    <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" required=""></textarea>
	  </div>
	  <div class="form-group">
	    <input type="hidden" name="waktu" class="form-control">
	  </div>
	  <button type="submit" name="finish" class="btn btn-primary mb-2" style="width: 120px;">Kirim</button>
	</form>
</div>

<?php
include "assets/template/footer.php";
?>