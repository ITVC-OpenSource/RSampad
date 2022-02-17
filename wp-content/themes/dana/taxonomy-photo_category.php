<?php get_header(); ?>
<!--======================= main ===========================-->
	<main class="container" style="min-height: 360px;">
		
<!--===================  left-main =================================-->
			<!--start-->
   <?php require(get_template_directory() . '/inc/template/gallery/top-photo-slider.php'); ?>
	<div class="row">
    <!--end-->
		</div>
		<?php require(get_template_directory() . '/inc/template/gallery/gallery-post-pic-panel.php'); ?>
		<div class="number-page">
			<?php pro_pagination(); ?>
		</div>
	</main>
<!--======================= End-main ===========================-->
<?php get_footer(); ?>