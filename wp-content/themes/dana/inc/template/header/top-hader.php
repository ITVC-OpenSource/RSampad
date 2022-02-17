<!--======================= top-hader ===========================-->
<div class="container-fluid top-hader">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="top-hader-link col-lg-6">
					<?php if($themeoptions['top_menus-r-panel-status'] == 0) { ?>
						<?php wp_nav_menu(array('theme_location'=>'top_menus-r','menu_id'=>'menu-top-r','container'=>'')); ?>
					<?php }?>
				</div>
				<div class="res-link col-md-4 col-sm-4 col-12">
					<div class="res-link-header">
						<button class="hamburger">&#9776;</button>
						<button class="cross">&#735;</button>
					</div>
					<div class="res-link-panel">
						<?php if($themeoptions['top_menus-r-panel-status'] == 0) { ?>
							<?php wp_nav_menu(array('theme_location'=>'top_menus-r','menu_id'=>'menu-top-r','container'=>'')); ?>
						<?php }?>
					</div>
				</div>
				<div class="top-hader-lang col-lg-6 col-md-8 col-sm-8 col-12">
					
	<?php if($themeoptions['top_menus-l-panel-status'] == 0) { ?>				
<?php

	if($themeoptions['top-header-left-opt-header'] == 1)  
		require(get_template_directory() . '/inc/template/header/top-left-header/top-social-net.php'); 
	elseif($themeoptions['top-header-left-opt-header'] == 2)  
		require(get_template_directory() . '/inc/template/header/top-left-header/top_menus-l.php'); 
	else
		require(get_template_directory() . '/inc/template/header/top-left-header/top-header-left-date.php');


}?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--======================= end-top-hader ===========================-->