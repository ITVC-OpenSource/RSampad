<!--===================  voice-car =================================-->
<?php if($themeoptions['voice-car-panel-status'] == 0) { ?>

<div class="voice-car col-lg-12">
	<div class="voice-car-header panel-title-back">
		 <i class="fa fam-microphone" aria-hidden="true"></i>
		<h4><?php echo $themeoptions['voice-panel-title-slider'] ?></h4>
	</div>
	<div class="voice-car-panel content-back owl-carousel owl-theme">
		<?php
		    $voice_content = 0;
			if($voice_content == 0) {
				$voice_arg = array(
					'post_type' => 'voice',
					'posts_per_page' => $themeoptions['voice-panel-count-num']
				);
			} else if($voice_content == 1) {
				$voice_arg = array(
					'post_type' => 'voice',
					'meta_key' => 'views', 
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'posts_per_page' => $themeoptions['voice-panel-count-num']
				);
			} else if($voice_content == 2) {
				$voice_arg = array(
					'post_type' => 'voice',
					'tax_query' => array(
						array(
							'taxonomy' => 'voice_category',
							'field'    => 'term_id',
							
						),
					),
					'posts_per_page' => $themeoptions['voice-panel-count-num']
				);
			}

			$voice_query = new WP_Query($voice_arg);
			if($voice_query->have_posts()): while($voice_query->have_posts()): 
			$voice_query->the_post();
		?>
		
		<div class="item">
			<a href="<?php the_permalink(); ?>">
				<div class="voice-car-img">
					<?php the_post_thumbnail('voice-car',array('alt'=>get_the_title())); ?>
				</div>
				<div class="voice-car-title">
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
<!--===================  end-voice-car =================================-->