<!-- banner -->
<section class="inner-banner">
	<div class="container">
	</div>
</section>
<!-- //banner -->


	
<!-- signin -->
<section class="signin py-5">
	<div class="container">
		<div class="row main-content-agile ">
			<div class="col-lg-12 pull-right">
				<a href="<?php echo base_url().'index' ?>" class="btn btn-success pull-right"><span class="fas fa-sign-in-alt"></span>&nbsp &nbsp Batal Edit</a>
			</div><br><br>
			<div class="col-md-12">	
				<div class="sub-main-w3">
					<h3 align="center">Edit Informasi Akun</h3>
						<p class="mt-2 mb-4" align="center">Isilah kolom di bawah ini dengan lengkap.</p>
							<?php foreach($register_edit as $a){ ?>
								<form method="post" action="<?php echo base_url().'index/register_update' ?>" enctype="multipart/form-data">
									<div class="col-md-4">
										<h5>Tahun Masuk Universitas</h5>
										<input type="number" class="form-control" name="alumni_masuk_tahun" placeholder="Tahun Masuk Kuliah" value="<?php echo $a->alumni_masuk; ?>">
									</div><br>
									<div class="col-md-4">
										<h5>Jurusan/Program Studi</h5>
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
									</div><br>
									<div class="col-md-6">
										<h5>Nama Lengkap</h5>
										<input type="hidden" name="id" value="<?php echo $a->alumni_id; ?>">
	                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="alumni_nama" value="<?php echo $a->alumni_nama; ?>">
	                                    <?php echo form_error('alumni_nama'); ?>
									</div><br>
									<div class="col-md-4">
										<h5>Nomor Induk Mahasiswa</h5>
										<input type="number" class="form-control" name="alumni_nim" placeholder="Nomor Induk Mahasiswa" value="<?php echo $a->alumni_nim; ?>">
									</div><br>
									<div class="col-md-4">
										<h5>Photo: <small>(Ukuran 220 x 180 pixel)</small></h5>
										<input type="file" id="alumni_foto" name="alumni_foto" style="color: black;">
									</div><br>
									<div class="col-md-4">
										<h5>Jenis Kelamin</h5>
										<select type="text" name="alumni_jk" placeholder="Menu Item Name" class="form-control" value="<?php echo $a->alumni_jk; ?>">
											<optgroup label="Pilih Jenis Kelamin">
												<option <?php if($a->alumni_jk == "lakilaki"){echo "selected='selected'";} ?> value="lakilaki">Laki-laki</option>
                                            	<option <?php if($a->alumni_jk == "perempuan"){echo "selected='selected'";} ?> value="perempuan">Perempuan</option>
											</optgroup>
										</select>
									</div><br>
									<div class="col-md-4">
										<h5>Tahun Kelulusan</h5>
										<input placeholder="Tahun Kelulusan Alumni" name="alumni_lulus_tahun" type="number" required="" class="form-control" value="<?php echo $a->alumni_lulus; ?>">
									</div><br>
									<div class="col-md-12">
										<h5>Alamat Rumah</h5>
										<textarea class="form-control" rows="3" name="alumni_alamat" ><?php echo $a->alumni_alamat; ?></textarea>
									</div><br>
									<div class="col-md-8">
										<h5>Email</h5>
										<input placeholder="Email" name="alumni_email" type="email" required="" value="<?php echo $a->alumni_email; ?>">
									</div><br>
									<div class="col-md-10">
										<h5>Link Sosial Media</h5>
										<input placeholder="http://www.facebook.com" name="alumni_sosmed" type="text" required="" value="<?php echo $a->alumni_sosmed; ?>">
									</div><br>
									<div class="col-md-6">
										<h5>No. Handphone</h5>
										<input placeholder="+62" name="alumni_ponsel" type="text" required="" value="<?php echo $a->alumni_hp; ?>">
									</div><br>
									<div class="col-md-8">
										<h5>Pekerjaan</h5>
										<input placeholder="Pekerjaan Alumni Saat Ini" name="alumni_kerja" type="text" required="" value="<?php echo $a->alumni_kerja; ?>">
									</div><br>
									<div class="col-md-12">
										<h5>Nama Instansi Tempat Alumni Bekerja</h5>
										<input placeholder="Instansi Tempat Alumni Bekerja" name="alumni_instansi" type="text" required="" value="<?php echo $a->alumni_instansi; ?>">
									</div><br>
									<div class="col-md-12">
										<h5>Alamat Kantor</h5>
										<textarea class="form-control" rows="3" name="alumni_alamatkantor"><?php echo $a->alumni_alamatkantor; ?></textarea>
									</div><br>
									<div class="col-md-6">
										<h5>No. Telp Kantor</h5>
										<input placeholder="(0645)" name="alumni_telpkantor" type="number" required="" class="form-control" value="<?php echo $a->alumni_telpkantor; ?>">
									</div><br>
									<div class="col-md-8">
										<h5>Personal Skill</h5>
										<input placeholder="Office, Programming, autocad" name="alumni_skill" type="text" required="" value="<?php echo $a->alumni_skill; ?>">
									</div><br>
									<div class="col-md-12">
										<h5>Judul Tugas Akhir</h5>
										<textarea class="form-control" rows="3" name="alumni_tga"><?php echo $a->alumni_tga; ?></textarea>
									</div><br>
									<div class="col-md-8">
										<h5>Personal Website</h5>
										<input placeholder="http://www.alumni.co.id" name="alumni_web" type="text" required="" value="<?php echo $a->alumni_website; ?>">
									</div><br>
									<div class="col-md-8">
										<h5>Username</h5>
										<input placeholder="Full Name" name="alumni_username" type="text" required="" value="<?php echo $a->alumni_username; ?>">
									</div><br>
									<div class="col-md-8">
										<h5>Password</h5>
										<input  placeholder="Password" name="alumni_password" type="password" required="">
										<?php echo form_error('alumni_password', '<div class="form-error">', '</div>'); ?>
									</div><br>
									<input type="submit" value="Simpan Perbaharuan Data Alumni">
								</form>
							<?php
		                        }
		                    ?>
				</div>
			</div>
			<div class="col-md-6">
				<img src="images/banner.png" alt="" class="img-fluid"/>
			</div>
		</div>
	</div>
</section>
<!-- //signin -->