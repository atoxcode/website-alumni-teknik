<div id="page-wrapper">
	<div class="col-md-12 box-posting">

		<?php show_alert(); ?>
		
		<h2>Menu Tambah File Dokumen Baru</h2>
	
		<div class="col-md-12 panel-grids"></br>
			<div class="panel panel-success">
				<div class="panel-heading"> 
					<h3 class="panel-title">Tambah File Baru</h3> 
				</div> 
				<div class="panel-body">
					<?php echo validation_errors('dokumen_file'); ?>
					<form action="<?php echo base_url().'admin/dokumen_act' ?>" method="post" enctype="multipart/form-data"> 
						<h4>Nama Dokumen</h4>
						<input type="text" name="dokumen_nama" class="form-control"><hr>
						<h4>Upload Dokumen</h4>
						<small>File berupa (PDF, doc, ppt, etc)</small>
						<input type="file" id="dokumen_file" name="dokumen_file"><hr>
						<input type="submit" class="btn btn-success btn-sm" value="Upload">
					</form>
				</div> 
			</div>
		</div>
	</div>
</div>