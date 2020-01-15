<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/galeri">Galeri</a>
					</li>
				</ul>
				
			</div>


<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Galeri
										</div>
										
									</div>
									<div class="portlet-body form">
										
										
											<?php echo form_open_multipart('sistem/galeri_update/','class="form-horizontal"'); ?>
											<div class="form-body">
												<h3 class="form-section"></h3>
												<div class="row">
													<input type="hidden" name="id_galeri" value="<?php echo $id_galeri;?>" >
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Kategori</label>
															<div class="col-md-9">
																<select data-placeholder="Select..." name="kategori_galeri_id" class="form-control select2me">
																<option value=""></option>					
																<?php
																foreach ($kategori->result_array() as $tampil) { 
																if ($kategori_galeri_id==$tampil['id_kategori_galeri']) { ?>
																<option value="<?php echo $tampil['id_kategori_galeri'];?>" selected="selected"><?php echo $tampil['nama_kategori_galeri'];?></option>
																<?php
																}
																else { ?>
																<option value="<?php echo $tampil['id_kategori_galeri'];?>"><?php echo $tampil['nama_kategori_galeri'];?></option>
																<?php
																}
																					
																}
																?>
															</select>
															</div>
														</div>
													</div>



													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nama Galeri</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="nama_galeri" value="<?php echo $nama_galeri;?>">
																
															</div>
														</div>
													</div>
													
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gambar</label>
															<div class="col-md-9">
																<input type="file" name="userfile">
															</div>

														</div>

													</div>

												
													
												</div>
												<span class="label label-important">NOTE!</span>
											<span>
											Kosongkan gambar jika tidak ingin merubahnya.
											</span>
												
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