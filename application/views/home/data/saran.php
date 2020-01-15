<div class="inside-banner">
  <div class="container"> 
    
    <h2>Kritik/Saran</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
  <div class="col-lg-9 col-sm-9 ">
    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
<?php 
                  
                          if ($this->session->flashdata('sukses')){
                  echo "<div class='alert alert-success'>
                                           <span>Kritik/Saran Anda berhasil dikiirim</span>  
                                        </div>";
                        

                          }
                        
              ?>
            </div>
<div class="row contact">
  <div class="col-lg-9 col-sm-9 ">
    <?php echo form_open('home/saran_kirim');?>

                <input type="text" class="form-control" name="nama_saran" placeholder="Nama">
                <input type="text" class="form-control" name="email_saran" placeholder="Email ">
                <input type="text" class="form-control" name="telp_saran" placeholder="Telp">
                <textarea rows="6" class="form-control" name="isi_saran" placeholder="Kritik/Saran"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
    <?php echo form_close();?> 


                
        </div>


</div>
</div>
</div>