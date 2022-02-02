<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"><br>
            <h3 class="page-header" align="center">Daftar Pengaduan Online</h3>
          	<?php show_alert(); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div><br>

    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Daftar Pengaduan
            </div>
            <div class="panel-body">
                <table class="table table-bordered" id="table-datatable"> 
					<thead> 
						<tr> 
							<th>No.</th> 
							<th>Tanggal</th> 
							<th>Nama</th>
							<th>Kritik / Saran / Pengaduan</th>
							<th>Option</th> 
						</tr> 
					</thead> 
					<tbody> 
						<?php 
							$no = 1;
							foreach ($pengaduan as $p) {
						?>
						<tr> 
							<td width="10px"><?php echo $no++;; ?></td>
							<td width="200px"><?php echo date('d F Y', strtotime($p->pengaduan_tgl)); ?></td> 
							<td width="200px"><?php echo $p->pengaduan_nama ?></td> 
							<td><?php echo $p->pengaduan ?></td>
							<td width="50px">
								<a class="btn btn-sm btn-default btn-delete" id="<?php echo base_url().'admin/pengaduan_hapus/'.$p->pengaduan_id ?>"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
					 	</tr> 
					 	<?php } ?>
					</tbody> 
				</table>
            </div>
            <div class="panel-footer">
                Panel Footer
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>