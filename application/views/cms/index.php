banner -->
<section class="banner">
	<div class="container">
		<div class="row banner-grids">
			<?php
	          foreach($headline1 as $h){
	        ?>
				<div class="col-lg-6 banner-info">
					<h3 class="mb-3"><?php echo $h->headline_tittle; ?></h3>
					<!-- <p class="mb-4"><?php echo $h->headline_content;  ?></p> -->
					<a href="<?php echo base_url().'index/headline1/'.$h->headline_id.'/'.create_slug($h->headline_tittle)?>">Read More</a>
				</div>
				<div class="col-lg-6 col-md-9 banner-image">
					<?php if($h->headline_cover != ""){
                    echo "
                    <img src='".base_url()."image/headline/".$h->headline_cover."' style='height:400px; width:400px'></img>
                    " ;
                  }else{
                    echo "<img src='".base_url()."image/bawaan/banner.png"."' alt='' class='img-fluid' style='height:400px; width:400px'></img>";
                  } ?>
					
				</div>
			<?php 
				}
			?>
		</div>
	</div>
</section>
<!-- //banner -->

<section class="banner">
	<div class="container">
		<div class="row banner-grids">
			<?php
	          foreach($headline2 as $h){
	        ?>
				<div class="col-lg-6 col-md-9 banner-image">
					<?php if($h->headline_cover != ""){
                    echo "
                    <img src='".base_url()."image/headline/".$h->headline_cover."' style='height:400px;' ></img>" ;
                  }else{
                    echo "<img src='".base_url()."image/bawaan/banner.png"."' alt='' class='img-fluid' style='height:400px; width:400px'></img>";
                  } ?>
				</div>
				<div class="col-lg-6 banner-info">
					<h3 class="mb-3"><?php echo $h->headline_tittle; ?></h3>
					<!-- <p class="mb-4"><?php echo $h->headline_content;  ?></p> -->
					<a href="<?php echo base_url().'index/headline1/'.$h->headline_id.'/'.create_slug($h->headline_tittle)?>">Read More</a>
				</div>	
			<?php 
				}
			?>
		</div>
	</div>
</section>

<!-- banner bottom -->
<!-- <section class="banner-bottom py-5">
	<div class="container py-md-3">
		<div class="heading">
			<h3 class="head text-center">The working process of our team work </h3>
			<p class="my-3 head text-center"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus
			turpis sodales quis. Integer sit amet mattis quam.</p>
		</div>
		<div class="row bottom_grids text-center mt-5 pt-3">
			<div class="col-lg-4 col-md-6">
				<img src="<?php echo base_url().'image/bawaan/s1.png' ?>" alt="" class="img-fluid"/>
				<h3 class="my-3">Statistics</h3>
				<p class="mb-4"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaetr Curae; Nulla mollis dapibus nunc,
				utrea rhoncus turpis sodales quis.</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<img src="<?php echo base_url().'image/bawaan/s2.png' ?>" alt="" class="img-fluid"/>
				<h3 class="my-3">Security</h3>
				<p class="mb-4"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaetr Curae; Nulla mollis dapibus nunc,
				utrea rhoncus turpis sodales quis.</p>
			</div>
			<div class="col-lg-4">
				<img src="<?php echo base_url().'image/bawaan/s3.png' ?>" alt="" class="img-fluid"/>
				<h3 class="my-3">Presentation</h3>
				<p class="mb-4"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaetr Curae; Nulla mollis dapibus nunc,
				utrea rhoncus turpis sodales quis.</p>
			</div>
		</div>
	</div>
</section> -->
<!-- banner bottom -->

