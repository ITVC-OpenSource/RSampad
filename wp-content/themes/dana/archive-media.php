<?php get_header(); ?>
<!--======================= main ===========================-->
<main class="container " style="min-height: 360px;">
	<div class="row">
<!--===================  left-main =================================-->
<?php require(get_template_directory() . '/inc/template/gallery/top-video-slider.php'); ?>
	</div>
	<?php require(get_template_directory() . '/inc/template/gallery/gallery-post-vid-panel.php'); ?>
	<div class="number-page">
		<?php pro_pagination(); ?>
	</div>
</main>
<!--======================= End-main ===========================-->
<?php get_footer(); ?>