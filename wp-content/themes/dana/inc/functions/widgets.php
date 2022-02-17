<?php
function wz_theme_setup() {
if ( function_exists('register_sidebar') )
register_sidebar( array (
'id'=>'sidebar-1',
'name'=> 'سایدبار راست',
'before_widget' => '<section id="%1$s" class=" car-widget-1 %2$s">',
'after_widget' => '</footer></section>',
'before_title' => ' <header class="widgets-header panel-title-back"><h4><span>',
'after_title' => '</span></h4></header><footer class="widgets-footer content-back">'
));

if ( function_exists('register_sidebar') )
register_sidebar( array (
'id'=>'sidebar-2',
'name'=> 'سایدبار چپ',
'before_widget' => '<section id="%1$s" class=" car-widget-1 %2$s">',
'after_widget' => '</footer></section>',
'before_title' => ' <header class="widgets-header panel-title-back"><h4>',
'after_title' => '</h4></header><footer class="widgets-footer content-back">'
));

if ( function_exists('register_sidebar') )
register_sidebar( array (
'id'=>'sidebar-3',
'name'=> 'سایدبار سربرگ',
'before_widget' => '<section id="%1$s" class="lmenu-p ads-panel header-widget-left col-lg-3  hidden-sm hidden-xs %2$s">',
'after_widget' => '</footer></section>',
'before_title' => ' <header ><h4 class="panel-title-back"><span>',
'after_title' => '</span></h4></header><footer class="top-bottom-widget">'
));

if ( function_exists('register_sidebar') )
register_sidebar( array (
'id'=>'sidebar-4',
'name'=> 'سایدبار تبلیغات',
'before_widget' => '<section id="%1$s" class="lmenu-p ads-panel  %2$s">',
'after_widget' => '</footer></section>',
'before_title' => ' <header><h4><span>',
'after_title' => '</span></h4></header><footer class="ads-banner-img">'
));
}
add_action( 'after_setup_theme', 'wz_theme_setup' );