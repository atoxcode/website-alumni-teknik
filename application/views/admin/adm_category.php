<h3>Category</h3>
<small>All Categories</small>

<?php show_alert(); ?>
<div class="row">	
	<div class="col-md-4">	
		<div class="box">
			<div class="panel panel-success">
				<div class="panel-heading">
					<header>Add New Category</header>
				</div>			
				<div class="panel-body">	
					<?php echo validation_errors(); ?>
					<form action="<?php echo base_url().'admin/category_act' ?>" method="post">				
						<div class="form-group">
							<label>Category Name</label>			
							<input type="text" class="form-control" placeholder="Category Name .." name="category">  
						</div>				
						<div class="form-group">						
							<input type="submit" class="btn btn-primary btn-sm" value="Save">  
						</div>
					</form>				
				</div>	
			</div>		
		</div>
	</div>

	<div class="col-md-8">		
		<div class="panel panel-success">
			<div class="panel-heading">
				<header>All Categories</header>
			</div>			
			<div class="panel-body">									
				<table class="table table-bordered table-hover">
					<thead>
						<tr>														
							<th>Name</th>
							<!-- <th>Url</th>							 -->
							<th class="col-md-2">Option</th>							
						</tr>
					</thead>
					<tbody>
					<?php 					
						foreach($category as $c){
					?>
						<tr>							
							<td><?php echo $c->cat_nama ?></td>
							<!-- <td><?php echo $c->category_url ?></td>		 -->
							<td>
								<?php if($c->cat_id != "1"){ ?>
								<div class="btn-group">									
									<a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/category_edit/'.$c->cat_id ?>"><span class="glyphicon glyphicon-wrench"></span></a>
									<a class="btn btn-sm btn-default btn-delete" id="<?php echo base_url().'admin/category_delete/'.$c->cat_id ?>"><span class="glyphicon glyphicon-trash"></span></a>
								</div>
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