<!-- about -->
<section class="about py-5">
	<div class="container">
		<div class="inner-sec-w3ls py-lg-5 py-3">
			<div class="heading">
				<h3 class="head text-center">Fakultas Teknik terdiri dari: </h3>
			</div>

			<div class="row mt-lg-5 mt-5 pt-md-3">
				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/sipil.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Sipil</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/mesin.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Mesin</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/elektro.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Elektro</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-lg-5 mt-5 pt-md-3">
				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/industri.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title"> Teknik Industri</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/kimia.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Kimia</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/arsitektur.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Arsitektur</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-lg-5 mt-5 pt-md-3">
				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/informatika.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Informatika</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/sisteminformasi.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Sistem Informasi</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/material.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Material</h4>
								<p class="card-text">Strata 1</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-lg-5 mt-5 pt-md-3">
				<div class="col-lg-4 col-md-6 about-in text-left">
					<div class="card">
						<div class="card-body mb-md-0">
							<div class="icon-service"><img src="<?php echo base_url().'image/jurusan/energi.png' ?>" alt="" class="img-fluid"/></div>
							<div class="icon-service-info">
								<h4 class="card-title">Teknik Energi Terbarukan</h4>
								<p class="card-text">Strata 2</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //about -->

<!-- latest news -->
<section class="latest-news py-5">
	<div class="container py-md-5">
		<div class="heading">
			<h3 class="head text-center">Berita Terkini</h3>
			<p class="my-3 head text-center"> Informasi seputar alumni yang diharapkan dapat menginspirasi.</p>
		</div>
		<div class="row news_grids mx-auto mt-5 pt-3">
			<?php
	          foreach($posts as $p){
	        ?>
				<div class="row col-lg-6 p-lg-auto p-0 mx-auto">
					<div class="col-md-12">
						<div class="blog-post mb-4">
							<div class="bg-light p-4">
								<h4 class="judul-posting"><?php echo ucfirst(post_content($p->post_tittle, 55)); ?></h4>
								<h6 class="card-title"><?php echo date('d F Y',strtotime($p->post_date));?></h6>
							</div>
							<div align="center">
								<?php if($p->post_cover != ""){
									echo "<img class='post-cover' src='".base_url()."image/post/".$p->post_cover."' style='height:300px; width:200px'></img>";
								}else{
	                    			echo "<img class='post-cover' src='".base_url()."image/system/logo_unimal.png' style='height:300px; width:200px'></img>";
								} ?>
							</div>
						</div>
						<?php echo strip_tags(post_content($p->post_content, 400)); ?>
						<div class="clearfix"></div>
						<a href="<?php echo base_url().'index/single/'.$p->post_id.'/'.create_slug($p->post_tittle)?>"> Read More </a>
					</div>
				</div>
			<?php 
				}
			?>
		</div>
	</div>
</section>
<!-- //latest news -->

<!-- improvements -->
<!-- <section class="stats bg-light py-5">
	<div class="container py-md-5">
		<div class="heading">
			<h3 class="head text-center">Industry trusted improvements</h3>
			<p class="my-3 head text-center"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus
			turpis sodales quis. Integer sit amet mattis quam.</p>
		</div>
		<div class="row text-center mt-5"> 
			<div class="col-md-4">
				<div class="bg-white p-4">
					<h4>5%</h4>
					<p class="my-3"> Vestibulum ante ipsum primis in faucibus orci </p>
				</div>
			</div>
			<div class="col-md-4 mt-md-0 mt-3">
				<div class="bg-white p-4">
					<h4>28%</h4>
					<p class="my-3"> Vestibulum ante ipsum primis in faucibus orci </p>
				</div>
			</div>
			<div class="col-md-4 mt-md-0 mt-3">
				<div class="bg-white p-4">
					<h4>39%</h4>
					<p class="my-3"> Vestibulum ante ipsum primis in faucibus orci </p>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- //improvements -->

<!-- subscribe -->
<!-- <section class="subscribe py-5">
	<div class="container py-md-5">
		<div class="heading">
			<h3 class="head text-center">Sign in to get started</h3>
			<p class="my-3 head text-center"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus
			turpis sodales quis. Integer sit amet mattis quam.</p>
		</div>
		<form action="#" method="post" class="mt-5">
			<div class="d-flex mb-2">
				<input type="email" name="Email" placeholder="Enter your email..." required="">
				<input type="submit" value="Get Started">
			</div>
		<span class="text-white">We'll never share your email with anyone else.</span>
		</form>
	</div>
</section> -->
<!-- //subscribe