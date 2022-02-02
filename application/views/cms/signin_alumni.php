<!-- banner -->
<section class="inner-banner">
	<div class="container">
	</div>
</section>
<!-- //banner -->


<!-- signin -->
<section class="signin py-5">
	<div class="container">
		<div class="row main-content-agile">
			<div class="col-lg-6 col-md-9 mx-auto">	
				<div class="sub-main-w3 text-center">	
					<h3>Sign in ke Akun Anda</h3>
					<p class="mt-2 mb-4">Masukkan username dan password Anda untuk Sign In.</p>
					<form action="<?php echo base_url().'mhslogin/login_act'.$this->session->userdata('alumni_nim') ?>" method="post">
						<div class="icon1">
							<input type="text" class="form-control" placeholder="Masukkan username" name="username" autocomplete="off">
            				<?php echo form_error('username','<div class="form-error">','</div>'); ?>
						</div>
						<div class="icon2">
							<input type="password" class="form-control" placeholder="Masukkan password" name="password">
            				<?php echo form_error('password','<div class="form-error">','</div>'); ?>
						</div>
						<!-- <label class="anim">
						<input type="checkbox" class="checkbox">
							<span>Remember Me</span> 
							<a href="#">Forgot Password</a>
						</label>  -->
						<div class="clearfix"></div>
						<input type="submit" name="submit" class="btn btn-secondary btn-lg" value="Sign In">
						
						<p>Anda belum punya Akun? <a href="<?php echo base_url().'index.php/index/register' ?>" class="ml-2"><strong>Buat Akun Anda</strong></a></p>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 mx-auto">
				<img src="<?php echo base_url().'image/bawaan/banner.png' ?>" alt="" class="img-fluid"/>
			</div>
		</div>
	</div>
</section>
<!-- //signin -->