

<?php
	if($themeoptions['video-slides-panel-status'] == 0) { 
		if($themeoptions['vid-page-opt-slider'] == 1)  
			require(get_template_directory() . '/inc/template/slider/slider-one.php');
		elseif($themeoptions['vid-page-opt-slider'] == 2)  
			require(get_template_directory() . '/inc/template/slider/slider-two.php');
		else
			require(get_template_directory() . '/inc/template/slider/slider-three.php');
	

 }?>