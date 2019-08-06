<?php
include "header.php";
if(isset($_SESSION['username'])){
	include "../config/config.php";
?>

<body>
	<div class="container shadow">
		<form class="form" action="up.php" method="POST" enctype="multipart/form-data">
                <div class="form-group col-xl-9 col-md-8 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <textarea name="keterangan" id="txtEditor" class="form-control" rows="16"></textarea>
                    </div>
                        <input type="file" name="name_f" id="fileinput" accept="image/*">
                    <div id="gallery"></div>
 
                    <div class="form-group">
                    	<br/>
                        <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-send"></i> Terbitkan</button>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 col-sm-12 border-left">
					<div class="form-group">
					    <label>Harga</label>
				        <input type="number" class="form-control" name="harga">
					</div>

					<div class="form-group">
						<label>Jumlah</label>
							<input type="number" class="form-control" name="jumlah">
					</div>

				</div>

                </form>
	</div>
</body>
<?php
} else {
    // suruh user login
    header('location: ../login.php');
}

?>


<?php include "footer.php"; ?>