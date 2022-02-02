<br>
<h3 align="center">Menu Tambah Alumni Fakultas Teknik</h3>
<h2 align="center">UNIVERSITAS MALIKUSSALEH</h2><hr>


    <?php show_alert(); ?>

    <div class="col-lg-12">
    	<a href="<?php echo base_url().'admin/alumni' ?>" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp &nbsp Batal Tambah</a>
    </div><br><br>
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Isilah Form di bawah ini:
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'admin/alumni_add_act' ?>" enctype="multipart/form-data">
                	<table class="table table-bordered">
                		<tr>
	                		<td class="col-md-6">
									<h4>Jurusan:</h4>
									<select type="text" name="alumni_jurusan" placeholder="Menu Item Name" class="form-control">
                                    <optgroup label="Pilih Jurusan/Prodi">
                                        <option value="sipil">Teknik Sipil</option>
                                        <option value="mesin">Teknik Mesin</option>
                                        <option value="elektro">Teknik Elektro</option>
                                        <option value="industri">Teknik Industri</option>
                                        <option value="kimia">Teknik Kimia</option>
                                        <option value="arsitektur">Teknik Arsitektur</option>
                                        <option value="informatika">Teknik Informatika</option>
                                        <option value="sisteminformasi">Sistem Informasi</option>
                                        <option value="material">Teknik Material</option>
                                        <option value="energi">Teknik Energi Terbarukan</option>
                                    </optgroup>
                                </select>
								
	                		</td>
	                		<td>
								<h4>Tahun Masuk:</h4>
								<input type="number" class="form-control" name="alumni_masuk_tahun" placeholder="Tahun Masuk Kuliah">
	                		</td>
                            <td>
                                <h4>Tahun Lulus:</h4>
                                <input type="number" class="form-control" name="alumni_lulus_tahun" placeholder="Tahun Lulus Kuliah">
                            </td>
                		</tr>
                		<tr>
                			<td>
                				<h4>Nama Lengkap:</h4>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="alumni_nama">
                			</td>
                			<td>
                				<h4>NIM:</h4>
                                <input type="number" class="form-control" name="alumni_nim" placeholder="Nomor Induk Mahasiswa">
                			</td>
                			<td>
                				<h4>Photo: <small>(Ukuran 220 x 180 pixel)</small></h4>
								<input type="file" id="alumni_foto" name="alumni_foto" style="color: black;">
                			</td>
                		</tr>
                		<tr>
                			<td>
                                <h4>Alamat Rumah:</h4>
                                <textarea class="form-control" rows="1" name="alumni_alamat"></textarea>
                			</td>
                			<td colspan="2">
                				<h4>Jenis Kelamin:</h4>
                                <select type="text" name="alumni_jk" placeholder="Menu Item Name" class="form-control">
                                    <optgroup label="Pilih Jenis Kelamin">
                                        <option value="lakilaki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </optgroup>
                                </select>
                			</td>
                		</tr>
                		<tr>
                			<td>
                				<h4>Email:</h4>
								<input type="Email" class="form-control" name="alumni_email">
                			</td>
                			<td>
                				<h4>Link Sosial Media:</h4>
								<input type="text" class="form-control" name="alumni_sosmed">
                			</td>
                            <td>
                                <h4>Personal Website:</h4>
                                <input type="text" class="form-control" name="alumni_web">
                            </td>
                		</tr>
                        <tr>
                            <td>
                                <h4>Pekerjaan:</h4>
                                <input type="text" class="form-control" name="alumni_kerja">
                            </td>
                            <td>
                                <h4>No. Ponsel:</h4>
                                <input type="number" class="form-control" name="alumni_ponsel">
                            </td>
                            <td>
                                <h4>No. Telp kantor:</h4>
                                <input type="number" class="form-control" name="alumni_telpkantor">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Nama Instansi:</h4>
                                <input type="text" class="form-control" name="alumni_instansi">
                            </td>
                            <td colspan="2">
                                <h4>Personal Skill:</h4>
                                <input type="text" class="form-control" name="alumni_skill">
                            </td>
                        </tr>
                		<tr>
                            <td>
                                <h4>Alamat Kantor:</h4>
                                <textarea class="form-control" name="alumni_alamatkantor"></textarea>
                            </td>
                			<td colspan="2">
                				<h4>Judul Tugas Akhir:</h4>
								<textarea class="form-control" name="alumni_tga"></textarea>
                			</td>
                		</tr>
                        <tr>
                            <td>
                                <h4>Username:</h4>
                                <input type="textarea" class="form-control" name="alumni_username">
                            </td>
                            <td colspan="2">
                                <h4>Password:</h4>
                                <input type="password" class="form-control" name="alumni_password">
                                <?php echo form_error('alumni_password', '<div class="form-error">', '</div>'); ?>
                            </td>
                        </tr>
                	</table>
                	
					<!--<div class="col-md-12">
						<h4>Foto <small>(Ukuran 220 x 180)</small></h4>
						<input type="file" id="foto" name="foto"><hr></br>
					</div>-->
					<div class="col-md-12" align="center">
						<input type="submit" value="Simpan Data Alumni" class="btn btn-primary">
					</div>
				</form>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
    </div>
</div>