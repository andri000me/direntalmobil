<div class="">
    

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="#">Mobil Kualitas Terbaik</a></h2>
              <blockquote>              
              <p>Mobil yang dengan kualitas terbaik membuat Anda berkendara dengan nyaman</p>
              
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="#">Mobil Modern</a></h2>
              <blockquote>              
              <p>Teknologi Mobil Modern untuk Lingkungan yang Lebih Baik, konsumsi bahan bakar pun menjadi salah satu faktor pendorong penting untuk mobil modern.
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2><a href="#">Multi Purpose Vehicle</a></h2>
              <blockquote>              
             
              <p>Mobil keluarga yang ideal adalah bermanfaat bagi seluruh anggota keluarga, dapat memuat semua keluarga dan perlengkapannya, nyaman dan luas, hemat BBM dan suku cadang mudah didapat. </p>
          
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2><a href="#">Perawatan Mobil Teratur</a></h2>
              <blockquote>              
              
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque natus architecto, fuga et delectus saepe minus suscipit aspernatur blanditiis consequuntur!.</p>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2><a href="#">Harga Rental Terbaik</a></h2>
              <blockquote>              
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque natus architecto, fuga et delectus saepe minus suscipit aspernatur blanditiis consequuntur!</p>

              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->


        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>


<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="<?php echo base_url();?>home/mobil" class="pull-right viewall">Lihat Semua Mobil</a>
    <h2>Daftar Mobil</h2>
    <div id="owl-example" class="owl-carousel">
      
    	<?php
    	foreach ($mobil->result_array() as $value) { ?>
    		
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
    	<?php
    	}
    	?>
      
     
      
    </div>
  </div>
  
</div>