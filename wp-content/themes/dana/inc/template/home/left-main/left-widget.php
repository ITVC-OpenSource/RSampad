<?php
	global $themeoptions;

	$r_side_ac = $themeoptions['right-sidebar-panel-status'];
	$l_side_ac = $themeoptions['left-sidebar-panel-status'];
	$ads_side_ac = $themeoptions['tabligh-sidebar-panel-status'];
	
	if($r_side_ac ==0 && $l_side_ac==0 && $ads_side_ac==1){
		$home_content_widget = 'col-lg-4 col-md-12';
	} elseif($r_side_ac == 1 && $l_side_ac==0 && $ads_side_ac==1){
		$home_content_widget = 'col-lg-3';
	
	}elseif($r_side_ac == 1 && $l_side_ac==0 && $ads_side_ac==0){
		$home_content_widget = 'col-lg-3';
	
	}//elseif($r_side_ac == 1 && $l_side_ac==1 && $ads_side_ac==0){
		//$home_content_widget = 'col-lg-9';
	
	//}elseif($r_side_ac == 0 && $l_side_ac==1 && $ads_side_ac==0){
		//$home_content_widget = 'col-lg-9';
	
	//}elseif($r_side_ac == 0 && $l_side_ac==1 && $ads_side_ac==1){
		//$home_content_widget = 'col-lg-9';
	
	//}elseif($r_side_ac == 1 && $l_side_ac==1 && $ads_side_ac==1){
		//$home_content_widget = 'col-lg-9';
	
	//}
else{
		$home_content_widget = 'col-lg-9';
	}
?>
<!--=================== widget-news  =================================-->
<div class="left-widget <?php echo $home_content_widget; ?>">
	<div class="row">
		<?php require(get_template_directory() . '/inc/template/home/left-main/vip-widget.php'); ?>
		
<!--=================== car-widget-arshive  =================================-->
		<div class="left-widget-panel col-lg-12 col-md-6 col-sm-6 ">
			<?php dynamic_sidebar('سایدبار چپ'); ?>
			
		</div>

<!--=================== car-widget-arshive   =================================-->
	</div>
</div>