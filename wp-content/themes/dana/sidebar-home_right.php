<?php 
	global $arya_options;
	$ads_side_ac = $arya_options['home-ads-status'];
	if($ads_side_ac ==1){
		$aside_class = 'col-md-3 col-sm-3 col-xs-12';
	} else {
		$aside_class = 'col-md-4 col-sm-4 col-xs-12';
	}
?>
<aside class="r-sidebar <?php echo $aside_class; ?> hidden-xs">
	<?php dynamic_sidebar('سایدبار راست'); ?>

</aside>