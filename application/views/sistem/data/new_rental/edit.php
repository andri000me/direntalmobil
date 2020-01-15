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


<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Perpanjang Mobil
										</div>
										
									</div>
									<div class="portlet-body form">
										<?php if(validation_errors()) { ?>
								<div class="alert alert-danger">
								  <button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo validation_errors(); ?>
								</div>
								<?php 
								} 
								?>
										
											<?php echo form_open_multipart('sistem/new_reservasi_perpanjang_simpan/','class="form-horizontal"'); ?>
											<div class="form-body">

												<input type="hidden" name="id_rental" value="<?php echo $id_rental;?>">
												<h3 class="form-section"></h3>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tanggal Rental</label>
															<div class="col-md-9">
																 <input class="form-control form-control-inline input-medium date-picker" name="tgl_rental_masuk" id="tgl_rental_masuk" size="16" type="text" value="<?php echo $tgl_rental_masuk;?>" readonly/>
                                                              
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tanggal Kembali</label>
															<div class="col-md-9">
																 <input class="form-control form-control-inline input-medium date-picker" name="tgl_rental_kembali" id="tgl_rental_kembali" size="16" type="text" value="<?php echo $tgl_rental_kembali;?>"/>
                                                              
															</div>
														</div>
													</div>
													
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nama Mobil</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="nama_mobil" value="<?php echo $nama_mobil;?>" disabled>
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nama</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="nama_rental" value="<?php echo $nama_rental;?>" disabled>
																
															</div>
														</div>
													</div>
													
												</div>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tlp</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="telp_rental" value="<?php echo $telp_rental;?>" disabled>
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alamat</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="alamat_rental" value="<?php echo $alamat_rental;?>" disabled>
																
															</div>
														</div>
													</div>
													
												</div>
												


											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Perpanjang</button>
																</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										<?php echo form_close();?>  
										
									</div>
								</div>