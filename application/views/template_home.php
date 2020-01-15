<?php
foreach ($tentang_kami->result_array() as  $value) {
  $id_tentang_rental = $value['id_tentang_rental'];
  $nama_rental = $value['nama_rental'];
  $alamat_tentang_rental = $value['alamat_tentang_rental'];
  $email_tentang_rental = $value['email_tentang_rental'];
  $telp_tentang_rental = $value['telp_tentang_rental'];
  $isi_tentang_rental = $value['isi_tentang_rental'];
  $logo = $value['logo'];
  $fb = $value['fb'];
  $tw = $value['tw'];
  $gp = $value['gp'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Dirental | Sewa Mobil Berkualitas </title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css"/>
  <script src="<?php echo base_url();?>assets/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/owl-carousel/owl.theme.css">
<script src="<?php echo base_url();?>assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

<link href="<?php echo base_url();?>assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">



</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
               <!-- Barusan Edit mobil menjadi mobil dan rubah file mobil jadi mobil -->
               <!-- edit -->
                <li><a href="<?php echo base_url();?>home/mobil">Mobil</a></li>
                <!-- <li><a href="<?php echo base_url();?>home/reserfasi">Reserfasi</a></li>          -->
                <li><a href="<?php echo base_url();?>home/tentang_kami">Tentang Kami</a></li>
                <li><a href="<?php echo base_url();?>home/saran">Kritik/Saran</a></li>
                <li><a href="<?php echo base_url();?>home/galeri">Gallery</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->







<div class="container">

<!-- Header Starts -->
<div class="header">
<center><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/tentang_kami/<?php echo $logo;?>" alt="Dirental"></a></center>

              <ul class="pull-right">
                <!-- <li><a href="<?php echo base_url();?>buysalerent.php">Buy</a></li>
                <li><a href="<?php echo base_url();?>buysalerent.php">Sale</a></li>         
                <li><a href="<?php echo base_url();?>buysalerent.php">Rent</a></li> -->
              </ul>
</div>
<!-- #Header Starts -->
</div>




<?php echo $contents; ?> 



<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Informasi</h4>
                   <ul class="row">
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/mobil">Mobil</a></li>         
                <!-- <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/reserfasi">Reserfasi</a></li> -->
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/tentang_kami">Tentang Kami</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo base_url();?>home/saran">Kritik/Saran</a></li>
              </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Tentang Kami</h4>
                    <p><?php echo character_limiter($isi_tentang_rental, 100);?><br><a href="<?php echo base_url();?>home/tentang_kami">Selengkapnya</a></p>
                    
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Social Media</h4>
                    <a href="<?php echo $fb;?>"><img src="<?php echo base_url();?>images/facebook.png" alt="facebook"></a>
                    <a href="<?php echo $tw;?>"><img src="<?php echo base_url();?>images/twitter.png" alt="twitter"></a>
                    <a href="#"><img src="<?php echo base_url();?>images/linkedin.png" alt="linkedin"></a>
                    <a href="#"><img src="<?php echo base_url();?>images/instagram.png" alt="instagram"></a>
            
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Kontak</h4>
                    <p><b>Dirental Mobil.</b><br>
<span class="glyphicon glyphicon-map-marker"></span> <?php echo $alamat_tentang_rental;?> <br>
<span class="glyphicon glyphicon-envelope"></span> <?php echo $email_tentang_rental;?><br>
<span class="glyphicon glyphicon-earphone"></span> <?php echo $telp_tentang_rental;?></p>
            </div>
        </div>
<p class="copyright">Copyright @ 2019 - 2020. Kelompok-8 17 CID B. </p>


</div></div>



<script src="<?php echo base_url();?>assets/date_picker_bootstrap/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>


<script type="text/javascript">

 $('.form_date').datetimepicker({

        language:  'id',

        weekStart: 1,

        todayBtn:  1,

  autoclose: 1,

  todayHighlight: 1,

  startView: 2,

  minView: 2,

  forceParse: 0

    });

</script>


</body>
</html>



