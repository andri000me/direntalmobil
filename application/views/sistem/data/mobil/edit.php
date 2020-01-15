<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/mobil">Mobil</a>
					</li>
				</ul>
				
			</div>


<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Mobil
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
										
											<?php echo form_open_multipart('sistem/kamar_update/','class="form-horizontal"'); ?>
											<div class="form-body">
												<h3 class="form-section"></h3>
												<input type="hidden" name="id_mobil" value="<?php echo $id_mobil;?>" >
												<div class="row">
														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">Kelas Mobil</label>
															<div class="col-md-6">
																<select data-placeholder="Select..." name="kelas_mobil_id" class="form-control select2me">
																<option value=""></option>					
																<?php
																foreach ($kelas_mobil->result_array() as $tampil) { 
																if ($kelas_mobil_id==$tampil['id_kelas_mobil']) { ?>
																<option value="<?php echo $tampil['id_kelas_mobil'];?>" selected="selected"><?php echo $tampil['nama_kelas_mobil'];?></option>
																<?php
																}
																else { ?>
																<option value="<?php echo $tampil['id_kelas_mobil'];?>"><?php echo $tampil['nama_kelas_mobil'];?></option>
																<?php
																}
																					
																}
																?>
															</select>
															</div>
														</div>
													</div>
													
												</div>
												<div class="row">
													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">Nama Mobil</label>
															<div class="col-md-6">
																<input type="text" class="form-control" value="<?php echo $nama_mobil;?>" name="nama_mobil">
																
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">Harga Mobil</label>
															<div class="col-md-6">
																<input type="text" class="form-control" value="<?php echo $harga_mobil;?>" name="harga_mobil">
																
															</div>
														</div>
													</div>
													
												</div>

												<div class="row">
													

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">Keterangan</label>
															<div class="col-md-9">
																<textarea name="spesifikasi_mobil" id="spesifikasi_mobil"  value="<?php echo $spesifikasi_mobil;?>" rows="6" class="wysihtml5 form-control" ><?php echo $spesifikasi_mobil;?></textarea>
																
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
																<button type="submit" class="btn green">Update</button>
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