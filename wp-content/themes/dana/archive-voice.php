<?php
	global $themeoptions;
	$l_side_ac = $themeoptions['left-sidebar-panel-status'];
	$ads_side_ac = $themeoptions['tabligh-sidebar-panel-status'];
	
	if($l_side_ac==0 && $ads_side_ac==0){
		$cat_content_class = 'col-lg-7 col-md-12';
	} elseif($l_side_ac==0 && $ads_side_ac==1){
		$cat_content_class = 'col-lg-9';
	
	}elseif($l_side_ac==1 && $ads_side_ac==0){
		$cat_content_class = 'col-lg-10';
	
	}else{
		$cat_content_class = 'col-lg-12';
	}
?>
<?php get_header(); ?>
<main class="container">
	<div class="row">
<!--===================  arshive-main =================================-->
		
<!--=================== news  =================================-->
		<div class="news <?php echo $cat_content_class; ?>">
			<div class="header-news">
				<h2><?php echo $themeoptions['voice-panel-title-slider'] ?></h2>
			</div>
			<?php require(get_template_directory() . '/inc/template/archive/content.php'); ?>

		</div>
<!--=================== end-news  =================================-->
<!--=================== widget-news  =================================-->
		<?php if($themeoptions['left-sidebar-panel-status'] == 0) { ?>
		<div class="left-widget col-lg-3">
			<div class="row">
				<?php require(get_template_directory() . '/inc/template/home/left-main/vip-widget.php'); ?>

		<!--=================== car-widget-arshive  =================================-->
				<div class="left-widget-panel col-lg-12 col-md-6 col-sm-6 ">
					<?php dynamic_sidebar('سایدبار چپ'); ?>

				</div>

		<!--=================== car-widget-arshive   =================================-->

			</div>
		</div>
		<?php } ?>
			
		
			<?php if($themeoptions['tabligh-sidebar-panel-status'] == 0) { ?>
				<?php require(get_template_directory() . '/inc/template/home/left-main/ads-panel.php'); ?>
			<?php }?>
		
	</div>
</main>
<!--======================= End-main ===========================-->

<?php get_footer(); ?>