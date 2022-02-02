<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" align="center">Menu User Admin</h3>
          	<?php show_alert(); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div><hr>


    <div class="col-lg-12">
    	<a href="<?php echo base_url().'admin/user_add' ?>" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-user"></span>&nbsp &nbsp Tambah User Baru</a>
    </div><br><br>

    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Tabel User
            </div>
            <div class="panel-body">
                <table class="table table-bordered" id="table-datatable"> 
					<thead> 
						<tr> 
							<th>Name</th> 
							<th>Email</th> 
							<th>Username</th>
							<th>Level</th> 
							<th>Status</th>
							<th>Option</th> 
						</tr> 
					</thead> 
					<tbody> 
						<?php 
							foreach ($user as $u) {
						?>
						<tr> 
							<td width="100px"><?php echo $u->user_name ?></td>
							<td width="100px"><?php echo $u->user_email ?></td> 
							<td width="100px"><?php echo $u->user_login ?></td> 
							<td width="50px"><?php echo $u->user_level ?></td>
							<td width="50px">
								<?php 
									if($u->user_status == "1"){
										echo "Active";
									}else if($u->user_status == "0"){
										echo "Non-Active";
									}
								?>
							</td>
							<td width="20px" align="center">
								<a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/user_edit/'.$u->user_id ?>"><span class="glyphicon glyphicon-wrench"></span></a>
								<a class="btn btn-sm btn-default btn-delete" id="<?php echo base_url().'admin/user_delete/'.$u->user_id ?>"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
					 	</tr> 
					 	<?php } ?>
					</tbody> 
				</table>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>