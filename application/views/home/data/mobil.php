<div class="inside-banner">
  <div class="container"> 
    
    <h2>Mobil</h2>
</div>
</div>
<!-- banner -->





<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
   
          <!-- edit-3 -->
          <?php echo form_open('home/mobil_kelas_mobil');?>
          <div class="row">
          <div class="col-lg-12">
              <select class="form-control" name="kelas_mobil_id">
                <option value="">Pilih Jenis Mobil</option>
                <?php
                foreach ($kelas_mobil->result_array() as $value) { ?>
                    <option value="<?php echo $value['id_kelas_mobil'];?>"><?php echo $value['nama_kelas_mobil'];?></option>
                <?php
                }
                ?>
               
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

          <?php echo form_close();?>

  </div>





</div>

<div class="col-lg-9 col-sm-8">

<div class="row">


     <?php
     // edit
      foreach ($mobil->result_array() as $value) { ?>
     <!-- properties -->
      <div class="col-lg-4 col-sm-6">

        
        <div class="properties">
          <div class="image-holder"><img src="<?php echo base_url();?>images/mobil_gambar/<?php echo $value['nama_mobil_gambar'];?>" class="img-responsive" alt="properties"/>
            <?php
            if ($value['status_mobil']=="0") { ?>
            <div class="status sold">Tersedia</div>

            <?php
            }
            else { ?>

            <div class="status new">Mobil Sedang disewa</div>
            <?php
            }
            ?>
          </div>

          <!-- edit-2 -->
          <h4><a href="<?php echo base_url();?>home/mobil_detail/<?php echo $value['id_mobil'];?>"><?php echo $value['nama_mobil'];?></a></h4>
          <p class="price">Harga: <?php echo rupiah($value['harga_mobil']);?></p>
          <div class="listing-detail"><?php echo $value['nama_kelas_mobil'];?>   </div>

          <!-- edit-2 -->
          <a class="btn btn-primary" href="<?php echo base_url();?>home/mobil_detail/<?php echo $value['id_mobil'];?>">Detail & Sewa</a>
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
</div>