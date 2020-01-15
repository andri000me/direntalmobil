<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/new_rental">Pemesanan Baru</a>
					</li>
				</ul>
				
			</div>


<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Proses Check Cout
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
										
											<?php echo form_open_multipart('sistem/new_reservasi_out_simpan/','class="form-horizontal"'); ?>
											<div class="form-body">
												<?php

												if ($waktu==0) {

													$total_bayar = $harga_mobil * 0.5;

												}
												else {

													$total_bayar = $harga_mobil * $waktu;
												}



												?>
												<input type="hidden" name="waktu" value="<?php echo $waktu;?>">
												<input type="hidden" name="id_rental" value="<?php echo $id_rental;?>">
												<input type="hidden" name="status_rental" value="<?php echo $status_rental;?>">
												<input type="hidden" name="id_mobil" value="<?php echo $id_mobil;?>">
												<h3 class="form-section">Informasi</h3>

												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nama</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  name="nama_rental" value="<?php echo $nama_rental;?>" disabled>
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telp</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="telp_rental" value="<?php echo $telp_rental;?>" disabled>
																
															</div>
														</div>
													</div>
													
												</div>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alamat</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  name="alamat_rental" value="<?php echo $alamat_rental;?>" disabled>
																
															</div>
														</div>
													</div>

												
													
												</div>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tanggal Rental</label>
															<div class="col-md-9">
																 <input class="form-control form-control-inline input-medium date-picker" name="tgl_rental_masuk" id="tgl_rental_masuk" size="16" type="text" value="<?php echo tgl_indo($tgl_rental_masuk);?>" disabled/>
                                                              
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tanggal Kembali</label>
															<div class="col-md-9">
																 <input class="form-control form-control-inline input-medium date-picker" name="tgl_rental_kembali" id="tgl_rental_kembali" size="16" type="text" value="<?php echo tgl_indo($tgl_rental_kembali);?>" disabled/>
                                                              
															</div>
														</div>
													</div>
													
												</div>
										
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobil</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  name="nama_mobil" value="<?php echo $nama_mobil;?>" disabled>
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Harga Mobil/hari</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="harga_mobil" value="<?php echo $harga_mobil;?>" disabled>
																
															</div>
														</div>
													</div>
													
												</div>

												<h3 class="form-section">Pembayaran</h3>

													<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Total Bayar</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  name="total_bayar" id="total_bayar" value="<?php echo $total_bayar;?>" readonly>
																
															</div>
														</div>
													</div>

													
													
												</div>

												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Uang Bayar</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  name="uang_bayar" id="uang_bayar" value="" >
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Uang Kembali</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="kembalian" id="kembalian" value="" >
																
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
																<button type="submit" class="btn green">Bayar</button>
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


<script type="text/javascript">
	

	$(document).ready(function() {

		$("#uang_bayar").focus();

		 $("#uang_bayar").keyup(function(e) {

		 	var total_bayar =  $("#total_bayar").val();
		 	var uang_bayar =  $("#uang_bayar").val();

		 	var kembalian = uang_bayar - total_bayar;

		 	$("#kembalian").val(kembalian);


                  
         });
	});
</script>