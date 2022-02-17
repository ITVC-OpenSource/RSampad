<!--===================  slider =================================
< ?php if($slide) { ?>-->
<?php
	if($themeoptions['additional-slides-panel-status'] == 0) { 
		
		if($themeoptions['home-page-opt-slider'] == 1)  
			require(get_template_directory() . '/inc/template/slider/slider-one.php');
		elseif($themeoptions['home-page-opt-slider'] == 2)  
			require(get_template_directory() . '/inc/template/slider/slider-two.php');
		else
			require(get_template_directory() . '/inc/template/slider/slider-three.php');
	

 }?>

