<div class="top-slider-panel owl-carousel owl-theme">
	<?php
	
		foreach($themeoptions['opt-slides']
			   as $slide) {
	?>
	<div class="item">
		<a href="<?php echo $slide['url'] ?>">
			<img src="<?php echo $slide['image'] ?>" alt="<?php echo $slide['title'] ?>">
			<div class="top-slider-text">
				<h4>
					 <?php echo $slide['title'] ?>
				</h4>
			</div>
		</a>
	</div>
	<?php }  ?>
</div>