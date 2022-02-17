<?php get_header(); ?>
	<main class="container">
		<div class="row">
			<div class="full-page col-lg-9 col-md-12">
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
			<div class="left-widget col-lg-3 col-md-12">
						<div class="row">
						<?php require(get_template_directory() . '/inc/template/home/left-main/vip-widget.php'); ?>

<!--=================== car-widget-arshive  =================================-->
							<div class="left-widget-panel col-lg-12 col-md-6 col-sm-6 col-xs-6">
								<?php dynamic_sidebar('سایدبار چپ'); ?>
							</div>
<!--=================== car-widget-arshive   =================================-->
						</div>
					</div>
		</div>
	</main>
<?php get_footer(); ?>