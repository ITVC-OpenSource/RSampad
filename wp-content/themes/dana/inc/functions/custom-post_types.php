<?php
 // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'برچسب های فیلم', 'aryanews' ),
        'singular_name'     => __( 'برچسب ها', 'aryanews' ),
        'search_items'      => __( 'نوع جستجو' ),
        'all_items'         => __( 'همه برچسب ها' ),
        'parent_item'       => __( 'برچسب های مادر' ),
        'parent_item_colon' => __( 'برچسب های مادر:' ),
        'edit_item'         => __( 'ویرایش برچسب' ),
        'update_item'       => __( 'به روز رسانی برچسب' ),
        'add_new_item'      => __( 'افزودن تگ جدید' ),
        'new_item_name'     => __( 'عنوان تگ جدید' ),
        'menu_name'         => __( 'برچسب ها' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'Tags' ),
    );

    register_taxonomy( 'media_tags', array( 'Tags' ), $args );

// Register Custom Post Type
function pro_custom_post_type() {

	$labels = array(
		'name'                => __( 'فیلم', 'Post Type General Name', 'aryanews' ),
		'singular_name'       => __( 'media', 'Post Type Singular Name', 'aryanews' ),
		'menu_name'           => __( 'فیلم', 'aryanews' ),
		'name_admin_bar'      => __( 'فیلم', 'aryanews' ),
		'parent_item_colon'   => __( 'گزینه مادر', 'aryanews' ),
		'all_items'           => __( 'فیلم', 'aryanews' ),
		'add_new_item'        => __( 'افزودن مورد جدید', 'aryanews' ),
		'add_new'             => __( 'افزودن جدید', 'aryanews' ),
		'new_item'            => __( 'گزینه جدید', 'aryanews' ),
		'edit_item'           => __( 'ویرایش', 'aryanews' ),
		'update_item'         => __( 'به روز رسانی', 'aryanews' ),
		'view_item'           => __( 'نمایش', 'aryanews' ),
		'search_items'        => __( 'جستجو', 'aryanews' ),
		'not_found'           => __( 'چیزی پیدا نشد', 'aryanews' ),
		'not_found_in_trash'  => __( 'موردی در سطل زباله پیدا نشد', 'aryanews' ),
	);
	$args = array(
		'label'               => __( 'media', 'aryanews' ),
		'description'         => __( 'فیلم', 'aryanews' ),
		'labels'              => $labels,
'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'taxonomies'          => array('media_tags'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-format-video',
	);
	register_post_type( 'media', $args );
}

function my_taxonomies_media() {
    $labels = array(
        'name'              => __( 'دسته بندی فیلم', 'aryanews' ),
        'singular_name'     => __( 'دسته بندی فیلم', 'aryanews' ),
        'search_items'      => __( 'جست و جوی دسته بندی' ),
        'all_items'         => __( 'همه دسته بندی ها' ),
        'parent_item'       => __( 'دسته بندی جاری' ),
        'parent_item_colon' => __( 'دسته بندی جاری:' ),
        'edit_item'         => __( 'ویرایش دسته بندی' ), 
        'update_item'       => __( 'تغییر دسته بندی' ),
        'add_new_item'      => __( 'افزودن دسته بندی جدید' ),
        'new_item_name'     => __( 'دسته بندی جدید' ),
        'menu_name'         => __( 'دسته ها' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
		
    );
    register_taxonomy( 'media_category', 'media', $args );
}
add_action( 'init', 'my_taxonomies_media', 0 );
add_action( 'init', 'pro_custom_post_type', 0 );




 // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'برچسب های عکس', 'aryanews' ),
        'singular_name'     => __( 'برچسب ها', 'aryanews' ),
        'search_items'      => __( 'نوع جستجو' ),
        'all_items'         => __( 'همه برچسب ها' ),
        'parent_item'       => __( 'برچسب های مادر' ),
        'parent_item_colon' => __( 'برچسب های مادر:' ),
        'edit_item'         => __( 'ویرایش برچسب' ),
        'update_item'       => __( 'به روز رسانی برچسب' ),
        'add_new_item'      => __( 'افزودن تگ جدید' ),
        'new_item_name'     => __( 'عنوان تگ جدید' ),
        'menu_name'         => __( 'برچسب ها' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'Tags' ),
    );

    register_taxonomy( 'photo_tags', array( 'Tags' ), $args );

