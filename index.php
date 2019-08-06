<?php 
include 'assets/template/header.php';
include 'config/config.php';
?>

<body>
  <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <?php include "carousel.php";?>
  </div>

  <div class="container pb-4">
  <div class="alert alert-info mt-2 text-center" role="alert">
  <i class="fa fa-info-circle title-icon"></i> Selamat Datang di <strong>Dev Tech</strong>.
  </div>
  <p class="text-center" style="font-family: 'Kaushan Script', cursive; font-size: 30px; padding-top: 20px; height: 40px;">Semua&nbsp;<span id="lol"></span></p>
  </div>

    

    <div class='container'>
      <div class="col-md text-center">
        <img src="assets/img/banner2.png" width="80%">
        </div>
      <div class="row">
     
        
      <?php 
      require 'config/config.php';
      $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                
                $limit = 6; //Limit data per halamanya

                //Untuk menentukan dari data ke berapa yang akan ditampilkan pada table
                $limit_start = (int)($page - 1)* $limit;

                //query untuk menampilkan data artikel sesuai limit yg di tentukan
                $res = $db->query("SELECT * FROM `tb_barang` ORDER BY `id` DESC LIMIT ".$limit_start.",".$limit);
                //untuk penomoran table
                $no = $limit_start + 1;
                if($res->num_rows == 0){ //cek data pada table produk 
                echo "Tidak ada produk!";
              }else{

                while($row = $res->fetch_object()){

        echo "
          <div class='col-md-3 col-sm-3'>
          <div class='card mb-2'>
            <img src='assets/img/$row->namagambar' class='card-img-top' alt='$row->namabarang'>
            <div class='card-body'>
              <h5 class='card-title'>$row->namabarang</h5>
              <tr>
                <td>Spesifikasi : $row->spesifikasi<br></td>
                <td>Harga : <b>Rp. " .number_format($row->harga)."</b><br></td>
                <td>Stok : <b>$row->jumlahbarang</b></td>
              </tr><br>
              <a href='cart.php?add=$row->id' class='btn btn-primary mt-2'>Pesan <i class='fa fa-cart-plus'></i></a>
              <a href='view.php?id=$row->id' class='btn btn-primary mt-2'>Lihat <i class='fa fa-eye'></i></a>
            </div>
          </div>
          </div>
        ";
      $no++;
                  }
                  }
                  ?>
      </div> <!-- End Row-->
      

      <!--Pagination-->
                <nav class="d-flex justify-content-center mt-3">
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
                            <a class="page-link" href="index.php?page=1" aria-label="Previous">
                                <span aria-hidden="true">First</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                       <li class="page-item"> 
                            <a class="page-link" href="index.php?page=<?php echo $link_prev; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                //QUERY untuk menghitung semua jumlah data
                $q = $db->query("SELECT COUNT(*) AS jumlah FROM tb_barang");
                $get_jumlah = $q->fetch_array();
                //var_dump($get_jumlah); //for debug only
                //hitung jumlah halamanya
                $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
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
                            <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?>
                            </a>
                        </li>
                        <?php 
                        } 
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
                            <a class="page-link" href="index.php?page=<?php echo $link_next; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $jumlah_page; ?>" aria-label="Next">
                                <span aria-hidden="true">Last</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
    </div> <!-- End Container -->
  </body>

   <?php include "assets/template/footer.php";?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script id="rendered-js">
          // function([string1, string2],target id,[color1,color2])    
consoleText(['Ada...', '  Belanja...'], 'lol');

function consoleText(words, id, colors) {
  if (colors === undefined) colors = ['#212529'];
  var visible = true;
  var con = document.getElementById('console');
  var letterCount = 1;
  var x = 1;
  var waiting = false;
  var target = document.getElementById(id);
  target.setAttribute('style', 'color:' + colors[0]);
  window.setInterval(function () {

    if (letterCount === 0 && waiting === false) {
      waiting = true;
      target.innerHTML = words[0].substring(0, letterCount);
      window.setTimeout(function () {
        var usedColor = colors.shift();
        colors.push(usedColor);
        var usedWord = words.shift();
        words.push(usedWord);
        x = 1;
        target.setAttribute('style', 'color:' + colors[0]);
        letterCount += x;
        waiting = false;
      }, 1000);
    } else if (letterCount === words[0].length + 1 && waiting === false) {
      waiting = true;
      window.setTimeout(function () {
        x = -1;
        letterCount += x;
        waiting = false;
      }, 1000);
    } else if (waiting === false) {
      target.innerHTML = words[0].substring(0, letterCount);
      letterCount += x;
    }
  }, 120);
  window.setInterval(function () {
    if (visible === true) {
      con.className = 'console-underscore hidden';
      visible = false;

    } else {
      con.className = 'console-underscore';

      visible = true;
    }
  }, 400);
}
          //# sourceURL=pen.js
        </script>


  </body>
</html>