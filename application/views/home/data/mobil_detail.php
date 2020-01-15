<div class="inside-banner">
  <div class="container"> 
    
    <h2>Info Mobil</h2>
</div>
</div>
<!-- banner -->

<div class="container">
<div class="properties-listing spacer">
<?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>

                <?php 
                  
                        if($this->session->flashdata('berhasil')){

                            echo "<div class='alert alert-success'>
                                           <span>Rental Akan diproses</span>  
                                        </div>";

                          }

                       
              ?>

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

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

<div class="col-lg-9 col-sm-8 ">

  <?php
  foreach ($mobil->result_array() as $value) {
    $id_mobil         = $value['id_mobil'];
    $nama_mobil      = $value['nama_mobil'];
    $harga_mobil      = $value['harga_mobil'];
    $spesifikasi_mobil  = $value['spesifikasi_mobil'];
    $nama_kelas_mobil = $value['nama_kelas_mobil'];
    $status_mobil = $value['status_mobil'];
  }
  ?>

<h2><?php echo $nama_mobil;?></h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
         <?php
        $no=0;
        foreach ($mobil_gambar->result_array() as $value) { ?>
           <?php
            if ($no==0) { ?>

             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <?php
            }
            else { ?>

             <li data-target="#myCarousel" data-slide-to="<?php echo $no;?>" class=""></li>
             <?php
            }
            ?>
       
         <?php
        $no++;
        }
       
        ?>
      </ol>
      <div class="carousel-inner">
       
        <?php
        $no=0;
        foreach ($mobil_gambar->result_array() as $value) { ?>

            

            <?php
            if ($no==0) { ?>
              <div class="item active">
                <img src="<?php echo base_url();?>images/mobil_gambar/<?php echo $value['nama_mobil_gambar'];?>" class="properties" alt="properties" />
              </div>

            <?php
            }
            else { ?>

              <div class="item">
                <img src="<?php echo base_url();?>images/mobil_gambar/<?php echo $value['nama_mobil_gambar'];?>" class="properties" alt="properties" />
              </div> 
            <?php
            }
            ?>

        <?php
        $no++;
        }
       
        ?>
       
        

        
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Informasi Mobil</h4>
  <p><?php echo $spesifikasi_mobil;?></p> 
  </div>


  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo rupiah($harga_mobil);?></p>
 
  
 
</div>

    <h6><span class="glyphicon glyphicon-th-large"></span> <?php echo $nama_kelas_mobil;?></h6>
    <div class="listing-detail">
    
</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">

  <?php

  if ($status_mobil==0) { ?>

  <h6><span class="glyphicon glyphicon-envelope"></span> Pemesanan Mobil</h6>
  <?php echo form_open('home/rental/','role="form"'); ?>
    <input type="hidden" name="id_mobil" value="<?php echo $id_mobil;?>">
     <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_rental_masuk" placeholder="Tanggal Rental">

                                            

                                                        </div>
                                                        <br>
      <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_rental_kembali" placeholder="Tanggal Kembali">

                                            

                                                        </div>
                                                        <br>
                <input type="text" class="form-control" name="nama_rental" placeholder="Nama"/>
                <input type="text" class="form-control" name="telp_rental" placeholder="Tlp"/>
                <textarea rows="6" class="form-control" name="alamat_rental" placeholder="Alamat"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Sewa Mobil</button>
     
      <?php echo form_close();?>

  <?php
  }
  else { ?>

  <div class='alert alert-danger'>
                                           <span>Maaf, Mobil Sedang disewa</span>  
                                        </div>

  <?php
  }

  ?>
  
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div></div>