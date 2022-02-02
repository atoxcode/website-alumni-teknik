<div id="page-wrapper">
	<div class="col-md-12 box-posting">

		<?php show_alert(); ?>
		
		<h2 align="center">Menu Edit File Dokumen</h2>
	
		<div class="col-md-12 panel-grids"></br>
			<div class="panel panel-success">
				<div class="panel-heading"> 
					<h3 class="panel-title">Edit File Download</h3> 
				</div> 
				<div class="panel-body">
					<?php echo validation_errors('dokumen_file'); ?>
					<?php foreach($edit as $e){ ?>
					<form action="<?php echo base_url().'admin/dokumen_update' ?>" method="post" enctype="multipart/form-data"> 
						<h4>Nama Dokumen</h4>
						<!--name = "id" dibuat untuk memanggil id yang akan di edit-->
						<input type="hidden" name="id" class="form-control" value="<?php echo $e->dokumen_id ?>">
						<!--akhir id-->
						<input type="text" name="dokumen_nama" class="form-control control" value="<?php echo $e->dokumen_nama ?>"><hr>
						<h4>Upload Dokumen</h4>
						<small>File berupa (PDF, doc, ppt, etc)</small> </br>
						<?php if($e->dokumen_file != ""){ ?>
							<img class='gambar-cover-sementara' src='<?php echo base_url().'dokumen/'.$e->dokumen_file ?>' width="100px" height="100px">	</br>			
							<a id="<?php echo $e->dokumen_id ?>" class="hapus-file-dokumen-page">Hapus Dokumen</a>											
						<?php }else{ ?>
							<input type="file" name="dokumen_file" id="dokumen_file">
						<?php } ?>
						</br>
						<input type="submit" class="btn btn-success btn-sm" value="Simpan">
					</form>
					<?php
						}
					?>
				</div> 
			</div>
		</div>
	</div>
</div>