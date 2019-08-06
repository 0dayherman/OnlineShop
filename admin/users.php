<?php 
include "header.php";
include "../config/config.php";
?>

<body>
<!-- Page Content  -->

        <div class="container shadow">
              <h1 class="page-header">User <a class="btn btn-success pull-right" href="tambah_user.php"><i class="fa fa-plus-circle fa-lg"></i> Buat user</a></h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Password</th>
          <th>Nama Lengkap</th>
          <th>Alamat</th>
          <th>No Telp/HP</th>
          <th>Level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php

        // ambil data user dari database
        $query = $db->query("SELECT * FROM tb_user");
        $no = 1;

        while($data = $query->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$data['username']."</td>";
            echo "<td>".$data['password']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['alamat']."</td>";
            echo "<td>".$data['hp']."</td>";
            echo "<td>".$data['level']."</td>";
            echo "<td><a href='edit_user.php?id=".$data['id_user']."' class='btn btn-info' /><i class='fa fa-edit'></i></a>
            <a href='hapus_user.php?id=".$data['id_user']."' class='btn btn-danger' /><i class='fa fa-trash'></i></a></td>";
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