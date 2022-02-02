<!-- banner -->
<section class="inner-banner">
	<div class="container">
	</div>
</section>
<!-- //banner -->


<!-- Contact -->
<section class="contact py-5">
	<div class="container py-md-3">
		<div class="heading">
			<h3 class="head text-center">File Download</h3>
			<p class="my-3 head text-center">Berikut adalah kumpulan file yang bisa diunduh.</p>
		</div>
		<div class="contact-form mt-5">
			<div class="row">
				<div class="col-lg-12 col-md-10 mx-auto">
					<div class="panel-default">
						<div class="panel-heading">
					
						</div>
						<div class="panel-body">
							<table class="table table-bordered" id="table-datatable"> 
								<thead>
									<tr align="center">
										<th width="10px" >No.</th>
										<th width="900px">Nama File</th>
										<th>Link Download</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										foreach ($download as $u) { 
									?>
									<tr>
										<td align="center"><?php echo $no++;; ?></td>
										<td ><?php echo $u->dokumen_nama; ?></td>
										<td width="10px">
											<!--if adalah pilihan antara file kosong atau tidak-->
											<?php if($u->dokumen_file != ""){ ?>
												<a class="btn btn-labeled btn-success" target="_blank" href="<?php echo base_url().'dokumen/'.$u->dokumen_file ?>" >
												<span class="btn-label"><span class="fa fa-thumbs-up "></span>Download</a>
											<?php }else{ ?>
												<a class="btn btn-labeled btn-success" href="<?php echo base_url().'index/file_kosong/' ?>" >
												<span class="btn-label"><span class="fa fa-thumbs-up "></span>Download</a>
											<?php } ?>
										</td> 
									</tr>
									<?php 
										} 
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact -->