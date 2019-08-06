<?php 
include 'assets/template/header.php';
@session_start();
?>

<body>
  <center>
  <div class="bd-example">
  <div id="demo" class="carousel slide" data-ride="carousel" style="width: 100%">
    <ol class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner pt-5">
      <div class="carousel-item active">
         <img src="assets/img/komputer.png" alt="First Slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="md text-white">Komputer</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/laptop.png" alt="Second Slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="md text-white">Laptop</h5>
        </div>
      </div>
      <div class="carousel-item">
       <img src="assets/img/mouse.png" alt="Third Slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="md text-white">Mouse</h5>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" arial-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
  </center>

  <div class="container pb-4">
  <div class="alert alert-info mt-2 text-center" role="alert">
  <i class="fa fa-info-circle title-icon"></i> Selamat Datang di <strong>Dev Tech</strong>.
  </div>
  <p class="text-center" style="font-family: 'Kaushan Script', cursive; font-size: 30px; padding-top: 20px; height: 40px;">Semua&nbsp;<span id="lol"></span></p>
  </div>

    <?php 
      require 'config/config.php';
      $no_urut = 1;
      $halaman = 5;
      $search = $_POST['search'];
      $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
      $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
      $result = mysqli_query($db, "SELECT * FROM tb_barang WHERE namabarang LIKE '%$search%'");
      $total = mysqli_num_rows($result);
      $pages = ceil($total/$halaman);            
      $query = mysqli_query($db, "SEECT * FROM tb_barang WHERE namabarang LIKE '%$search%' LIMIT $mulai, $halaman");
      $no =$mulai+1;
	  ?>

    <div class='container'>
      <div class="row">
      <?php while ($data = mysqli_fetch_object($result)) {
        echo "

        <div class='col-md mb-2'>
          <div class='card'>
            <img src='assets/img/$data->namagambar' class='card-img-top' alt='$data->namagambar'>
            <div class='card-body'>
              <h5 class='card-title'>$data->namabarang</h5>
              <tr>
                <td>Spesifikasi : $data->spesifikasi<br></td>
                <td>Harga : <b>$data->harga</b><br></td>
                <td>Stok : <b>$data->jumlahbarang</b></td>
              </tr><br>
              <a href='cart.php?id=$data->id&action=add' class='btn btn-primary mt-2'>Pesan <i class='fa fa-cart-plus'></i></a>
            </div>
          </div>
        </div>";
      }
      ?>

      </div> <!-- End Row-->

      <nav aria-label="Page navigation example">
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
        <ul class="pagination pt-4">
          <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i++;?></a></li>
        </ul>
      </nav>
    <?php } ?></div> <!-- End Container -->
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