<?php 
include "header.php";
include "../config/config.php";
?>

<body>
<!-- Page Content  -->

        
	<div class="container">
  <h2 class="sub-header">Data Produk <a href="tambah_produk.php" class="btn btn-success pull-right"><i class="fa fa-plus-circle fa-lg"></i>Tambah Produk</a></h2>
  <div class="table-responsive">

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Keterangan</th>
          <th>Gambar</th>
          <th>Harga</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
      
          <?php
                //Cek apakah terdapat ddata page di URL
                $page = (isset($_GET['p'])) ? $_GET['p'] : 1;
                
                $limit = 5; //Jumlah data per halamanya

                //Untuk menentukan dari data ke berapa yang akan ditampilkan pada table
                $limit_start = (int)($page - 1)* $limit;

                //query untuk menampilkan data artikel sesuai limit yg di tentukan
                $query = $db->query("SELECT * FROM `tb_barang` ORDER BY `id` DESC LIMIT ".$limit_start.",".$limit);
                //untuk penomoran table
                $no = $limit_start + 1;
                if($query->num_rows == 0){
		echo "Belum ada produk!";
	}else{
            $i = 1;

            while ($p = $query->fetch_array(MYSQLI_ASSOC)){
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td><b>".$p['namabarang']."</b><br/>";
                echo "<a href='edit_produk.php?id=".$p['id']."'><i class='fa fa-edit'></i> Edit</a> | ";
                echo "<a href='../view.php?id=".$p['id']."'><i class='fa fa-eye'></i> View</a> | ";
                echo "<a href='hapus_produk.php?id=".$p['id']."'><i class='fa fa-trash'></i> Hapus</a>";
                echo "</td>";
                echo "<td>".$p['spesifikasi']."</td>";
                echo "<td><img src='../assets/img/".$p['namagambar']."' width='250' height='150'></td>";
                echo "<td>Rp. ".number_format($p['harga'])."</td>";
                echo "<td>".$p['jumlahbarang']."</td>";
                echo "</tr>";
                $i++;
            }
  }  
          ?>
      </tbody>
      </table><hr>
                      <!--Pagination-->
                      <nav>
                    <ul class="pagination pg-blue">
                <?php
                 if($page == 1){ //jika page adl page 1,maka disable link prev dan first
                      ?>


                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">First</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                <?php
                }else{ //jika page bukan page 1
                    $link_prev = ($page > 1) ? $page - 1 : 1;
                ?>        
                        <li class="page-item">
                            <a class="page-link" href="index.php?p=1" aria-label="Previous">
                                <span aria-hidden="true">First</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                       <li class="page-item"> 
                            <a class="page-link" href="index.php?p=<?php echo $link_prev; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                <?php } ?>
                <!-- Link Number -->
                <?php
                //QUERY untuk menghitung semua jumlah data
                $q = $db->query("SELECT COUNT(*) AS jumlahbarang FROM tb_barang");
                $get_jumlah = $q->fetch_array();
                //hitung jumlah halamanya
                $jumlah_page = ceil($get_jumlah['jumlahbarang'] / $limit);
                //tentukan link number sblm dan ssudah page yg aktif
                $jumlah_number = 4;
                //untuk awal link number
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                //untuk akhir number
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
                
                for($i = $start_number; $i <= $end_number;$i++){
                    $link_active = ($page == $i) ? ' class="page-item active"' : '';
                
                ?>
                            <li <?php echo $link_active; ?>>
                            <a class="page-link" href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?>
                            </a>
                        </li>
                        <?php 
                        } 
                        //jika page sama dg jumlah page,maka disable link next dan last
                        //artinya page akhir
                        if($page == $jumlah_page){ //jika page akhir
                        ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>                   
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">Last</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                        <?php
                        }else{ //jika bukan page akhir
                            $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                            ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?p=<?php echo $link_next; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?p=<?php echo $jumlah_page; ?>" aria-label="Next">
                                <span aria-hidden="true">Last</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!--Pagination-->
    

  </div>
</div>
        