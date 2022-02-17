<!--===================  related-car =================================-->
<div class="related-car">
	<div class="related-car-header">
		<h4>مطالب مرتبط</h4>
	</div>
	<div class="related-car-panel owl-carousel owl-theme">
		<?php
			global $post;
			$categories = get_the_terms($post->ID,'newspaper_category');
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category)
					$category_ids[] = $individual_category->term_id;
			}

			$args = array(
					'post__not_in' => array($post->ID),
					'post_type' => 'newspaper',
					'tax_query' => array(
						array(
							'taxonomy' => 'newspaper_category',
							'field'    => 'term_id',
							'terms'    => 'bob',
						),
						array(
							'taxonomy' => 'newspaper_category',
							'field'    => 'term_id',
							'terms'    => $category_ids,
							'operator' => 'IN',
						)
					),
				);
				$related = new WP_Query( $args );
				
				
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