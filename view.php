<?php
include 'assets/template/header.php';
include 'config/config.php';
$path = $_SERVER['REQUEST_URI'];
$url = $_SERVER['SERVER_NAME'];
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : Missing ID');
$query = $db->query('SELECT * FROM tb_barang WHERE id='.(int)$id); //cegah SQL-i dengan fungsi (int)
$r = $query->fetch_assoc();
$diskon = $r['harga']*20/100;
?>

<body>
	<div class="container" style="margin-top: 120px;">
		<div class="row">
			<div class="col-md mt-2">
				<img src="assets/img/<?php echo $r['namagambar'];?>" width="100%" class="border" alt="<?php echo $r['namagambar'];?>">
			</div>

			<div class="col-md mt-2">
				<h3><?php echo $r['namabarang'];?></h3>
				<a href="" class="badge badge-primary">Baru</a>
				<a href="" class="badge badge-danger">Diskon 20%</a>
				<a href="" class="badge badge-info">Stok <?php echo $r['jumlahbarang']; ?></a>

				<div>
				<p class="lead mt-2">
              	  <span class="mr-1 text-danger">
                	<del><b>Rp.<?php echo number_format($r['harga']); ?></b></del>
              	  </span>
              	  <span><b>Rp.<?php echo number_format($r['harga']-$diskon); ?></b></span>
            	</p>
            	</div>

            	<div>
            		<b>Spesifikasi</b> :<br>
            		<?php echo $r['spesifikasi'];?>
            	</div>

            	<div>
            	<p>
            	  <a class="btn btn-primary btn-md my-0 p mt-4" href="cart.php?add=<?php echo $r['id']; ?>">Pesan
					<i class="fa fa-shopping-cart ml-1"></i>
		          </a>
            	</p>
            	</div>

            	<h5>Share Produk</h5>
            	<a class='btn btn-sm btn-primary' role='button' href="https://m.facebook.com/sharer/sharer.php?u=<?php echo $url.$path;?>"><i class='fa fa-facebook-f'></i></a>
				<a class='btn btn-sm btn-info' role='button' href="https://twitter.com/intent/tweet?url=<?php echo $url.$path;?>&text=Checkout%20this%20awesome%20product%20for%20Your%20Style&via=T"><i class='fa fa-twitter'></i></a>
				<a class='btn btn-sm btn-success' role='button' href="https://api.whatsapp.com/send?text=Dev Tech <?php echo $url?>"><i class='fa fa-whatsapp'></i></a>

			</div>
			
			<div class="col-md">
				
			</div>			
		</div>
	</div>
</div>


<?php include "assets/template/footer.php";?>
</body>
</html>