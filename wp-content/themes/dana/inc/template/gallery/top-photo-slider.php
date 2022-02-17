<?php
	if($themeoptions['photo-slides-panel-status'] == 0) { 
		if($themeoptions['pic-page-opt-slider'] == 1)  
			require(get_template_directory() . '/inc/template/slider/slider-one.php'); 
		elseif($themeoptions['pic-page-opt-slider'] == 2)  
			require(get_template_directory() . '/inc/template/slider/slider-two.php');
		else
			require(get_template_directory() . '/inc/template/slider/slider-three.php');
	

 }?>