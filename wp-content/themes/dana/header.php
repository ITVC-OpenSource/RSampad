<?php global $themeoptions; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>

</head>
	<?php global $themeoptions; ?>
<body <?php body_class(); ?>>
<!--==================
<link href="assets/font/iranyekan/font.css" rel="stylesheet">
===== header ===========================-->
	<header>
		<?php require(get_template_directory() . '/inc/template/header/top-hader.php'); ?>
		<?php
			
				if($themeoptions['top-main-opt-header'] == 1)  
					require(get_template_directory() . '/inc/template/header/main-header.php'); 
				else
					require(get_template_directory() . '/inc/template/header/news-main-header.php');


		 ?>
		
		
		
		
		
		
		<?php require(get_template_directory() . '/inc/template/header/menu-header.php'); ?>
	</header>
<!--======================= End-header ===========================-->