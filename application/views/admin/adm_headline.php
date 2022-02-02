<div id="page-wrapper">
	<div class="col-md-12 box-posting">

		<?php show_alert(); ?>

		<h2>Menu Headline</h2>
		</br>
	</div>

	<div class="col-md-10 panel-grids"></br>
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Semua Headline</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive bs-example widget-shadow">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="10px">No</th>
								<th>Headline Tittle</th>
								<th width="15px">Option</th>
							</tr>
						</thead>
						<tbody>
							<?php 	
								$no = 1;		
								foreach($headline as $p){
							?>
							<tr>
								<th scope="row"><?php echo $no++;; ?></th>
								<td><?php echo $p->headline_tittle; ?></td>
								<td>
									<div class="btn-group">
										<a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/headline_edit/'.$p->headline_id ?>"><span class="glyphicon glyphicon-wrench"></span></a>
										<!--$p->headline_id digunakan untuk memanggil headline berdasarkan id-->
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
