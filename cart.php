<!DOCTYPE html>
<html lang="en">
<?php include("assets/template/header.php"); ?>
<?php include("config/config.php"); ?>

<body>
    <!--Main layout-->
    <main class="mt-5 pt-5">
        <center>
            <div class="table-responsive text-center" style="width: 95%;">

<table class="table table-hover table-bordered"> 
<thead class="black white-text"> 
<tr> 
<th scope="col">No.</th> 
<th scope="col">Nama Barang</th> 
<th scope="col">Gambar</th>
<th scope="col">Jumlah</th> 
<th scope="col">Harga Satuan</th> 
<th scope="col">Sub Total</th> 
<th scope="col">Options</th> 
</tr> 
</thead> 
<tbody>  
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
				$total = 0;
				$no = 1;
				foreach($_SESSION as $name => $value){
					if($value > 0){
						if(substr($name, 0, 5) == 'cart_'){
							$id = substr($name, 5, (strlen($name)-5));
							$get = $db->query("SELECT * FROM tb_barang WHERE id='$id'");
							
							while($get_row = $get->fetch_assoc()){
								if($no % 2 == 0){
									$warna = "#EAEAEA";
								} else {
									$warna = "#F4F4F4";
								}
								$sub = $get_row['harga'] * $value;
								echo '
								<tr bgcolor="'.$warna.'">
									<td>'.$no.'</td>
									<td>'.$get_row['namabarang'].'</td>
									<td><img src="assets/img/'.$get_row['namagambar'].'" width="140"></td>
									<td>'.$value.'</td>
									<td>Rp. '.number_format($get_row['harga']).'</td>
									<td>Rp. '.number_format($sub).'</td>
									<td align="center">
										<a href="cart.php?remove='.$id.'"><button type="submit" class="btn btn-warning" style="font-size: 13px;" name="submit"><i class="fa fa-minus"></i></button></a>
										<a href="cart.php?add='.$id.'"><button type="submit" class="btn btn-success" style="font-size: 13px;" name="submit"><i class="fa fa-plus"></i></button></a> 
										<a href="cart.php?delete='.$id.'"><button type="submit" class="btn btn-danger" style="font-size: 13px;" name="submit"><i class="fa fa-trash"></i></button></a><br>
									</td>
								</tr>							
								';
								$no++;

							}
							$total += $sub;
						}
					}
				}
				$_SESSION['total'] = $total;
				if($total == 0){
					echo '<div class="mt-5">';
					echo '<tr><td colspan="7" align="center">Keranjang belanja masih kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="index.php" class="btn btn-success btn-md"">&laquo; Lanjutkan Belanja</a>
						</div></p>';
					echo '</div>';
				} else {
					
					echo '
					<div class="mt-5">
						<tr style="background-color: #DDD;"><td colspan="5" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total).'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="index.php" class="btn btn-success btn-md">&laquo; Lanjutkan Belanja</a>
						<a href="form.php?total='.$total.'" class="btn btn-success btn-md">Checkout &raquo;</a>
						</div></p>
					</div>
					';
				}
				?>
			
				<?php
				//PROSES TAMBAH JUMLAH PRODUK//
				if(isset($_GET['add'])){
					$qt = $db->query('SELECT id, jumlahbarang FROM tb_barang WHERE id='.(int)$_GET['add']);
					while($qt_row = $qt->fetch_assoc()){
						if($qt_row['jumlahbarang'] != $_SESSION['cart_'.$_GET['add']]){
							$_SESSION['cart_'.$_GET['add']]+'1';
							header("Location: cart.php");
						} else {
							echo '<script language="javascript">alert("Stok barang tidak mencukupi"); document.location="cart.php";</script>';
						}
					}
				}
				
				//PROSES HAPUS 1 ITEM PRODUK//
				if(isset($_GET['remove'])){
					$_SESSION['cart_'.$_GET['remove']]--;
					header("Location: cart.php");
				}
				
				//PROSES HAPUS SEMUA ITEM PRODUK//
				if(isset($_GET['delete'])){
					$_SESSION['cart_'.$_GET['delete']]='0';
					
					header("Location: cart.php");
				}
				?>

</tbody> 
</table> 
    </div>
    </center>
    </main>
    <!--Main layout-->

    <!-- footer -->
    <?php include("assets/template/footer.php"); ?>

</body>
</html>