<div id="page-wrapper">
	<div class="col-md-12 box-posting">

		<?php show_alert(); ?>
		
		<h2 align="center">Menu Upload File Dokumen</h2>
	
		<a href="<?php echo base_url()?>admin/dokumen_add" class="btn btn-info pull-right"><span class="glyphicon glyphicon-pencil"></span>&nbsp &nbsp Tambah File Baru</a> 
		<div class="col-md-12 panel-grids"></br>
			<div class="panel panel-success">
				<div class="panel-heading"> 
					<h3 class="panel-title">Daftar File yang dapat di download</h3> 
				</div> 
				<div class="panel-body"> 
					<!--<div class="table-responsive bs-example widget-shadow">-->
						<table class="table table-bordered" id="table-datatable"> 
							<thead> 
								<tr> 
									<th width="50px">No</th> 
									<th >Judul Dokumen</th> 
									<th width="150px">Option</th> 
								</tr> 
							</thead> 
							<tbody> 
								<?php 	
									$no = 1;				
									foreach($dokumen as $a){
								?>
									<tr> 
										<th scope="row"><?php echo $no++;; ?></th>
										<td><?php echo $a->dokumen_nama;?></td> 
										<td>
											<div class="btn-group">
												<a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/dokumen_edit/'.$a->dokumen_id ?>"><span class="glyphicon glyphicon-wrench"></span></a>
												<a class="btn btn-sm btn-default btn-delete" id="<?php echo base_url().'admin/dokumen_delete/'.$a->dokumen_id ?>"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
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