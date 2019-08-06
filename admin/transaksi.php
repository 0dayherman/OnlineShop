<?php 
include "header.php";
include "../config/config.php";
?>

<body>
<!-- Page Content  -->

        <div class="container shadow">
              <h3 class="page-header">Transaksi </h3>
              <div class="row">
                <div class="col">
                  <form action="print.php" method="get">
                  <div class="form-group mb-0">
                    <label>Filter : </label>
                    <input class="form-control" type="date" name="tanggal" style="width: 180px;">
                    <input class="btn btn-primary mt-2" type="submit" value="FILTER">
                  </div>
                  </form>
                </div>

  <div class="table-responsive">
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
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php

        // ambil data user dari database
        $query = $db->query("SELECT * FROM tb_user INNER JOIN tb_transaksi ON tb_user.id_user = tb_transaksi.id_user");
        $no = 1;
        while($data = $query->fetch_assoc()){

            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$data['nama'] ."</td>";
            echo "<td>".$data['alamat'] ."</td>";
            echo "<td>".$data['hp'] ."</td>";
            echo "<td>".$data['di_beli'] ."</td>";
            echo "<td>Rp. ".number_format($data['total'])."</td>";
            echo "<td>".$data['waktu']."</td>";
            echo "<td>
            <a href='hapus_transaksi.php?id=".$data['id_user']."' class='btn btn-danger' /><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }

        ?>

      </tbody>
    </table>
  </div>

<!-- End Div Content -->
        </div>
<!-- End Div Wrapper -->

<?php include 'footer.php'; ?>
