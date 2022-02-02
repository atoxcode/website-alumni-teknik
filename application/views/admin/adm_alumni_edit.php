

<h3 align="center">Menu Edit Data Alumni Fakultas Teknik</h3>
<h2 align="center">UNIVERSITAS MALIKUSSALEH</h2>


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
                <?php foreach($alumni as $a){ ?>
                    <form method="post" action="<?php echo base_url().'admin/alumni_update' ?>">
                    	<table class="table table-bordered">
                    		<tr>
    	                		<td class="col-md-6">
    									<h4>Jurusan:</h4>
    									<select type="text" name="alumni_jurusan" placeholder="Menu Item Name" class="form-control" value="<?php echo $a->alumni_jurusan; ?>">
                                        <optgroup label="Pilih Jurusan/Prodi">
                                            <option <?php if($a->alumni_jurusan == "sipil"){echo "selected='selected'";} ?> value="sipil">Teknik Sipil</option>
                                            <option <?php if($a->alumni_jurusan == "mesin"){echo "selected='selected'";} ?> value="mesin">Teknik Mesin</option>
                                            <option <?php if($a->alumni_jurusan == "elektro"){echo "selected='selected'";} ?> value="elektro">Teknik Elektro</option>
                                            <option <?php if($a->alumni_jurusan == "industri"){echo "selected='selected'";} ?> value="industri">Teknik Industri</option>
                                            <option <?php if($a->alumni_jurusan == "kimia"){echo "selected='selected'";} ?> value="kimia">Teknik Kimia</option>
                                            <option <?php if($a->alumni_jurusan == "arsitektur"){echo "selected='selected'";} ?> value="arsitektur">Teknik Arsitektur</option>
                                            <option <?php if($a->alumni_jurusan == "informatika"){echo "selected='selected'";} ?> value="informatika">Teknik Informatika</option>
                                            <option <?php if($a->alumni_jurusan == "sisteminformasi"){echo "selected='selected'";} ?> value="sisteminformasi">Sistem Informasi</option>
                                            <option <?php if($a->alumni_jurusan == "material"){echo "selected='selected'";} ?> value="material">Teknik Material</option>
                                            <option <?php if($a->alumni_jurusan == "energi"){echo "selected='selected'";} ?> value="energi">Teknik Energi Terbarukan</option>
                                        </optgroup>
                                    </select>
    								
    	                		</td>
    	                		<td>
    								<h4>Tahun Masuk:</h4>
    								<input type="number" class="form-control" name="alumni_masuk_tahun" placeholder="Tahun Masuk Kuliah" value="<?php echo $a->alumni_masuk; ?>">
    	                		</td>
                                <td>
                                    <h4>Tahun Lulus:</h4>
                                    <input type="number" class="form-control" name="alumni_lulus_tahun" placeholder="Tahun Lulus Kuliah" value="<?php echo $a->alumni_lulus; ?>">
                                </td>
                    		</tr>
                    		<tr>
                    			<td>
                    				<h4>Nama Lengkap:</h4>
                                    <input type="hidden" name="id" value="<?php echo $a->alumni_id; ?>">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="alumni_nama" value="<?php echo $a->alumni_nama; ?>">
                                    <?php echo form_error('alumni_nama'); ?>
                    			</td>
                    			<td>
                    				<h4>NIM:</h4>
                                    <input type="number" class="form-control" name="alumni_nim" placeholder="Nomor Induk Mahasiswa" value="<?php echo $a->alumni_nim; ?>">
                    			</td>
                    			<td>
                    				<h4>Photo: <small>(Ukuran 220 x 180 pixel)</small></h4>
    								<input type="file" id="alumni_foto" name="alumni_foto" style="color: black;">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>
                                    <h4>Alamat Rumah:</h4>
                                    <textarea class="form-control" rows="1" name="alumni_alamat"><?php echo $a->alumni_alamat; ?></textarea>
                    			</td>
                    			<td colspan="2">
                    				<h4>Jenis Kelamin:</h4>
                                    <select type="text" name="alumni_jk" placeholder="Menu Item Name" class="form-control" value="<?php echo $a->alumni_jk; ?>">
                                        <optgroup label="Pilih Jenis Kelamin">
                                            <option <?php if($a->alumni_jk == "lakilaki"){echo "selected='selected'";} ?> value="lakilaki">Laki-laki</option>
                                            <option <?php if($a->alumni_jk == "perempuan"){echo "selected='selected'";} ?> value="perempuan">Perempuan</option>
                                        </optgroup>
                                    </select>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>
                    				<h4>Email:</h4>
    								<input type="Email" class="form-control" name="alumni_email" value="<?php echo $a->alumni_email; ?>">
                    			</td>
                    			<td>
                    				<h4>Link Sosial Media:</h4>
    								<input type="text" class="form-control" name="alumni_sosmed" value="<?php echo $a->alumni_sosmed; ?>">
                    			</td>
                                <td>
                                    <h4>Personal Website:</h4>
                                    <input type="text" class="form-control" name="alumni_web" value="<?php echo $a->alumni_website; ?>">
                                </td>
                    		</tr>
                            <tr>
                                <td>
                                    <h4>Pekerjaan:</h4>
                                    <input type="text" class="form-control" name="alumni_kerja" value="<?php echo $a->alumni_kerja; ?>">
                                </td>
                                <td>
                                    <h4>No. Ponsel:</h4>
                                    <input type="number" class="form-control" name="alumni_ponsel" value="<?php echo $a->alumni_hp; ?>">
                                </td>
                                <td>
                                    <h4>No. Telp kantor:</h4>
                                    <input type="number" class="form-control" name="alumni_telpkantor" value="<?php echo $a->alumni_telpkantor; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Nama Instansi:</h4>
                                    <input type="text" class="form-control" name="alumni_instansi" value="<?php echo $a->alumni_instansi; ?>">
                                </td>
                                <td colspan="2">
                                    <h4>Personal Skill:</h4>
                                    <input type="text" class="form-control" name="alumni_skill" value="<?php echo $a->alumni_skill; ?>">
                                </td>
                            </tr>
                    		<tr>
                                <td>
                                    <h4>Alamat Kantor:</h4>
                                    <textarea class="form-control" name="alumni_alamatkantor"><?php echo $a->alumni_alamatkantor; ?></textarea>
                                </td>
                    			<td colspan="2">
                    				<h4>Judul Tugas Akhir:</h4>
    								<textarea class="form-control" name="alumni_tga"><?php echo $a->alumni_tga; ?></textarea>
                    			</td>
                    		</tr>
                            <tr>
                                <td>
                                    <h4>Username:</h4>
                                    <input type="textarea" class="form-control" name="alumni_username" value="<?php echo $a->alumni_username; ?>">
                                </td>
                                <td colspan="2">
                                    <h4>Password:</h4>
                                    <input type="password" class="form-control" name="alumni_password">
                                    <?php echo form_error('alumni_password', '<div class="form-error">', '</div>'); ?>
                                </td>
                            </tr>
                    	</table>
                    	
    					<div class="col-md-12" align="center">
    						<input type="submit" value="Simpan Data Alumni" class="btn btn-primary">
    					</div>
    					</form>
                    <?php
                        }
                    ?>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
    </div>
</div>