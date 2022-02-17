<div class="row">
	<?php
	if(have_posts()) : while(have_posts()) : the_post();
	?>
	<div class="col-lg-4 col-md-6 col-sm-12">
		<div class="pic-page-post">
			<?php the_post_thumbnail('post-video' ,array('alt' =>get_the_title()))?>
			<div class="pic-page-post-text">
				<h2>
					<?php the_title(); ?>
				</h2>
				<span>
					<?php echo get_the_date(); ?> 
				</span>
				<p>
					<?php the_excerpt(); ?>
				</p>
				<a href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>
	
