<!-- banner -->
<section class="inner-banner">
	<div class="container">
	</div>
</section>
<!-- //banner -->


<!-- Contact -->
<section class="contact py-5">
	<div class="container py-md-3">
		<?php
	        foreach($headline2 as $h){
	     ?>
			<div class="heading">
				<h2 class="head text-left"><?php echo ucwords(strtolower($h->headline_tittle)); ?></h2>
			</div>
			<div class="contact-form mt-5">
				<div class="row">
					<div class="col-lg-12 col-md-10 mx-auto">
						<div class="panel-default">
							<div class="panel-heading" style="height:300px; width:200px;" align="center">
								<br>
							       <?php if($h->headline_cover != ""){
						            echo "<img style='' src='".base_url()."image/headline/".$h->headline_cover."' style='height:400px; width:400px'></img>";
						          }else{
						           echo "<img src='".base_url()."image/bawaan/banner.png"."' alt='' class='img-fluid' style='height:400px; width:400px'></img>";
						          } ?>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="contact-form mt-5">
				<div class="row">
					<div class="col-lg-12 col-md-10 mx-auto">
						<div class="panel-default">
							<div class="panel-body">
								<p>
					            	<?php echo $h->headline_content;  ?>
					          	</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }?>
	</div>
</section>

<!-- Contact -->