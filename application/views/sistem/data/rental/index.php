<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/rental">Semua Pemesanan</a>
					</li>
				</ul>
				
			</div>

<div class="row">
				<div class="col-md-12">
					
					
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Semua Pemesanan
							</div>


							
						</div>

						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>No</th>
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
										
											foreach ($rental->result_array() as $tampil) { ?>
										<tr >

											<td><?php echo $no;?></td>
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