// Register Custom Post Type
function pro_photo_post_type() {

	$labels = array(
		'name'                => __( 'عکس', 'Post Type General Name', 'aryanews' ),
		'singular_name'       => __( 'photo', 'Post Type Singular Name', 'aryanews' ),
		'menu_name'           => __( 'عکس', 'aryanews' ),
		'name_admin_bar'      => __( 'عکس', 'aryanews' ),
		'parent_item_colon'   => __( 'گزینه مادر', 'aryanews' ),
		'all_items'           => __( 'عکس', 'aryanews' ),
		'add_new_item'        => __( 'افزودن مورد جدید', 'aryanews' ),
		'add_new'             => __( 'افزودن جدید', 'aryanews' ),
		'new_item'            => __( 'گزینه جدید', 'aryanews' ),
		'edit_item'           => __( 'ویرایش', 'aryanews' ),
		'update_item'         => __( 'به روز رسانی', 'aryanews' ),
		'view_item'           => __( 'نمایش', 'aryanews' ),
		'search_items'        => __( 'جستجو', 'aryanews' ),
		'not_found'           => __( 'چیزی پیدا نشد', 'aryanews' ),
		'not_found_in_trash'  => __( 'موردی در سطل زباله پیدا نشد', 'aryanews' ),
	);
	$args = array(
		'label'               => __( 'photo', 'aryanews' ),
		'description'         => __( 'عکس', 'aryanews' ),
		'labels'              => $labels,
'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'taxonomies'          => array('photo_tags'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-format-image',
	);
	register_post_type( 'photo', $args );
}

