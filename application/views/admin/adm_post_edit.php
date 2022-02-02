<h3>Posts</h3>
<small>Add New Post</small>

<?php show_alert(); ?>
<?php echo form_open_multipart('admin/post_update');?>	
<?php 
foreach($posts as $p){
?>
	<div class="row">
		<div class="col-md-9 box-posting">					
			<?php echo validation_errors(); ?>						
			<div class="form-group">					
				<input type="hidden" name="id" value="<?php echo $p->post_id ?>">
				<input type="text" name="post_tittle" class="form-control" placeholder="Post Tittle" value="<?php echo $p->post_tittle ?>">
			</div>			
			<div class="form-group">					
				<textarea name="post_content" class="ckeditor form-control"><?php echo $p->post_content ?></textarea>
			</div>									
		</div>

		<div class="col-md-3">
			<div class="box">
				<div class="box-heading">
					<header>Tanggal Post</header>
				</div>
				<div class="box-body">
					<input type="date" class="form-control tanggal"name="post_tanggal">
				</div>
			</div>
		</div>


		<div class="col-md-3">	
			<div class="box">
				<div class="box-heading">
					<header>Post Category</header>
				</div>			
				<div class="box-body">	
					<?php 
					foreach($category as $c){
					$wt = array(
						'taxonomy' => 'post_category',
						'taxonomy_child' => $c->cat_id,
						'taxonomy_parent' => $p->post_id
						);
					$cek_tax = $this->m_dah->edit_data($wt,'tbl_taxonomy')->num_rows();
					?>
					<input type="checkbox" name="post_cat[]" <?php if($cek_tax > 0 ){echo "checked='checked'";} ?> value="<?php echo $c->cat_id ?>"> <?php echo $c->cat_nama; ?><br/>
					<?php						
					}
					?>				
				</div>				
			</div>

			<div class="box">
				<div class="box-heading">
					<header>Post Image Cover</header>
				</div>			
				<div class="box-body">	
					<div class="tampil-image-cover">
						<?php if($p->post_cover != ""){ ?>
							<img class='gambar-cover-sementara' src='<?php echo base_url().'image/post/'.$p->post_cover ?>'>						
							<a id="<?php echo $p->post_id ?>" class="hapus-cover-image-post">Hapus Gambar Cover</a>											
						<?php }else{ ?>
							<input type="file" name="post_cover" class="btn-image-cover">
						<?php } ?>
						<a class="btn-hapus-cover">Hapus Gambar Cover</a>
					</div>					
				</div>				
			</div>

			<div class="box">
				<div class="box-heading">
					<header>Publish</header>
				</div>			
				<div class="box-body">												
					<input type="submit" name="save" value="Publish" class="btn btn-sm btn-primary">
					<input type="submit" name="save" value="Draft" class="btn btn-sm btn-default">
				</div>			
			</div>
		</div>
	</div>
<?php } ?>
</form>