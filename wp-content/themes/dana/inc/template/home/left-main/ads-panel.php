<div class="col-lg-2 ads-panel-left">
<?php dynamic_sidebar('سایدبار تبلیغات'); ?>
	<?php
	
		foreach($themeoptions['image-ads-opt-slides']
			   as $slide) {
	?>
	<a href="<?php echo $slide['url'] ?>" >
		<img src="<?php echo $slide['image'] ?>" alt="<?php echo $slide['title'] ?>" class="img-fluid" style="margin-bottom: 15px;">
	</a>
	<?php }  ?>
</div>