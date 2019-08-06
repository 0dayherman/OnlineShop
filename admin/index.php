<?php 
include "../config/config.php";
include "../config/security.php";
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
<?php
//user
$user = $db->query("SELECT * FROM tb_user");
$tuser = mysqli_num_rows($user);
//barang
$barang = $db->query("SELECT * FROM tb_barang");
$tbarang = mysqli_num_rows($barang);
//transaksi
$query = "SELECT sum(total) as total FROM tb_transaksi";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
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
                    <a href="produk.php" >Produk</a>
                </li>
                <li>
                    <a href="transaksi.php">Penjualan</a>
                </li>
                <li>
                    <a href="users.php">Management Users</a>
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
            <div class="row">
                <div class="col">
                     <div class="card text-center text-white shadow float-right" style="width: 20rem;">
                        <div class="card-body" style="background-color: #009DFA;">
                            <h1 class="card-title"><?php echo $tuser; ?></h1>
                            <a href="#"><i class="fas fa-users" style="font-size: 30px;"></i></a>
                            <p class="card-text text-white">Customers</p>
                        </div>
                    </div>
                </div>   

                 <div class="col1">
                     <div class="card text-center text-white shadow" style="width: 20rem;">
                        <div class="card-body" style="background-color: #7360ED;">
                            <h1 class="card-title"><?php echo $tbarang; ?></h1>
                            <a href="#"><i class="fas fa-shopping-cart" style="font-size: 30px;"></i></a>
                            <p class="card-text text-white">Produk</p>
                        </div>
                    </div>
                </div>   

                 <div class="col">
                     <div class="card text-center text-white shadow" style="width: 20rem;">
                        <div class="card-body" style="background-color: #55CE65;">
                            <?php 
                            $total = 0;
                            $total += $data['total']; 
                            ?>
                            <h1 class="card-title"><?php echo "Rp. ".number_format($total, 0, ',', '.'); ?></h1>
                            <a href="#"><i class="fas fa-dollar-sign" style="font-size: 30px;"></i></a>
                            <p class="card-text text-white">Penjualan</p>
                        </div>
                    </div>
                </div>   

            </div>
            <div class="alert alert-info mt-5 text-center" role="alert">
                    <i class="fas fa-info-circle title-icon"></i> Selamat Datang di <strong>Dev Tech</strong>.
                </div>
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