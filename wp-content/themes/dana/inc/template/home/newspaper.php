<?php if($themeoptions['newspaper-car-panel-status'] == 0) { ?>
<div class="voice-car col-lg-12">
	<div class="voice-car-header panel-title-back">
		 <i class="fa fam-newspaper-o" aria-hidden="true"></i>
		<h4><?php echo $themeoptions['newspaper-panel-title-slider'] ?></h4>
		<a href="<?php echo site_url("/newspaper"); ?>">
			آرشیو
		</a>
	</div>
	<div class="newspaper-footer content-back col-lg-12">
		<div class="row">
		<div class="newspaper-car-panel content-back owl-carousel owl-theme owl-rtl owl-loaded owl-drag col-md-4">
			
			<?php
				foreach($themeoptions['newspaper-car-slides']
					   as $slide) {
			?>
			<div class="item">
				<a href="<?php echo $slide['url'] ?>">
					<div class="newspaper-car-img">
						<img src="<?php echo $slide['image'] ?>" alt="<?php echo $slide['title'] ?>">
					</div>
				</a>
			</div>
			<?php }  ?>
			
		</div>
			<div class="col-md-8 newspaper-text">
				<div class="row">
					<?php
			$newspaper_arg = array(
					'post_type' => 'newspaper',
					'posts_per_page' => 4
				);
			$newspaper_query = new WP_Query($newspaper_arg);
			if($newspaper_query->have_posts()): while($newspaper_query->have_posts()): 
			$newspaper_query->the_post();
		?>
					<div class="col-md-6 newspaper-text-panel">
						<a href="<?php the_permalink(); ?>">
							<h4>
								<?php the_title(); ?>
							</h4>
							<p>
								<?php the_excerpt(); ?>	
							</p>
						</a>
						
					</div>
					
					<?php endwhile; endif; wp_reset_postdata(); ?>
					
				</div>
				
			</div>
		
		
		</div>
		
	</div>
	
</div>
<?php }?>