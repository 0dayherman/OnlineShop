  <ol class="carousel-indicators">
  <?php
  $no = 0;
  for($no;$no<3;$no++){
  
  ?>
    <li data-target="#carousel-example-2" data-slide-to="<?php echo $no; ?>" class="<?php if($no == 0 ){ echo 'active'; }else{ echo 'notactive'; } ?>"></li>
    <?php } ?>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner mt-5" role="listbox">
  <?php 
    $q = $db->query("SELECT * FROM tb_slide ORDER BY id_slide desc LIMIT 0,3");
          $no = 0;

          while($row = $q->fetch_assoc()){
        ?>
    <div class="carousel-item <?php if($no == 0 ){ echo 'active'; }else{ echo ''; } ?>">
        <img class="d-block w-100" src="<?php echo "assets/img/".$row['gambar']; ?>" width="100" height="350"
          alt="<?php echo $row['gambar'];?>">
        <div class="mask rgba-black-strong"></div>
      <div class="carousel-caption">
        <h3 class="h3-responsive text-white"><?php echo $row['judul']; ?></h3>
      </div>
    </div>
    <?php $no++; } ?>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->