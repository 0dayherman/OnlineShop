<?php
date_default_timezone_set('Asia/Jakarta'); 
include "assets/template/header.php";
?>

<body>
	<?php
		if ($_SESSION['total']) {
		
		}
			if(isset($_POST['finish'])){
			$product = array();
			$n = $_POST['nama'];
			$a = $_POST['hp'];
			$h = $_POST['alamat'];
			$w = date("Y-m-d h:i:s");
			$tot = $_SESSION['total'];
			$nama = preg_replace("/[^a-zA-Z0-9]+/", " ",$n);
			$hp = preg_replace("/[^a-zA-Z0-9]+/", " ",$a);
			$alamat = preg_replace("/[^a-zA-Z0-9]+/", " ",$h);
			$waktu = $w;
		
			foreach($_SESSION as $name => $value){
		$id = substr($name, 5, (strlen($name)-5));
			$query = $db->query("SELECT * FROM tb_barang WHERE id='$id'");
			
		while($row = $query->fetch_assoc()){
		$update = $row['jumlahbarang']-$value;
		$product[] = $row['namabarang'] . "[".$value."]";
		$db->query("UPDATE tb_barang SET jumlahbarang=".$update." WHERE id=".$id);
			}
		}
?>
<!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text">
    <div class="card">
    <h5 class="card-header mt-5 info-color white-text text-center py-4">
        <strong>Checkout</strong>
    </h5>
     <div class="card-body px-lg-5">
    <p>Terima kasih Anda sudah berbelanja di <b>Toko Komputer Dev Tech</b>. Dan berikut ini adalah data yang perlu Anda catat.</p>
<p>Total biaya untuk pembelian Produk adalah <?php echo "<b>".number_format($tot)."</b>"; ?> dan biaya bisa di kirimkan melalui Rekening Bank BCA dengan nomor rekening xxxx-xxxx-xxxx atas nama <b>Herman</b></p><hr>
				<p>barang akan kami kirimkan ke alamat di bawah ini:</p>
			<div class="table-responsive">

<table class="table table-hover table-bordered"> 
<thead class="btn-success white-text text-center"> 
<tr> 
<th scope="col">Nama</th> 
<th scope="col">No Hp/Telp</th> 
<th scope="col">Alamat</th> 
<th scope="col">Waktu Pembelian</th> 
</tr>
</thead> 
<tbody class="text-center">  
<tr>
<td><?php echo $nama; ?></td>
<td><?php echo $hp; ?></td>
<td><?php echo $alamat; ?></td>
<td><?php echo date($waktu); ?></td>
</tr>
</tbody>
</table>
<a href="index.php" class="btn purple-gradient text-center"> <i class="fa fa-arrow-circle-left"></i> Belanja Lagi</a>
        </div>
      </div>
    </div>
  </main>
  <!--Main layout-->
  <?php
$di_beli = implode(",",$product);
$db->query("INSERT INTO tb_transaksi(di_beli,total,waktu) values('$di_beli','$tot','$waktu')");
session_destroy();
}else{
				header("Location: index.php");
			}
?>
<!-- footer -->
<?php include "assets/template/footer.php";?>
</body>