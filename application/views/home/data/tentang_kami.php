<div class="inside-banner">
  <div class="container"> 
   
    <h2>Tentang Kami</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row">
  <div class="col-lg-8  col-lg-offset-2">
<!--   <img src="images/about.jpg" class="img-responsive thumbnail"  alt="realestate"> -->
  <?php
  foreach ($tentang_kami->result_array() as $value) {
    $isi_tentang_rental = $value['isi_tentang_rental'];
  }
  ?>
  <p><?php echo $isi_tentang_rental;?></p>
 </div>
 
</div>
</div>
</div>