function my_taxonomies_photo() {
    $labels = array(
        'name'              => __( 'دسته بندی عکس', 'aryanews' ),
        'singular_name'     => __( 'دسته بندی عکس', 'aryanews' ),
        'search_items'      => __( 'جست و جوی دسته بندی' ),
        'all_items'         => __( 'همه دسته بندی ها' ),
        'parent_item'       => __( 'دسته بندی جاری' ),
        'parent_item_colon' => __( 'دسته بندی جاری:' ),
        'edit_item'         => __( 'ویرایش دسته بندی' ), 
        'update_item'       => __( 'تغییر دسته بندی' ),
        'add_new_item'      => __( 'افزودن دسته بندی جدید' ),
        'new_item_name'     => __( 'دسته بندی جدید' ),
        'menu_name'         => __( 'دسته ها' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
		
    );
    register_taxonomy( 'photo_category', 'photo', $args );
}
add_action( 'init', 'my_taxonomies_photo', 0 );
add_action( 'init', 'pro_photo_post_type', 0 );


function my_taxonomies_state() {
    $labels = array(
        'name'              => __( 'استان ها', 'aryanews' ),
        'singular_name'     => __( 'دسته بندی استان ها', 'aryanews' ),
        'search_items'      => __( 'جست و جوی استان' ),
        'all_items'         => __( 'همه استان ها' ),
        'parent_item'       => __( 'استان جاری' ),
        'parent_item_colon' => __( 'استان جاری:' ),
        'edit_item'         => __( 'ویرایش استان' ), 
        'update_item'       => __( 'تغییر استان' ),
        'add_new_item'      => __( 'افزودن استان جدید' ),
        'new_item_name'     => __( 'استان جدید' ),
        'menu_name'         => __( 'استان ها' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
		
    );
    register_taxonomy( 'state_category', 'post', $args );
}
add_action( 'init', 'my_taxonomies_state', 0 );

// Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'برچسب های روزنامه ها', 'aryanews' ),
        'singular_name'     => __( 'برچسب ها', 'aryanews' ),
        'search_items'      => __( 'نوع جستجو' ),
        'all_items'         => __( 'همه برچسب ها' ),
        'parent_item'       => __( 'برچسب های مادر' ),
        'parent_item_colon' => __( 'برچسب های مادر:' ),
        'edit_item'         => __( 'ویرایش برچسب' ),
        'update_item'       => __( 'به روز رسانی برچسب' ),
        'add_new_item'      => __( 'افزودن تگ جدید' ),
        'new_item_name'     => __( 'عنوان تگ جدید' ),
        'menu_name'         => __( 'برچسب ها' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'Tags' ),
    );

    register_taxonomy( 'newspaper_tags', array( 'Tags' ), $args );

// Register Custom Post Type
function pro_newspaper_post_type() {

	$labels = array(
		'name'                => __( 'روزنامه ها', 'Post Type General Name', 'aryanews' ),
		'singular_name'       => __( 'newspaper', 'Post Type Singular Name', 'aryanews' ),
		'menu_name'           => __( 'روزنامه ها', 'aryanews' ),
		'name_admin_bar'      => __( 'روزنامه ها', 'aryanews' ),
		'parent_item_colon'   => __( 'گزینه مادر', 'aryanews' ),
		'all_items'           => __( 'روزنامه ها', 'aryanews' ),
		'add_new_item'        => __( 'افزودن مورد جدید', 'aryanews' ),
		'add_new'             => __( 'افزودن جدید', 'aryanews' ),
		'new_item'            => __( 'گزینه جدید', 'aryanews' ),
		'edit_item'           => __( 'ویرایش', 'aryanews' ),
		'update_item'         => __( 'به روز رسانی', 'aryanews' ),
		'view_item'           => __( 'نمایش', 'aryanews' ),
		'search_items'        => __( 'جستجو', 'aryanews' ),
		'not_found'           => __( 'چیزی پیدا نشد', 'aryanews' ),
		'not_found_in_trash'  => __( 'موردی در سطل زباله پیدا نشد', 'aryanews' ),
	);
	$args = array(
		'label'               => __( 'newspaper', 'aryanews' ),
		'description'         => __( 'روزنامه ها', 'aryanews' ),
		'labels'              => $labels,
'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'taxonomies'          => array('newspaper_tags'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-format-aside',
	);
	register_post_type( 'newspaper', $args );
}

function pro_newspaper_taxonomies() {
    $labels = array(
        'name'              => __( 'دسته بندی روزنامه', 'aryanews' ),
        'singular_name'     => __( 'دسته بندی روزنامه', 'aryanews' ),
        'search_items'      => __( 'جست و جوی دسته بندی' ),
        'all_items'         => __( 'همه دسته بندی ها' ),
        'parent_item'       => __( 'دسته بندی جاری' ),
        'parent_item_colon' => __( 'دسته بندی جاری:' ),
        'edit_item'         => __( 'ویرایش دسته بندی' ), 
        'update_item'       => __( 'تغییر دسته بندی' ),
        'add_new_item'      => __( 'افزودن دسته بندی جدید' ),
        'new_item_name'     => __( 'دسته بندی جدید' ),
        'menu_name'         => __( 'دسته ها' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
		
    );
    register_taxonomy( 'newspaper_category', 'newspaper', $args );
}
add_action( 'init', 'pro_newspaper_taxonomies', 0 );
add_action( 'init', 'pro_newspaper_post_type', 0 );
// Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'برچسب های سخنرانی ها', 'aryanews' ),
        'singular_name'     => __( 'برچسب ها', 'aryanews' ),
        'search_items'      => __( 'نوع جستجو' ),
        'all_items'         => __( 'همه برچسب ها' ),
        'parent_item'       => __( 'برچسب های مادر' ),
        'parent_item_colon' => __( 'برچسب های مادر:' ),
        'edit_item'         => __( 'ویرایش برچسب' ),
        'update_item'       => __( 'به روز رسانی برچسب' ),
        'add_new_item'      => __( 'افزودن تگ جدید' ),
        'new_item_name'     => __( 'عنوان تگ جدید' ),
        'menu_name'         => __( 'برچسب ها' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'Tags' ),
    );

    register_taxonomy( 'voice_tags', array( 'Tags' ), $args );

// Register Custom Post Type
function pro_voice_post_type() {

	$labels = array(
		'name'                => __( 'سخنرانی ها', 'Post Type General Name', 'aryanews' ),
		'singular_name'       => __( 'voice', 'Post Type Singular Name', 'aryanews' ),
		'menu_name'           => __( 'سخنرانی ها', 'aryanews' ),
		'name_admin_bar'      => __( 'سخنرانی ها', 'aryanews' ),
		'parent_item_colon'   => __( 'گزینه مادر', 'aryanews' ),
		'all_items'           => __( 'سخنرانی ها', 'aryanews' ),
		'add_new_item'        => __( 'افزودن مورد جدید', 'aryanews' ),
		'add_new'             => __( 'افزودن جدید', 'aryanews' ),
		'new_item'            => __( 'گزینه جدید', 'aryanews' ),
		'edit_item'           => __( 'ویرایش', 'aryanews' ),
		'update_item'         => __( 'به روز رسانی', 'aryanews' ),
		'view_item'           => __( 'نمایش', 'aryanews' ),
		'search_items'        => __( 'جستجو', 'aryanews' ),
		'not_found'           => __( 'چیزی پیدا نشد', 'aryanews' ),
		'not_found_in_trash'  => __( 'موردی در سطل زباله پیدا نشد', 'aryanews' ),
	);
	$args = array(
		'label'               => __( 'voice', 'aryanews' ),
		'description'         => __( 'سخنرانی ها', 'aryanews' ),
		'labels'              => $labels,
'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'taxonomies'          => array('voice_tags'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-format-aside',
	);
	register_post_type( 'voice', $args );
}

function pro_voice_taxonomies() {
    $labels = array(
        'name'              => __( 'دسته بندی سخنرانی', 'aryanews' ),
        'singular_name'     => __( 'دسته بندی سخنرانی', 'aryanews' ),
        'search_items'      => __( 'جست و جوی دسته بندی' ),
        'all_items'         => __( 'همه دسته بندی ها' ),
        'parent_item'       => __( 'دسته بندی جاری' ),
        'parent_item_colon' => __( 'دسته بندی جاری:' ),
        'edit_item'         => __( 'ویرایش دسته بندی' ), 
        'update_item'       => __( 'تغییر دسته بندی' ),
        'add_new_item'      => __( 'افزودن دسته بندی جدید' ),
        'new_item_name'     => __( 'دسته بندی جدید' ),
        'menu_name'         => __( 'دسته ها' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
		
    );
    register_taxonomy( 'voice_category', 'voice', $args );
}
add_action( 'init', 'pro_voice_taxonomies', 0 );
add_action( 'init', 'pro_voice_post_type', 0 );
?>