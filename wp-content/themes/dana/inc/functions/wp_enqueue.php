<?php 
/**
 * Proper way to enqueue scripts and styles.
 */
function theme_register_scripts() {
	global $themeoptions; 
	//**=====================================enqueue styles===================================*/
    wp_enqueue_style( 'bootstrap', get_bloginfo('template_url') . "/assets/css/bootstrap.min.css" );
    wp_enqueue_style( 'fontim.mins', get_bloginfo('template_url') . "/assets/css/fontim.mins.css" );
    wp_enqueue_style( 'fontim-codes', get_bloginfo('template_url') . "/assets/css/fontim-codes.css" );
    wp_enqueue_style( 'fontim-ie7', get_bloginfo('template_url') . "/assets/css/fontim-ie7.css" );
    wp_enqueue_style( 'owl.carousel', get_bloginfo('template_url') . "/assets/css/owl.carousel.min.css" );
    wp_enqueue_style( 'owl.theme.default', get_bloginfo('template_url') . "/assets/css/owl.theme.default.min.css" );
    wp_enqueue_style( 'style', get_stylesheet_uri(),null,'2.3' );
	switch($themeoptions['color-theme-opt']) {
		case 2:
			 wp_enqueue_style( 'style-red', get_bloginfo('template_url') . "/assets/css/style-red.css" );
			break;
		case 3:
			 wp_enqueue_style( 'style-green', get_bloginfo('template_url') . "/assets/css/style-green.css" );
			break;
		case 4:
			 wp_enqueue_style( 'style-yellow', get_bloginfo('template_url') . "/assets/css/style-yellow.css" );
			break;
		case 5:
			 wp_enqueue_style( 'style-purple', get_bloginfo('template_url') . "/assets/css/style-purple.css" );
			break;
		case 6:
			 wp_enqueue_style( 'style-black', get_bloginfo('template_url') . "/assets/css/style-black.css" );
			break;
	}
	switch($themeoptions['font-theme-opt']) {
		case 1:
			wp_enqueue_style( 'stylesheet', get_bloginfo('template_url') . "/assets/font/iranyekan/css/style.css" );
			break;
		case 2:
			wp_enqueue_style( 'stylesheet', get_bloginfo('template_url') . "/assets/font/iransans/font.css" );
			break;
		case 3:
			wp_enqueue_style( 'stylesheet', get_bloginfo('template_url') . "/assets/font/parastoo/font.css" );
			break;
		case 4:
			wp_enqueue_style( 'stylesheet', get_bloginfo('template_url') . "/assets/font/shabnam/font.css" );
			break;
		case 5:
			wp_enqueue_style( 'stylesheet', get_bloginfo('template_url') . "/assets/font/vazir/font.css" );
			break;
	}
	
	//**=====================================enqueue script===================================*/
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_bloginfo('template_url') . "/assets/js/jquery-2.1.1.js", array(), null, true);
	wp_enqueue_script( 'owl.carousel.min', get_bloginfo('template_url') . "/assets/js/owl.carousel.min.js", array('jquery'),null, true);
	
	
	wp_enqueue_script( 'slick.min', get_bloginfo('template_url') . "/assets/js/slick.min.js", array('jquery'),null, true);
	//wp_enqueue_script( 'azan', get_bloginfo('template_url') . "/assets/js/azan.js", array('jquery'),null, true);
	wp_enqueue_script( 'ammap', get_bloginfo('template_url') . "/assets/js/ammap.js", array('jquery'),null, true);
	wp_enqueue_script('falan', get_bloginfo('template_url').'/assets/js/fa.js', array('jquery'),null, true);
	wp_enqueue_script( 'jquery.newsTicker.min', get_bloginfo('template_url') . "/assets/js/jquery.newsTicker.min.js", array('jquery'),null, true);
	
	
	wp_enqueue_script( 'jssor.slider.min', get_bloginfo('template_url') . "/assets/js/jssor.slider.min.js", array('jquery'),null, true);
	
	wp_enqueue_script( 'script', get_bloginfo('template_url') . "/assets/js/script.js", array('jquery'),null, true);
}
add_action( 'wp_enqueue_scripts', 'theme_register_scripts' );