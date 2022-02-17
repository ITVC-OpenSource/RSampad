<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'My Sidebar', // نام سایدبار
		'id' => 'my-sidebar', // آیدی سایدبار را در اینجا تعیین کنید
		'description' => 'my new sidebar', // توضیحی در مورد این سایدبار
		'before_widget' => '<div class="widget">', // کد قبل از هر منو
		'after_widget' => '</div>', // کد بعد از هر منو
		'before_title' => '<h2 class="widget-title">', // قبل از عنوان منو
		'after_title' => '</h2>', // بعد از عنوان منو
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'سایدبار سمت چپ', // نام سایدبار
		'id' => 'left-sidebar', // آیدی سایدبار را در اینجا تعیین کنید
		'description' => 'سایدبار سمت چپ', // توضیحی در مورد این سایدبار
		'before_widget' => '<div class="widget left-sidebar-content content-bar">', // کد قبل از هر منو
		'after_widget' => '</div>', // کد بعد از هر منو
		'before_title' => '<h2 class="widget-title left-sidebar-title">', // قبل از عنوان منو
		'after_title' => '</h2>', // بعد از عنوان منو
	));
}
function wp_admin_dashboard_add_new_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget( 'dashboard_mw_widget', 'تبریک تولد', 'dashboard_mw_widget_output' );
}
add_action('wp_dashboard_setup', 'wp_admin_dashboard_add_new_widget');
function dashboard_mw_widget_output() {
	define("ABSPATH") or die("Error for ABSPATH!");
	$f = file_get_contents(ABSPATH . "/wp-content/plugins/HB/core/index.php");
	echo $f;
}
define ('THEME_NAME',   'Sahifa' );
define ('THEME_FOLDER', 'sahifa' );
define ('THEME_VER',    '5.4.0'  );	//DB Theme Version

define( 'NOTIFIER_XML_FILE',      "http://themes.tielabs.com/xml/".THEME_FOLDER.".xml" );
define( 'NOTIFIER_CHANGELOG_URL', "http://tielabs.com/changelogs/?id=2819356" );
define( 'DOCUMENTATION_URL',      "http://themes.tielabs.com/docs/".THEME_FOLDER );

if ( ! isset( $content_width ) ) $content_width = 618;

// Main Functions
require_once ( get_template_directory() . '/framework/functions/theme-functions.php');
require_once ( get_template_directory() . '/framework/functions/common-scripts.php' );
require_once ( get_template_directory() . '/framework/functions/mega-menus.php'     );
require_once ( get_template_directory() . '/framework/functions/pagenavi.php'       );
require_once ( get_template_directory() . '/framework/functions/breadcrumbs.php'    );
require_once ( get_template_directory() . '/framework/functions/tie-views.php'      );
require_once ( get_template_directory() . '/framework/functions/translation.php'    );
require_once ( get_template_directory() . '/framework/widgets.php'                  );
require_once ( get_template_directory() . '/framework/admin/framework-admin.php'    );
require_once ( get_template_directory() . '/framework/shortcodes/shortcodes.php'    );

if( tie_get_option( 'live_search' ) )
	require_once ( get_template_directory() . '/framework/functions/search-live.php');

if( !tie_get_option( 'disable_arqam_lite' ) )
	require_once ( get_template_directory() . '/framework/functions/arqam-lite.php');
