<?php get_header(); ?>
<!--======================= main ===========================-->
	<main class="container">
		<div class="row">
<!--======================= single-content ===========================-->
			<div class="single-content col-lg-9 col-md-12">
				<?php require(get_template_directory() . '/inc/template/single/single-post-voice.php'); ?>
				<?php require(get_template_directory() . '/inc/template/single/single-comments.php'); ?>
			</div>
<!--======================= end-single-content ===========================-->

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
<!--======================= main ===========================-->

		</div>
	</main>
<!--======================= End-main ===========================-->
<?php get_footer(); ?>
