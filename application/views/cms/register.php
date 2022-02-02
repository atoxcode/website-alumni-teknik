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
			<div class="col-md-12">	
				<div class="sub-main-w3">	
					<h3 align="center">Buat Akun</h3>
					<p class="mt-2 mb-4" align="center">Isi kolom di bawah ini dengan lengkap.</p>
					<form method="post" action="<?php echo base_url().'index/register_act' ?>" enctype="multipart/form-data">
						<div class="col-md-4">
							<h5>Tahun Masuk Universitas</h5>
							<input placeholder="Tahun Masuk Universitas" name="alumni_masuk_tahun" type="number" required="" class="form-control">
						</div><br>
						<div class="col-md-4">
							<h5>Jurusan/Program Studi</h5>
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
									<option value="energiterbarukan">Teknik Energi Terbarukan</option>
								</optgroup>
							</select>
						</div><br>
						<div class="col-md-6">
							<h5>Nama Lengkap</h5>
							<input placeholder="Nama Lengkap Anda" name="alumni_nama" type="text" required="">
						</div><br>
						<div class="col-md-4">
							<h5>Nomor Induk Mahasiswa</h5>
							<input placeholder="Nomer Induk Mahasiswa" name="alumni_nim" type="number" required="" class="form-control">
						</div><br>
						<div class="col-md-4">
							<h5>Photo: <small>(Ukuran 220 x 180 pixel)</small></h5>
							<input type="file" id="alumni_foto" name="alumni_foto" style="color: black;">
						</div><br>
						<div class="col-md-4">
							<h5>Jenis Kelamin</h5>
							<select type="text" name="alumni_jk" placeholder="Menu Item Name" class="form-control">
								<optgroup label="Pilih Jenis Kelamin">
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</optgroup>
							</select>
						</div><br>
						<div class="col-md-4">
							<h5>Tahun Kelulusan</h5>
							<input placeholder="Tahun Kelulusan Alumni" name="alumni_lulus_tahun" type="number" required="" class="form-control">
						</div><br>
						<div class="col-md-12">
							<h5>Alamat Rumah</h5>
							<textarea class="form-control" rows="3" name="alumni_alamat"></textarea>
						</div><br>
						<div class="col-md-8">
							<h5>Email</h5>
							<input placeholder="Email" name="alumni_email" type="email" required="">
						</div><br>
						<div class="col-md-10">
							<h5>Link Sosial Media</h5>
							<input placeholder="http://www.facebook.com" name="alumni_sosmed" type="text" required="">
						</div><br>
						<div class="col-md-6">
							<h5>No. Handphone</h5>
							<input placeholder="+62" name="alumni_ponsel" type="text" required="">
						</div><br>
						<div class="col-md-8">
							<h5>Pekerjaan</h5>
							<input placeholder="Pekerjaan Alumni Saat Ini" name="alumni_kerja" type="text" required="">
						</div><br>
						<div class="col-md-12">
							<h5>Nama Instansi Tempat Alumni Bekerja</h5>
							<input placeholder="Instansi Tempat Alumni Bekerja" name="alumni_instansi" type="text" required="">
						</div><br>
						<div class="col-md-12">
							<h5>Alamat Kantor</h5>
							<textarea class="form-control" rows="3" name="alumni_alamatkantor"></textarea>
						</div><br>
						<div class="col-md-6">
							<h5>No. Telp Kantor</h5>
							<input placeholder="(0645)" name="alumni_telpkantor" type="number" required="" class="form-control">
						</div><br>
						<div class="col-md-8">
							<h5>Personal Skill</h5>
							<input placeholder="Office, Programming, autocad" name="alumni_skill" type="text" required="">
						</div><br>
						<div class="col-md-12">
							<h5>Judul Tugas Akhir</h5>
							<textarea class="form-control" rows="3" name="alumni_tga"></textarea>
						</div><br>
						<div class="col-md-8">
							<h5>Personal Website</h5>
							<input placeholder="http://www.alumni.co.id" name="alumni_web" type="text" required="">
						</div><br>
						<div class="col-md-8">
							<h5>Username</h5>
							<input placeholder="Full Name" name="alumni_username" type="text" required="">
						</div><br>
						<div class="col-md-8">
							<h5>Password</h5>
							<input  placeholder="Password" name="alumni_password" type="password" required="">
						</div><br>
						
						
						<input type="submit" value="Buat Akun">
						<p>Apakau Anda sudah punya akun? <a href="<?php echo base_url().'index.php/index/signin_alumni' ?>" class="ml-2"><strong>Sign in ke Akun Anda</strong></a></p>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<img src="images/banner.png" alt="" class="img-fluid"/>
			</div>
		</div>
	</div>
</section>
<!-- //signin -->