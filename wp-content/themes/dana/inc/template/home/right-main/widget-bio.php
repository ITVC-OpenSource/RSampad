<?php if($themeoptions['widget-bio-bottom-panel-status'] == 0) { ?><!--=================== widget-bio  =================================-->
<div class="widget-bio col-lg-12 col-md-8 col-sm-7">
	<div class="bio-site content-back">
		<section class="img-bio">
			<img src="<?php echo $themeoptions['img-bio']['url'] ?>" class="img-fluid">
		</section>
		<section class="text-bio">
			<h5><?php echo $themeoptions['widget-bio-title'] ?></h5>
			<p><?php echo wpautop($themeoptions['widget-bio-content']) ?></p>
		</section>
	</div>
</div>
<?php }?>
<!--=================== end-widget-bio  =================================-->