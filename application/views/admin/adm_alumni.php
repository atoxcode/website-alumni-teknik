<h3 align="center">Daftar Alumni Fakultas Teknik</h3>
<h2 align="center">UNIVERSITAS MALIKUSSALEH</h2>
<?php show_alert(); ?>
<small></small><br><hr>
<div class="clearfix"></div>
	<div class="col-md-6">
		 <form method="post" action="<?php echo base_url().'admin/alumni' ?>" enctype="multipart/form-data">
		 	<table class="table table-hover">
		 		<tr>
		 			<td width="20px">
		 				<label>Jurusan/Prodi:</label>
					    <select id="jurusan" type="text" name="jurusan" placeholder="Menu Item Name" class="form-control">
					      <optgroup label="Pilih Jurusan/Prodi">
					        <?php 
					          $jurusan1 = mysql_query("SELECT alumni_jurusan FROM tbl_alumni GROUP BY alumni_jurusan");
					          while($j1 = mysql_fetch_array($jurusan1)) { ?>
					            <option <?php if($jurusan == $j1[0]) {echo "selected";} ?> value='<?php echo $j1[0]; ?>'><?php echo $j1[0]; ?></option>
					        <?php } ?>
					        ?>
					      </optgroup>
					    </select>
		 			</td>
		 			<td width="100px">
		 				<label>Tahun Masuk</label>
					    <select type="text" id="thn" name="thn" placeholder="Menu Item Name" class="form-control">
					      <optgroup label="Pilih Tahun">
					        <?php 
					          $tahun1 = mysql_query("SELECT alumni_masuk FROM tbl_alumni GROUP BY alumni_masuk");
					          while($t1 = mysql_fetch_array($tahun1)) { ?>
					            <option <?php if($thn == $t1[0]) {echo "selected";} ?> value='<?php echo $t1[0]; ?>'><?php echo $t1[0]; ?></option>
					        <?php } ?>
					        ?>
					      </optgroup>
					    </select>
		 			</td>
		 			<td width="100px" align="center"><br>
		 				<input type="submit" value="Tampilkan" class="btn btn-success">
		 			</td>
		 		</tr>
		 	</table>
	 	</form>
	</div>
</div>
<br><hr>
<div class="clearfix"></div>
	<div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Berikut adalah daftar nama alumni Fakultas Teknik yang sudah terdaftar:
            </div>
            <div class="panel-body">
                <table class="table table-bordered" id="table-datatable"> 
					<thead> 
						<tr>
							<th align="center" width="5px">No.</th>
							<th width="250px">Nama</th>
							<th width="80px" align="center">NIM</th>
							<th width="80px" align="center">Jurusan/Prodi</th>
							<th width="120px">Pekerjaan</th>
							<th width="150px" align="center">No. Handphone</th>
							<th width="100px" align="center">Status</th>
							<th width="120px">Option</th>
						</tr>
					</thead> 
					<tbody> 
						<?php 
							$no = 1;
							foreach ($alumni as $u) {
						?>
						<tr> 
							<td align="center"><?php echo $no++;; ?></td>
							<td ><?php echo $u->alumni_nama; ?></td> 
							<td ><?php echo $u->alumni_nim; ?></td> 
							<td align="center"><?php echo $u->alumni_jurusan; ?></td> 
							<td ><?php echo $u->alumni_kerja; ?></td>
							<td ><?php echo $u->alumni_hp; ?></td>
							<td align="center">
								<?php								
								if($u->alumni_status == 'aktif'){
									//echo "Diterima";
									echo '<a class="btn btn-sm btn-primary" href="'.base_url().'admin/alumni_status1/'.$thn.$u->alumni_nim.$jurusan.'">Actived</a>';
								}else{
									echo '<a class="btn btn-sm btn-warning" href="'.base_url().'admin/alumni_status2/'.$thn.$u->alumni_nim.$jurusan.'">Non-active</a>';
								}
								?>										
							</td>
							<td align="center">
								<a class="btn btn-sm btn-default" href=""><span class="glyphicon glyphicon-search"></span></a>
								<a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/alumni_edit/'.$u->alumni_id ?>"><span class="glyphicon glyphicon-wrench"></span></a>
									<a class="btn btn-sm btn-default btn-delete" id="<?php echo base_url().'admin/alumni_delete/'.$u->alumni_id ?>"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
					 	</tr> <?php } ?>
					</tbody> 
				</table>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
    </div>
</div>





