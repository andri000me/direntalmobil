<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/new_rental">Pemesanan</a>
					</li>
				</ul>
				
			</div>

<div class="row">
				<div class="col-md-12">
					
					<?php 
									
													if($this->session->flashdata('in')){
														echo "<div class='alert alert-success'>
												                   <span>Rental Akan diproses</span>  
												                </div>";
													}
													else if($this->session->flashdata('out')){

														echo "<div class='alert alert-success'>
												                   <span>Pengembalian SUCCESS</span>  
												                </div>";

													}
													else if($this->session->flashdata('berhasil')){

														echo "<div class='alert alert-success'>
												                   <span>Pemesanan Baru SUCCESS</span>  
												                </div>";

													}

													else if($this->session->flashdata('perpanjang')){

														echo "<div class='alert alert-success'>
												                   <span>Perpanjang SUCCESS</span>  
												                </div>";

													}
													
												
							?>
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Pemesanan
							</div>


							
						</div>

						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">

									<div class="col-md-6">
										<div class="btn-group">
											
											<a class="btn green" href="<?php echo base_url();?>sistem/new_reservasi_tambah">
											Add <i class="fa fa-plus"></i>
											</a>
											
										</div>
										
									</div>
									
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>No</th>
								<th>Aksi</th>
								<th>Nama</th>
								<th>Telp</th>
								<th>Alamat</th>
								<th>Tanggal Rental</th>
								<th>Tanggal Kembali</th>
								<th>Mobil</th>
								
								
							</tr>
							</thead>
							<tbody>
											<?php
										$no=1;
										
											foreach ($new_rental->result_array() as $tampil) { ?>
										<tr >

											<td><?php echo $no;?></td>
											<td>
												<?php
												if ($tampil['status_rental']==0) { ?>

												<a  class="btn green" href="<?php echo base_url();?>sistem/new_reservasi_in/<?php echo $tampil['id_rental'];?>/1">Proses Sewa</a> 
												<?php
												}
												else if ($tampil['status_rental']=="1") { ?>

												<a  class="btn red" href="<?php echo base_url();?>sistem/new_reservasi_out/<?php echo $tampil['id_rental'];?>/2" >Proses Pengembalian</a>
												<a  class="btn blue" href="<?php echo base_url();?>sistem/new_reservasi_perpanjang/<?php echo $tampil['id_rental'];?>" >Perpanjang</a>
												<?php
												}
												else { ?>
													<span class="label label-sm label-success">Mobil Sudah Kembali</span>
												<?php
												}
												?>
											<td><?php echo $tampil['nama_rental'];?></td>
											<td><?php echo $tampil['telp_rental'];?></td>
											<td><?php echo $tampil['alamat_rental'];?></td>
											<td><?php echo tgl_indo($tampil['tgl_rental_masuk']);?></td>
											<td><?php echo tgl_indo($tampil['tgl_rental_kembali']);?></td>
											<td><?php echo $tampil['nama_mobil'];?></td>
											
											
										</tr>
										<?php
										$no++;
										}
										?>
										
										
										
							</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>