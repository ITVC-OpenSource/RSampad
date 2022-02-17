<?php get_header(); global $themeoptions;?>
<!--======================= main ===========================-->
	<main class="container-fluid">
		
		<?php if($themeoptions['color-theme-opt'] == 6) { ?>
			<div class="ads">
				<img src="<?php echo $themeoptions['main-left-right-pic']['url'] ?>" class="img-fluid" />
			</div>
			<div class="ads">
				<img src="<?php echo $themeoptions['main-left-right-pic']['url'] ?>" class="img-fluid" />
			</div>
		<?php } ?>
		<div class="container">
			<div class="row">
				<?php require(get_template_directory() . '/inc/template/home/shoar.php'); ?>
				<?php require(get_template_directory() . '/inc/template/home/right-main.php'); ?>
				<?php require(get_template_directory() . '/inc/template/home/left-main.php'); ?>
				<?php require(get_template_directory() . '/inc/template/home/voice-car.php'); ?>
				<?php require(get_template_directory() . '/inc/template/home/newspaper.php'); ?>
				<?php require(get_template_directory() . '/inc/template/home/pic-car.php'); ?>
				<?php require(get_template_directory() . '/inc/template/home/vid-car.php');
					require(get_template_directory() . '/inc/template/home/state.php'); 
				?>

			</div>
		</div>
	</main>
<!--======================= End-main ===========================-->
<?php get_footer(); ?>
