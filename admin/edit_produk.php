<?php
include "header.php";
if(isset($_SESSION['username'])){

    if(isset($_GET['id']) && !empty($_GET['id'])){
        // tampilkan form edit
        include('../config/config.php');

        // ambil data dari database
        $id = (int)$_GET["id"];
        $query = $db->query("SELECT * FROM tb_barang WHERE id=$id");
        if($query->num_rows > 0){
            $prd = $query->fetch_assoc();
        } else {
           
            echo "<script>window.location = 'index.php'</script>";
        }
?>

<body>
    <div class="container shadow">
        <form class="form" action="" method="POST">
                <div class="form-group col-xl-9 col-md-8 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="nama" class="form-control" placeholder="Judul artikel" value="<?php echo $prd['namabarang']; ?>">
                  </div>
                  <div class="form-group">
                      <textarea name="keterangan" class="form-control editor" rows="16"><?php echo $prd['spesifikasi']; ?></textarea>
                  </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 col-sm-12 border-left">
                    <div class="form-group">
                        <label>HARGA</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $prd['harga']; ?>">
                    </div>

                    <div class="form-group">
                        <label>JUMLAH</label>
                            <input type="number" class="form-control" name="jumlah" value="<?php echo $prd['jumlahbarang']; ?>">
                    </div>

                     <button type="submit" name="simpan" class="btn btn-primary mb-2"><i class="fa fa-edit"></i> Ubah</button>
                </div>

                </form>
    </div>
</body>
<?php include "footer.php";?>
<?php

    } else {
        // arahkan ke halaman data artikel
        echo "<script>window.location = 'index.php'</script>";
    }
    // kode untuk mengupdate artikel ke database
    if(isset($_POST['simpan'])){
        $nama = empty($_POST['nama']) ? "Tanpa judul": $_POST['nama'];
        $ket = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        // lakukan penyimpanan ke database
        $simpan = $db->query("UPDATE tb_barang SET namabarang='$nama',spesifikasi='$ket',harga='$harga',jumlahbarang='$jumlah' WHERE id=$id");
var_dump($simpan);
       if($simpan) {
            // berhasil tersimpan, arahkan ke tabel data artikel
            echo "<script>
                swal('Berhasil Update','','success');
              </script>";
        echo "<meta http-equiv='refresh' content='1; url=produk.php'>";
        } else {
            // gagal menyimpan
            echo "<script>alert('Gagal menyimpan, suatu kesalahan terjadi!')</script>";
        }
    }

} else {
    // suruh user login
    header('location: ../login.php');
}
?>