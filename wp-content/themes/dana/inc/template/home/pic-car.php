<!--===================  pic-car =================================-->
<?php if($themeoptions['pic-car-panel-status'] == 0) { ?>
<div class="pic-car col-lg-6">
	
	<div class="pic-car-header panel-title-back">
		<i class="fa fam-picture  " aria-hidden="true"></i>
		<h4><?php echo $themeoptions['pic-panel-title-slider'] ?></h4>
	</div>
	<div class="pic-car-top">
		<?php 
			$arg = array(
				'post_type' => 'photo',
				'posts_per_page' => 1,
			);
			
			$slide_query = new WP_Query($arg);
			if($slide_query->have_posts()): while($slide_query->have_posts()): $slide_query->the_post();
		?>	
		<a href="<?php the_permalink(); ?>">
			<div class="pic-car-top-text">
				<h4>
						<?php the_title(); ?>
					</h4>
			</div>
			<?php the_post_thumbnail('header-car' ,array('class' =>'img-fluid' ,'alt' =>get_the_title()))?>
		</a>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	
	<div class="pic-car-panel content-back owl-carousel owl-theme">
		
		
		<?php 
			$photo_content = 0;
		
			if($photo_content == 0){
				$photo_arg = array(
					'post_type' => 'photo',
					'offset' => 1,
					'posts_per_page' => $themeoptions['pic-panel-count-num']
					
				);
			} else if($photo_content == 1) {
				$photo_arg = array(
					'post_type' => 'photo',
					'meta_key' => 'views', 
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'posts_per_page' => $themeoptions['pic-panel-count-num']
				);
			} else if($photo_content == 2) {
				$photo_arg = array(
					'post_type' => 'photo',
					'orderby'  => 'rand',
					'posts_per_page' => $themeoptions['pic-panel-count-num']
				);
			} else if($photo_content == 3) {
				$photo_arg = array(
					'post_type' => 'photo',
					'tax_query' => array(
						array(
							'taxonomy' => 'photo_category',
							'field'    => 'term_id',
							
						),
					),
					'posts_per_page' => $themeoptions['pic-panel-count-num']
				);
			}

			$photo_query = new WP_Query($photo_arg);
			if($photo_query->have_posts()): while($photo_query->have_posts()): $photo_query->the_post();
		?>
		
		
		<div class="item">
			<a href="<?php the_permalink(); ?>">
				<div class="pic-car-img">
					<?php the_post_thumbnail('pic-car', array('alt'=>get_the_title())); ?>
				</div>
				<div class="pic-car-title">
					<h4>
						<?php 
								if (strlen($post->post_title) >= 50) {
									echo $short_title=mb_substr(the_title('','',FALSE),0,50) . '...';
								} else {
									the_title();
								} 
							?>
					</h4>
				</div>
			</a>
			
		</div>
		
		
		<?php endwhile; endif; wp_reset_postdata(); ?>
		
	</div>
</div>
<?php }?>
<!--===================  end-pic-car =================================-->