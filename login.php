<?php include "assets/template/header.php"; ?>
<style type="text/css">
	.card {
  width: 300px;
}

.nav-item .nav-link[disabled]:hover {
  
}
</style>


<!-- content -->
<body>
<br><br><br><br>
<div class="container">
<h4 class="text-center mt-5">Login dan Daftar</h4>
<?php 
            if(isset($_GET['p'])){
                if($_GET['p'] == 'logout'){
                    echo "<div class='alert alert-success text-center' role='alert'>Anda berhasil Logout</div>";
                }
                else if($_GET['p'] == '403'){
                  echo "<div class='alert alert-danger text-center' role='alert'>Anda dilarang masuk</div>";
                }
                else if($_GET['p'] == 'gagalLogin'){
                  echo "<div class='alert alert-danger text-center' role='alert'>Username / Password salah</div>";
                }
                else if($_GET['p'] == 'Sdaftar'){
                  echo "<div class='alert alert-success text-center' role='alert'>Anda berhasil mendaftar. Silahkan Login!</div>";
                }
                else if($_GET['p'] == 'Gdaftar'){
                  echo "<div class='alert alert-danger text-center' role='alert'>Anda gagal mendaftar. Silahkan coba lagi!</div>";
                }
            }

        ?>
  <div class="card mx-auto border-0">
    <div class="card-header border-bottom-0 bg-transparent">
      <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-primary" id="login-tab" data-toggle="pill" href="#login" role="tab" aria-controls="login"
             aria-selected="true">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-primary" id="daftar-tab" data-toggle="pill" href="#daftar" role="tab" aria-controls="daftar"
             aria-selected="false">Register</a>
        </li>
      </ul>
    </div>

    <div class="card-body pb-4">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
          <form action="prosesLogin.php" method="POST">
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="email" placeholder="Username" required autofocus>
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary mb-5">Login</button>
          	</div>
          </form>
        </div>

        <div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="daftar-tab">
          <form action="prosesDaftar.php" method="POST">
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
              <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>

            <div class="form-group">
              <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>

            <div class="form-group">
              <input type="text" name="hp" class="form-control" placeholder="No HP" required>
            </div>

            <div class="text-center pt-2 pb-1">
              <button type="submit" class="btn btn-primary mb-3">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> <!-- End Container -->
</body>

<?php include 'assets/template/footer.php';?>
</html>