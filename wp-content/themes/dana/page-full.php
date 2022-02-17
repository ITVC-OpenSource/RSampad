<?php /* Template Name: تمام صفحه */ get_header(); ?>
	<main class="container">
		<div class="row">
			<div class="full-page col-lg-12">
				<div class="single-post-container">
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="single-title header-widget panel-title-back">
						<h4><?php the_title(); ?></h4>
					</div>

					<div class="single-post-content single-post-opt-text">
						<?php the_content(); ?>
					</div>
					<?php 
						
						endwhile; endif;
					?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>