<?php 
include "../config/config.php";
if($_SESSION['level']==""){
	header("location: ../login.php?p=403");
}
else if($_SESSION['level'] =="admin"){
	header("location: ../admin/index.php?p=403");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/template/css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
<?php
if(isset($_GET['p'])){
                if($_GET['p'] == 'beranda'){
                    echo "<script>swal('Berhasil Masuk!','','success');</script>";
                }
                else if($_GET['p'] == '403'){
                    echo "<script>swal('Dilarang masuk','','error');</script>";
                }
            }

?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="shadow-lg bg-dark">
            <div class="sidebar-header text-center shadow">
                <img src="../assets/img/profile1.png" width="50%" class="rounded-circle img-thumbnail">
                <h6 class="mt-2 text-capitalize"><?php echo $_SESSION['username'];?></h6>
            </div>

            <ul class="list-unstyled components">
                <div class="container"> 
                <p><i class="fas fa-home"></i><a href="./"> Dashboard</p></a>
                <li class="active">
                    <a href="profile.php">Profile</a>
                </li>
            </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow rounded">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>       

        <div class="container">
            <h1 class="page-header">Checkout <a class="btn btn-success pull-right" href="../index.php"><i class="fa fa-plus-circle fa-lg"></i> Tambah</a></h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama Lengkap</th>
          <th>Alamat</th>
          <th>No HP</th>
          <th>Belanjaan</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
            <?php
            $query = $db->query("SELECT * FROM tb_user INNER JOIN tb_transaksi ON tb_user.id_user = tb_transaksi.id_user WHERE username='$_SESSION[username]'");
            $no = 1;
            while($data = $query->fetch_assoc()){
                echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$_SESSION['username']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['alamat']."</td>";
            echo "<td>".$data['hp']."</td>";
            echo "<td>".$data['di_beli']."</td>";
            echo "<td>".number_format($data['total'])."</td>";
            echo "</tr>";
        }

        ?>
            
        </div>

<!-- End Div Content -->
        </div>
<!-- End Div Wrapper -->
    </div>

    <!--Footer -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>