<?php
	global $themeoptions;

	$r_side_ac = $themeoptions['right-sidebar-panel-status'];
	$l_side_ac = $themeoptions['left-sidebar-panel-status'];
	$ads_side_ac = $themeoptions['tabligh-sidebar-panel-status'];
	
	if($r_side_ac ==0 && $l_side_ac==0 && $ads_side_ac==1){
		$home_content_class = 'col-lg-9 col-md-12';
	} elseif($r_side_ac == 1 && $l_side_ac==0 && $ads_side_ac==1){
		$home_content_class = 'col-lg-12';
	
	}elseif($r_side_ac == 1 && $l_side_ac==0 && $ads_side_ac==0){
		$home_content_class = 'col-lg-12';
	
	}elseif($r_side_ac == 1 && $l_side_ac==1 && $ads_side_ac==0){
		$home_content_class = 'col-lg-12';
	
	}elseif($r_side_ac == 0 && $l_side_ac==1 && $ads_side_ac==0){
		$home_content_class = 'col-lg-9';
	
	}elseif($r_side_ac == 0 && $l_side_ac==1 && $ads_side_ac==1){
		$home_content_class = 'col-lg-9';
	
	}elseif($r_side_ac == 1 && $l_side_ac==1 && $ads_side_ac==1){
		$home_content_class = 'col-lg-12';
	
	}else{
		$home_content_class = 'col-lg-9';
	}
?>
<!--===================  left-main =================================-->
<div class="left-main <?php echo $home_content_class; ?>">
	<?php require(get_template_directory() . '/inc/template/home/left-main/top-slider-panel.php'); ?>
	<div class="row">
		<?php require(get_template_directory() . '/inc/template/home/left-main/news.php'); ?>
		<?php if($themeoptions['left-sidebar-panel-status'] == 0) { ?>
			<?php require(get_template_directory() . '/inc/template/home/left-main/left-widget.php'); ?>
		<?php }?>
		
		<?php if($themeoptions['tabligh-sidebar-panel-status'] == 0) { ?>
			<?php require(get_template_directory() . '/inc/template/home/left-main/ads-panel.php'); ?>
		<?php }?>
	</div>
</div>
<!--===================  left-main =================================-->