<div class="cat-car-panel col-md-12">
	<div class="cat-car-title-p">
		<div class="cat-car-p">
			<div class="cat-car owl-carousel owl-theme">
				<?php
	
					foreach($themeoptions['video-opt-slides']
						   as $slide) {
				?>
				<div class="item">
					<a href="<?php echo $slide['url'] ?>">
						<img src="<?php echo $slide['image'] ?>" alt="<?php echo $slide['title'] ?>">
						<div class="car-cat-center-text">
							<h3>
								<?php echo $slide['title'] ?>
							</h3>
						</div>
						
					</a>
				</div>
				<?php }  ?>
			</div>
		</div>
	</div>
</div>