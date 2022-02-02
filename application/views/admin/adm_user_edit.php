<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Menu Edit User</h3>
          	<?php show_alert(); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div><br>

    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Ubahlah data user dengan bijak..
            </div>
            <div class="panel-body">
                <?php foreach($user as $u){ ?>
					<form class="form-horizontal" action="<?php echo base_url().'admin/user_update' ?>" method="post">
						<div class="form-group">
							<label class="control-label col-md-1">Nama</label>
							<div class="col-md-8">
								<input type="hidden" name="id" value="<?php echo $u->user_id ?>">
								<input type="text" name="name" class="form-control col-md-10" value="<?php echo $u->user_name ?>">
								<?php echo form_error('name', '<div class="form-error">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">Email</label>
							<div class="col-md-8">
								<input type="email" name="email" class="form-control" value="<?php echo $u->user_email ?>">
								<?php echo form_error('email', '<div class="form-error">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">Username</label>
							<div class="col-md-5">
								<input type="text" name="username" class="form-control check-username" disabled value="<?php echo $u->user_login ?>">
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
									<option <?php if($u->user_level == "author"){echo "selected='selected'";} ?> value="author">Author</option>
									<option <?php if($u->user_level == "admin"){echo "selected='selected'";} ?> value="admin">Admin</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">Status</label>
							<div class="col-md-3">
								<select class="form-control" name="status">
									<option <?php if($u->user_status == "1"){echo "selected='selected'";} ?> value="1">Active</option>
									<option <?php if($u->user_status == "0"){echo "selected='selected'";} ?> value="0">Non-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2 col-md-offset-1">
								<input type="submit" value="Simpan Data User" class="btn btn-sm btn-warning">
							</div>
						</div>
					</form>
				<?php } ?>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>