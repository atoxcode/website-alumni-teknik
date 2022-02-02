<!-- banner -->
<section class="inner-banner">
	<div class="container">
	</div>
</section>
<!-- //banner -->


<!-- Contact -->
<section class="contact py-5">
	<div class="container py-md-3">
		<div class="heading">
			<h3 class="head text-center">Kritik, Saran atau Aduan</h3>
			<p class="my-3 head text-center"> Jika ada kritik, saran atau aduan yang terkait dengan Kerja Praktek dapat Anda tuliskan di kolom ini. Adapun tujuannya adalah untuk meningkatkan kenyaman belajar mengajar. Silahkan memberikan pengaduan secara sopan dan tertib. Dan kami juga sangat menjaga kerahasian identitas Anda.</p>
		</div>
		<div class="contact-form mt-5">
			<div class="row">
				<div class="col-lg-7 col-md-10 mx-auto">
					<form method="post" action="<?php echo base_url().'index/pengaduan_act' ?>">
						<div class="form-group">
						  <label>Nama</label>
						  <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" >
						</div>
						
						<div class="form-group">
						  <label>Kritik /  Saran / Pengaduan:</label>
						  <textarea name="pengaduan" class="form-control" placeholder="Tulis di sini.." autocomplete="off"></textarea>
						  <?php if(form_error('pengaduan') != ""){echo "<div class='alert alert-danger'>".form_error('pengaduan')."</div>";} ?>
						</div>				
						<button type="submit" name="submit" class="btn btn-default" required="required">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact -->