<div id="page-wrapper">
	<div class="">
		<div class="row">
			<?php show_alert(); ?>
			<?php echo form_open_multipart('admin/headline_update');?>	
			<?php 
				foreach($edit as $e){
			?>
				<div class="col-md-10 box-posting">
					<?php echo validation_errors(); ?>
					<h2>Menu Edit Pages</h2>
					</br>
						<input type="hidden" name="id" value="<?php echo $e->headline_id ?>">
						<input type="text" class="form-control control3" placeholder="Headline Title" name="headline_tittle" value="<?php echo $e->headline_tittle ?>">
						<div class="box-body">
							<div class="form-group">
								<textarea name="headline_content" class="ckeditor form-control"><?php echo $e->headline_content ?></textarea>
							</div>	
						</div>
				</div>
				<div class="col-md-4 panel-grids ">
					<div class="panel panel-success">
						<div class="panel-heading"> 
							<h3 class="panel-title">Gambar Page (500 x 300)</h3> 
							<small>Format : jpg, png, gif</small>
						</div> 
						<div class="panel-body" align="center"> 
							<?php if($e->headline_cover != ""){ ?>
								<img class='gambar-cover-sementara' src='<?php echo base_url().'image/headline/'.$e->headline_cover ?>' height='100' weight='100'> </br>				
								<a id="<?php echo $e->headline_id ?>" class="hapus-cover-headline">Hapus Gambar Cover</a>											
							<?php }else{ ?>
								<input type="file" name="headline_cover">
							<?php } ?>
						</div> 
					</div>
				</div><br>

				<div class="col-md-4 panel-grids">
					<div class="panel panel-success"> 
						<div class="panel-heading"> 
							<h3 class="panel-title">Publish</h3>
						</div> 
						<div class="panel-body" align="center"> 
							<input type="submit" name="save" value="Simpan" class="btn btn-success">
						</div> 
					</div>
				</div>
			<?php 
				} 
			?>
		</div>
	</div>
</div>