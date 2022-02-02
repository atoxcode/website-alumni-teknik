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
	        foreach($single as $p){
	     ?>
			<div class="heading">
				<h3 class="head text-left"><?php echo ucwords(strtolower($p->post_tittle)); ?></h3>
				<p class="text-left"><?php echo date('d F Y',strtotime($p->post_date));?></p>
			</div>
			<div class="contact-form mt-5">
				<div class="row">
					<div class="col-lg-12 col-md-10 mx-auto">
						<div class="panel-default">
							<div class="panel-heading" style="height:300px; width:200px;" align="center">
								<br>
							       <?php if($p->post_cover != ""){
						            echo "<img style='' src='".base_url()."image/post/".$p->post_cover."' style='height:400px; width:400px'></img>";
						          }else{
						            echo "";
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
					            	<?php echo $p->post_content;  ?>
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