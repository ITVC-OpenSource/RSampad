<?php 
function state_ajax(){ 
	global $themeoptions;
	$state_id = explode("_",$_POST['state_id']);
	$state_id = $state_id[1];
	
	if($state_id != ''){
?>

	<div class="state-first-link">
		<?php
			$state_first_arg = array(
				'post_type' => 'post',
				'tax_query' => array(
					array(
						'taxonomy' => 'state_category',
						'field'    => 'term_id',
						'terms'    => $state_id,
					),
				),
				'posts_per_page' => 1
			);
			
			$state_first_query= new WP_Query($state_first_arg);
			if($state_first_query->have_posts()): while($state_first_query->have_posts()): $state_first_query->the_post();
		?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('img335-175', array('class'=>'img-responsive', 'alt'=>get_the_title())); ?>
				<div class="state-first-news-title">
					<h3><?php the_title(); ?></h3>
					<div class="time-pos">
										<span>
											<?php echo get_the_date(); ?> 
										</span>
									</div>
				</div>
			</a>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	<div class="state-news-list">
		<?php
			$state_second_arg = array(
				'post_type' => 'post',
				'tax_query' => array(
					array(
						'taxonomy' => 'state_category',
						'field'    => 'term_id',
						'terms'    => $state_id,
					),
				),
				'offset' => 1,
				'posts_per_page' => $themeoptions['home-state-count']
			);
			
			$state_second_query= new WP_Query($state_second_arg);
			if($state_second_query->have_posts()): while($state_second_query->have_posts()): $state_second_query->the_post();
		?>
			<section class="state-post">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('img85-65',array('alt'=>get_the_title())); ?>
					<h3><?php the_title(); ?></h3>
				</a>
			</section>
		<?php endwhile; else: ?> 
			<p>خبر دیگری جهت نمایش وجود ندارد.</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
<?php } else {
?>
	<p>خبری جهت نمایش وجود ندارد.</p>
<?php
	}
	exit();
}

add_action('wp_ajax_nopriv_state_ajax', 'state_ajax'); 
add_action('wp_ajax_state_ajax', 'state_ajax');
?>