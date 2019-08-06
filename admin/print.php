 <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<?php
include "../config/config.php";
if(isset($_GET['tanggal'])){
				$tgl = $_GET['tanggal'];
				$sql = mysqli_query($db,"SELECT * FROM tb_user INNER JOIN tb_transaksi ON tb_user.id_user = tb_transaksi.id_user");
			}else{
				$sql = mysqli_query($db,"select * from tb_transaksi");
			}
			?>
			<div class="container shadow">
			<div class="table-responsive mt-5">
		    <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>No</th>
		          <th>Nama Lengkap</th>
		          <th>Alamat</th>
		          <th>No Telp/HP</th>
		          <th>Nama Barang</th>
		          <th>Total Harga</th>
		          <th>Waktu</th>
		        </tr>
		      </thead>
		      <tbody>

		    <?php
		    $no = 1;
			while($data = mysqli_fetch_array($sql)){
			?> 	
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['hp']; ?></td>
				<td><?php echo $data['di_beli']; ?></td>
				<td><?php echo $data['waktu']; ?></td>
				<td><?php echo number_format($data['total']); ?></td>
			</tr>

			<?php 
			}
			?>
	 </tbody>
    </table>
  </div>
</div>

<script>
		window.print();
	</script>


