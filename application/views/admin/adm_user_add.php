<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" align="center">Menu Tambah User</h3>
          	<?php show_alert(); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div><hr>

    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Masukkan Data User Baru
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url().'admin/user_add_act' ?>" method="post">		
					<div class="form-group">
						<label class="control-label col-md-1">Nama</label>
						<div class="col-md-8">					
							<input type="text" name="name" class="form-control col-md-10">
							<?php echo form_error('name', '<div class="form-error">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-1">Email</label>
						<div class="col-md-8">	
							<input type="email" name="email" class="form-control">
							<?php echo form_error('email', '<div class="form-error">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-1">Username</label>
						<div class="col-md-5">	
							<input type="text" name="username" class="form-control check-username">
							<?php echo form_error('username', '<div class="form-error">', '</div>'); ?>
						</div>
						<div class="col-md-3">	
							<span class="check-username-output"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-1">Password</label>
						<div class="col-md-5">	
							<input type="password" name="password" class="form-control">
							<?php echo form_error('password', '<div class="form-error">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-1">Level</label>
						<div class="col-md-3">	
							<select class="form-control" name="level">						
								<option value="author">Author</option>					
								<option value="admin">Admin</option>
							</select>		
						</div>					
					</div>
					<div class="form-group">
						<label class="control-label col-md-1">Status</label>
						<div class="col-md-3">	
							<select class="form-control" name="status">						
								<option value="1">Active</option>
								<option value="0">Non-Active</option>				
							</select>	
						</div>
					</div>
					<div class="form-group">					
						<div class="col-md-12" align="center">
							<input type="submit" value="Simpan User" class="btn btn-sm btn-warning">
						</div>		
					</div>
				</form>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>