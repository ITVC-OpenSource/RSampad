<!--===================  related-car =================================-->
<div class="related-car">
	<div class="related-car-header">
		<h4>مطالب مرتبط</h4>
	</div>
	<div class="related-car-panel owl-carousel owl-theme">
		<?php
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category)
					$category_ids[] = $individual_category->term_id;

				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 3, // Number of related posts that will be shown.
				);

			}
			$related = new WP_Query($args);

			if( $related->have_posts() ):
				while( $related->have_posts() ):
					$related->the_post(); 
			?>
		<div class="item">
			<a href="<?php the_permalink(); ?>">
				<div class="related-car-img">
					<?php the_post_thumbnail('relate-posts-img' ,array('alt' =>get_the_title()))?>
				</div>
				<div class="related-car-title">
					<h4>
						<?php the_title(); ?>
					</h4>
				</div>
			</a>
		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>
<!--===================  end-voice-car =================================-->
