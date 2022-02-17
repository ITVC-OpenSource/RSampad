<!--======================= end-menu-header ===========================-->
<div class="container-fluid menu-hader">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="menu-panel top-menu-sub-arrow col-lg-12">
					<?php wp_nav_menu(array('theme_location'=>'org_menus','menu_id'=>'menu-search','container'=>'')); ?>
					
					<div class="res-menu">
						<div class="responsive-menu-toggle">
							<button>
								<i class="fam-menu-2"></i>
							</button>
						</div>
					</div>
					<?php require(get_template_directory() . '/inc/template/header/search.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--======================= res-menu ===========================-->
<div class="responsive-menu">
	<span class="close-menu"><i class="fa fam-times-square-o "></i></span>
	<div class="menu-container">
		<?php wp_nav_menu(array('theme_location'=>'org_menus','menu_id'=>'resmenu','container'=>'')); ?>
		
	</div>				
</div>
<!--======================= End-res-menu ===========================-->
<!--======================= end-menu-header ===========================-->