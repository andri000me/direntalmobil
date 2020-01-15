<div class="inside-banner">
  <div class="container"> 
    
    <h2>Galeri</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">




<div class="col-lg-12 col-sm-12">

<div class="row">


     <?php
      foreach ($galeri_kategori->result_array() as $value) { ?>
     <!-- properties -->
      <div class="col-lg-3 col-sm-9">

        
        <div class="properties">
          <div class="image-holder"><img src="<?php echo base_url();?>images/galeri/<?php echo $value['gambar'];?>" class="img-responsive" alt="properties"/>
            
          </div>
          <h4><a href="<?php echo base_url();?>home/galeri_detail/<?php echo $value['id_kategori_galeri'];?>"><?php echo $value['nama_galeri'];?></a></h4>

          <a class="btn btn-primary" href="<?php echo base_url();?>home/galeri_detail/<?php echo $value['id_kategori_galeri'];?>">View</a>
        </div>


      </div>
      <!-- properties -->

      <?php
      }
      ?>

    
      <div class="center">

</div>

</div>
</div>
</div>
</div>
