<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "themeoptions";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'themeoptions/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    
    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'تنظیمات قالب', 'redux-framework-demo' ),
        'page_title'           => __( 'theme-options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => false,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p></p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */
    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'صفحه اصلی', 'redux-framework-demo' ),
        'id'               => 'home-options',
        'icon'             => 'el el-home'
    ) );

	Redux::setSection( $opt_name, array(
        'title'            => __( 'سربرگ بالا', 'redux-framework-demo' ),
        'id'               => 'top-header-options',
        'subsection'       => true,
        'fields'           => array(
			array(
				'id'       => 'top_menus-r-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت منو راست', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			array(
				'id'       => 'top_menus-l-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'سربرگ چپ بالا', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			
			
			array(
				'id'       => 'top-header-left-opt-header',
				'type'     => 'button_set',
				'title'    => __('امکانات سربرگ چپ بالا', 'redux-framework-demo'),
				
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'شبکه های اجتماعی', 
					'2' => 'منو چپ',
					'3' => 'ساعت',
					
					
				 ),
				'required' => array(array('top_menus-l-panel-status', '=', '0')),
				'default' => '3'
			),
        )
    ) );






Redux::setSection( $opt_name, array(
        'title'      => __( 'سربرگ ها', 'redux-framework-demo' ),
        'id'         => 'top-main-opt-status-sh',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'top-main-opt-header',
				'type'     => 'button_set',
				'title'    => __('انتخاب سربرگ', 'redux-framework-demo'),
				
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'سربرگ شخصی', 
					'2' => 'سربرگ خبری', 
					
					
				 ), 
				'default' => '1'
			),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'سربرگ شخصی', 'redux-framework-demo' ),
        'id'               => 'main-header-options',
        'subsection'       => true,
		
        'fields'           => array(
			
            array(
                'id'       => 'header-right-pic',
                'type'     => 'media',
                'title'    => __( 'عکس سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'عکس سمت راست سربرگ', 'redux-framework-demo' ),
                'desc'     => __( '<span style="color:red;">size : 266 * 219 px , png</span>', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/aks-header.png' ),
				
            ),
			 array(
                'id'       => 'header-main-pat',
                'type'     => 'media',
                'title'    => __( 'الگو سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ الگو پیش فرض از قسمت رنگ ها قابل تغییر است', 'redux-framework-demo' ),
                'desc'     => __( '<span style="color:red;">size : 75 * 75 px , png & svg</span>', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/header-pat.svg' ),
				 
            ),
			
			array(
                'id'       => 'header-name-of-god',
                'type'     => 'media',
                'title'    => __( 'عکس به نام خدا', 'redux-framework-demo' ),
                'subtitle' => __( 'عکس بالای لوگو', 'redux-framework-demo' ),
                'desc'     => __( '<span style="color:red;">size : 138 * 20 px , png</span>', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/name-of-god.png' ),
				
            ),
			array(
				'id'       => 'header-logo-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت لوگو', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			array(
				
                'id'       => 'header-logo',
                'type'     => 'media',
                'title'    => __( 'لوگو سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'لوگو وسط سربرگ', 'redux-framework-demo' ),
                
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/logo-header.png' ),
				'required' => array(array('header-logo-status', '=', '0')),
            ),
			
			
			array(
				'id'       => 'top-main-img-widg',
				'type'     => 'button_set',
				'title'    => __('پنل چپ سربرگ', 'redux-framework-demo'),
				
				'desc'     => __('با انتخاب ساید بار میتوانید از قسمت ابزارک ها ، ابزارک خود را انتخاب کرده و نمایش دهید'),
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'سایدبار', 
					'2' => 'تصویر', 
					
					
				 ), 
				'default' => '1'
			),
			array(
				
                'id'       => 'left-main-header-img',
                'type'     => 'media',
                'title'    => __( 'تصویر چپ ', 'redux-framework-demo' ),
                'subtitle' => __( 'تصویر سمت چپ سربرگ', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/emam1.png' ),
				'required' => array(array('header-logo-status', '=', '0')),
            ),
        )
		
    ) );







 Redux::setSection( $opt_name, array(
        'title'            => __( 'سربرگ خبری', 'redux-framework-demo' ),
        'id'               => 'news-main-header-options',
        'subsection'       => true,
		
        'fields'           => array(
			
            array(
                'id'       => 'news-header-right-pic',
                'type'     => 'media',
                'title'    => __( 'عکس سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'عکس سمت راست سربرگ', 'redux-framework-demo' ),
                
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/bb.png' ),
				
            ),
			array(
				'id'       => 'site-header-title-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت عنوان سایت', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
				
			),
			array(
				'id'       => 'news-header-logo-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت لوگو', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			
			array(
				
                'id'       => 'news-header-logo',
                'type'     => 'media',
                'title'    => __( 'لوگو سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'لوگو راست سربرگ', 'redux-framework-demo' ),
                
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/iran-news.png' ),
				
            ),
			array(
					'id'       => 'header-today-date-status',
					'type'     => 'button_set',
					'title'    => __( 'وضعیت تاریخ امروز', 'redux-framework-demo' ),
					'options'	   => array(
						'0' =>	'فعال',
						'1' =>  'غیرفعال'
					),
					'default'  => '0'// 1 = on | 0 = off
				),

				array(
					'id'       => 'date_structure',
					'type'     => 'text',
					'title'    => __( 'ساختار تاریخ امروز', 'redux-framework-demo' ),
					'default'  => 'l j F Y - H:i',
					
				),
        )
	 
    ) );


Redux::setSection( $opt_name, array(
        'title'      => __( 'ساید بارها', 'redux-framework-demo' ),
        'id'         => 'sidebar-panel-status',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'right-sidebar-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'ساید بار راست', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
            array(
				'id'       => 'left-sidebar-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'ساید بار چپ', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			array(
				'id'       => 'tabligh-sidebar-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'ساید بار تبلیغات', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
        )
    ) );
Redux::setSection( $opt_name, array(
        'title'            => __( 'شبکه های اجتماعی', 'redux-framework-demo' ),
        'id'               => 'social-network',
        'subsection'       => true,
        'fields'           => array(
			array(
				'id'       => 'social-network-bottom-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			array(
                'id'       => 'social-facebook',
                'type'     => 'text',
                'title'    => __( 'فیسبوک', 'redux-framework-demo' ),
                'desc'     => __( 'آدرس فیسبوک خود را بنویسید. ', 'redux-framework-demo' ),
                'validate' => 'url',
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			
            array(
                'id'       => 'social-instagram',
                'type'     => 'text',
                'title'    => __( 'اینستاگرام', 'redux-framework-demo' ),
                'desc'     => __( 'آدرس اینستاگرام خود را بنویسید.', 'redux-framework-demo' ),
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'social-twitter',
                'type'     => 'text',
                'title'    => __( 'توییتر', 'redux-framework-demo' ),
                'desc'     => __( 'آدرس توییتر خود را بنویسید.', 'redux-framework-demo' ),
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'social-linkedin',
                'type'     => 'text',
                'title'    => __( 'لینکدین', 'redux-framework-demo' ),
                'desc'     => __( 'آدرس لینکدین خود را بنویسید.', 'redux-framework-demo' ),
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'social-tumbler',
                'type'     => 'text',
                'title'    => __( 'تامبلر', 'redux-framework-demo' ),
                'desc'     => __( 'آدرس تامبلر خود را بنویسید.', 'redux-framework-demo' ),
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'social-telegram',
                'type'     => 'text',
                'title'    => __( 'تلگرام', 'redux-framework-demo' ),
                
                'desc'     => __( 'آدرس تلگرام خود را بنویسید.', 'redux-framework-demo' ),
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'social-skype',
                'type'     => 'text',
                'title'    => __( 'اسکایپ', 'redux-framework-demo' ),
                'desc'     => __( 'آدرس اسکایپ خود را بنویسید.', 'redux-framework-demo' ),
                'default'  => 'http://test.com/test',
				'required' => array(array('social-network-bottom-panel-status', '=', '0')),
            ),
			
        )
    ) );



	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'شعار', 'redux-framework-demo' ),
        'id'               => 'shoar',
        'subsection'       => true,
        'fields'           => array(
            array(
				'id'       => 'shoar-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
				
			),
			array(
                'id'       => 'shoar-title',
                'type'     => 'text',
                'title'    => __( 'شعار', 'redux-framework-demo' ),
                'subtitle' => __( 'شعار پایین سربرگ', 'redux-framework-demo' ),
                'default'  => 'دو قطبی کردن جامعه کار ساز نیست ، زمان انتخابات گذشته است',
				'required' => array(array('shoar-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'img-shoar-right',
                'type'     => 'media',
                'title'    => __( 'عکس راست شعار', 'redux-framework-demo' ),
                'subtitle' => __( 'عکس سمت راست شعار', 'redux-framework-demo' ),
                
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/shoar-right.png' ),
				'required' => array(array('shoar-panel-status', '=', '0')),
            ),
			array(
                'id'       => 'img-shoar-left',
                'type'     => 'media',
                'title'    => __( 'عکس چپ شعار', 'redux-framework-demo' ),
                'subtitle' => __( 'عکس سمت چپ شعار', 'redux-framework-demo' ),
                
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/shoar-left.png' ),
				'required' => array(array('shoar-panel-status', '=', '0')),
            ),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'زندگینامه', 'redux-framework-demo' ),
        'id'               => 'widget-bio',
        'subsection'       => true,
		
        'fields'           => array(
			array(
				'id'       => 'widget-bio-bottom-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
            array(
				
                'id'       => 'img-bio',
                'type'     => 'media',
                'title'    => __( 'عکس پنل زندگینامه', 'redux-framework-demo' ),
                
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/img-bio.png' ),
            ),
			
			array(
                'id'       => 'widget-bio-title',
                'type'     => 'text',
                'title'    => __( 'عنوان زندگینامه', 'redux-framework-demo' ),
                'default'  => 'خلاصه از زندگینامه سید ابراهیم رئیسی',
            ),
			array(
                'id'       => 'widget-bio-content',
                'type'     => 'editor',
                'title'    => __( 'متن زندگینامه', 'redux-framework-demo' ),
                'default'  => 'سید ابراهیم رئیسی در آذرماه سال 1339 هجری شمسی در خانواده‌‌ای روحانی در شهر مشهد و در محله نوغان دیده به جهان گشود. پدر ایشان حجة الاسلام سیدحاجی رئیس الساداتی و همچنین مادر وی سیده عصمت خدادادحسینی از سلاله سادات حسینی و نسبش از هر دو طرف به حضرت زید بن علی بن الحسین علیهمالسلام می‌رسد. سید ابراهیم در 5 سالگی پدر خود را از دست داد. او تحصیلات ابتدایی را در مدرسه جوادیه گذرانده و تحصیل در علوم حوزوی را در مدرسه نواب و سپس در مدرسه آیت الله موسوی‌نژاد شروع کرد. در سال 1354 به حوزة علمیة قم و مدرسه آیت الله بروجردی رفت و مدتی نیز در مدرسه‌ای که با مدیریت آیت الله پسندیده اداره می‌شد، تحصیل نمود. او تحصیلات ابتدایی را در مدرسه جوادیه گذرانده و تحصیل در علوم حوزوی را در مدرسه نواب و سپس در مدرسه آیت الله موسوی‌نژاد شروع کرد. علمیة قم و مدرسه آیت الله بروجردی رفت و مدتی نیز در مدرسه‌. ',
            ),
        )
    ) );
	
Redux::setSection( $opt_name, array(
        'title'            => __( 'اخبار مهم', 'redux-framework-demo' ),
        'id'               => 'import-news-bottom-panel-opitions',
        'subsection'       => true,
        'fields'           => array(
			array(
				'id'       => 'import-news-bottom-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			
			array(
				'id'       => 'top-posts-section',
				'type'     => 'section',
				'title'    => __( 'پنل اخبار مهم', 'redux-framework' ),
				'subtitle' => __( '', 'redux-framework' ),
				'required' => array(array('import-news-bottom-panel-status', '=', '0')),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
				
				array(
					'id'       => 'vip-category',
					'type'     => 'select',
					'title'    => __( 'انتخاب دسته', 'redux-framework' ),
					'subtitle' => __( '', 'redux-framework' ),
					'data' => 'category',
					'args'     => array('post_type' => array('post'), 'posts_per_page'=> -1,'hide_empty'=>1)
				),
				
				array(
					'id'       => 'vip-count',
					'type'     => 'text',
					'title'    => __( 'تعداد مطالب', 'redux-framework' ),
					'subtitle' => __( '', 'redux-framework' ),
					'default' => 5
				),
		)
	));



Redux::setSection( $opt_name, array(
        'title'            => __( 'تبلیغات', 'redux-framework-demo' ),
        'id'               => 'image-ads-opt-slides-panel-opt',
	'desc'     => __( '<span style="color:red;">جهت درج تبلیغات میتوانید از ابزارک هم استفاده نمایید.</span>', 'redux-framework-demo' ),
        'subsection'       => true,
        'fields'           => array(
			
			
			array(
                'id'          => 'image-ads-opt-slides',
                'type'        => 'slides',
                'title'       => __( 'تبیلغات عکس', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'عنوان', 'redux-framework-demo' ),
                    'description' => __( 'توضیح', 'redux-framework-demo' ),
                    'url'         => __( 'لینک', 'redux-framework-demo' ),
                ),
            ),
				
		)
	));
Redux::setSection( $opt_name, array(
        'title'            => __( 'پنل اخبار ، عکس ، ویدیو ، سخنرانی ، روزنامه', 'redux-framework-demo' ),
        'id'               => 'pic-vid-voice-panel-opitions',
        'subsection'       => true,
        'fields'           => array(
			array(
                'id'       => 'news-panel-title-panel-op',
                'type'     => 'text',
                'title'    => __( 'عنوان پنل آخرین اخبار', 'redux-framework-demo' ),
				'default'  => 'آخرین اخبار',
				'required' => array(array('voice-car-panel-status', '=', '0')),
            ),
			array(
				'id'       => 'voice-car-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل اسلایدر سخنرانی', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
			array(
                'id'       => 'voice-panel-title-slider',
                'type'     => 'text',
                'title'    => __( 'عنوان پنل سخنرانی', 'redux-framework-demo' ),
				'default'  => 'سخنرانی ها',
				'required' => array(array('voice-car-panel-status', '=', '0')),
            ),
			
			array(
				'id'       => 'voice-panel-count-num',
				'type'     => 'text',
				'title'    => __( 'تعداد پست اسلایدر سخنرانی', 'redux-framework-demo' ),
				'default'  => '7',
				'required' => array(array('voice-car-panel-status', '=', '0'))
			),
			
			
			
			array(
				'id'       => 'newspaper-car-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل روزنامه', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
			array(
                'id'       => 'newspaper-panel-title-slider',
                'type'     => 'text',
                'title'    => __( 'عنوان پنل روزنامه', 'redux-framework-demo' ),
				'default'  => 'روزنامه',
				'required' => array(array('newspaper-car-panel-status', '=', '0')),
            ),
			array(
                'id'          => 'newspaper-car-slides',
                'type'        => 'slides',
                'title'       => __( 'اسلایدر روزنامه', 'redux-framework-demo' ),
                
                'desc'     => __( '<span style="color:red;">size : 336 * 363 px </span>', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'عنوان', 'redux-framework-demo' ),
                    'description' => __( 'توضیح', 'redux-framework-demo' ),
                    'url'         => __( 'لینک', 'redux-framework-demo' ),
					
                ),
				'required' => array(array('newspaper-car-panel-status', '=', '0')),
            ),
			
			array(
				'id'       => 'pic-car-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل اسلایدر عکس', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
			array(
                'id'       => 'pic-panel-title-slider',
                'type'     => 'text',
                'title'    => __( 'عنوان پنل عکس', 'redux-framework-demo' ),
				'default'  => 'گالری عکس',
				'required' => array(array('pic-car-panel-status', '=', '0')),
            ),
			array(
				'id'       => 'pic-panel-count-num',
				'type'     => 'text',
				'title'    => __( 'تعداد پست اسلایدر عکس', 'redux-framework-demo' ),
				'default'  => '7',
				'required' => array(array('pic-car-panel-status', '=', '0'))
			),
			
			
			array(
				'id'       => 'vid-car-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل اسلایدر ویدیو', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
			array(
                'id'       => 'vid-panel-title-slider',
                'type'     => 'text',
                'title'    => __( 'عنوان پنل ویدیو', 'redux-framework-demo' ),
				'default'  => 'گالری ویدیو',
				'required' => array(array('vid-car-panel-status', '=', '0')),
            ),
			array(
				'id'       => 'vid-panel-count-num',
				'type'     => 'text',
				'title'    => __( 'تعداد پست اسلایدر ویدیو', 'redux-framework-demo' ),
				'default'  => '7',
				'required' => array(array('vid-car-panel-status', '=', '0'))
			),
		)
	));
Redux::setSection( $opt_name, array(
        'title'		=> __( 'خبرهای استانی', 'redux-framework-demo' ),
        'id'	    => 'home-state-options',
		'subsection' => true,
		'fields'    => array(
			array(
				'id'       => 'home-state-stat',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1',
			),
		
			array(
				'id'       => 'home-state-panel-title',
				'type'     => 'text',
				'title'    => __( 'عنوان پنل', 'redux-framework-demo' ),
				'default'  => 'خبرهای استانی',
				'required' => array(array('home-state-stat', '=', '0'))
			),
		
			array(
				'id'       => 'home-state-count',
				'type'     => 'text',
				'title'    => __( 'تعداد خبر', 'redux-framework-demo' ),
				'default'  => '7',
				'required' => array(array('home-state-stat', '=', '0'))
			),
		
			array(
				'id'       => 'home-state-default-cat',
				'type'     => 'select',
				'title'    => __( 'استان پیش فرض', 'redux-framework-demo' ),
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
				'desc'	   => '<span style="color:#ff0000">توجه:</span> دسته هایی که فاقد مطلب هستند نمایش داده نخواهند شد.',
				'default'  => '0',
				'required' => array(array('home-state-stat', '=', '0'))
			),
		
			 array(
                'id'       => 'east-azarbayjan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته آذربایجان شرقی', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),
				array(
                'id'       => 'west-azarbayjan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته آذربایجان غربی', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'ardebil',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته اردبیل', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'esfahan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته اصفهان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'alborz',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته البرز', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'ilam',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته ایلام', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'bushehr',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته بوشهر', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),  
				  array(
                'id'       => 'tehran',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته تهران', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),   
				  array(
                'id'       => '4mahhal',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته چهارمحال و بختیاری', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),   
				  array(
                'id'       => 'khorasan-north',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته خراسان شمالی', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'khorasan-razavi',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته خراسان رضوی', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'khorasan-south',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته خراسان جنوبی', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
				  array(
                'id'       => 'khuzestan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته خوزستان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),  
				  array(
                'id'       => 'zanjan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته زنجان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),   
				  array(
                'id'       => 'semnan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته سمنان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),    
				  array(
                'id'       => 'sistan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته سیستان و بلوچستان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),    
				  array(
                'id'       => 'fars',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته فارس', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),     
				  array(
                'id'       => 'qazvin',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته قزوین', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),     
				  array(
                'id'       => 'qom',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته قم', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),     
				  array(
                'id'       => 'kordestan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته کردستان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),     
				  array(
                'id'       => 'kerman',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته کرمان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),     
				  array(
                'id'       => 'kermanshah',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته کرمانشاه', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),      
				  array(
                'id'       => 'kohgiloye',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته کهگیلویه و بویراحمد', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),      
				  array(
                'id'       => 'golestan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته گلستان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),       
				  array(
                'id'       => 'gilan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته گیلان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),       
				  array(
                'id'       => 'lorestan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته لرستان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),       
				  array(
                'id'       => 'mazandaran',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته مازندران', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),        
				  array(
                'id'       => 'markazi',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته مرکزی', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),       
				  array(
                'id'       => 'hormozgan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته هرمزگان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),        
				  array(
                'id'       => 'hamedan',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته همدان', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ),       
				  array(
                'id'       => 'yazd',
                'type'     => 'select',
				'data'     => 'categories',
				'args' => array('taxonomy' => array('state_category'),'hide_empty' => 0),
                'title'    => __( 'دسته یزد', 'redux-framework-demo' ),
				'required' => array(array('home-state-stat', '=', '0'))
            ), 
		)
	));


Redux::setSection( $opt_name, array(
        'title'            => __( 'پابرگ', 'redux-framework-demo' ),
        'id'               => 'footer-opitions',
        'subsection'       => true,
        'fields'           => array(
			array(
				'id'       => 'footer-right-logo-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت لوگو پابرگ', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			array(
                'id'       => 'footer-right-logo',
                'type'     => 'media',
                'title'    => __( 'لوگو پابرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'لوگو سمت راست پابرگ', 'redux-framework-demo' ),
                'desc'     => __( '<span style="color:red;">size : 157 * 75 px , png</span>', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/logo-footer.png' ),
            ),
			array(
				'id'       => 'footer-left-menu-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت منو پابرگ', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
			array(
				'id'       => 'footer-left-link-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پیوند های پابرگ', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '0'
			),
			array(
                'id'       => 'copyright-footer',
                'type'     => 'text',
                'title'    => __( 'متن کپی رایت پابرگ', 'redux-framework-demo' ),
                'default'  => 'کلیه حقوق مادی و معنوی این سایت متعلق به پایگاه ارتباطات مردمی سید ابراهیم رئیسی می باشد.',
            ),
			array(
                'id'       => 'copyright-designer-footer',
                'type'     => 'text',
                'title'    => __( 'نام طراح پابرگ', 'redux-framework-demo' ),
                'default'  => 'طراحی شده توسط : ویزگرافیک',
            ),
			
		)
	));

  // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'رنگ ها', 'redux-framework-demo' ),
        //'id'    => 'color',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-brush'
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'رنگ عنوان و متن ها', 'redux-framework-demo' ),
        'id'         => 'title-color',
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'opt-color-top-hader-lang-link',
                'type'     => 'color',
                'output'   => array('.top-header-left-date','.top-hader-link a' , '.top-hader-lang a' ,'.res-link-panel ul li a','.top-social-net a'),
                'title'    => __( 'رنگ عنوان منو سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #515151).', 'redux-framework-demo' ),
                'default'  => '#515151',
            ),
			array(
                'id'       => 'opt-color-menu-panel-lang-link',
                'type'     => 'color',
                'output'   => array('.menu-panel ul li a'),
                'title'    => __( 'رنگ نوشته منو اصلی و جستجو', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #515151).', 'redux-framework-demo' ),
                'default'  => '#515151',
            ),
			array(
                'id'       => 'opt-color-site-title',
                'type'     => 'color',
                'output'   => array('.logo h3'),
                'title'    => __( 'رنگ عنوان سایت', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #111).', 'redux-framework-demo' ),
                'default'  => '#111',
            ),
			array(
                'id'       => 'opt-color-site-small',
                'type'     => 'color',
                'output'   => array('.logo small'),
                'title'    => __( 'رنگ توضیح سایت', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #111).', 'redux-framework-demo' ),
                'default'  => '#111',
            ),
			array(
                'id'       => 'opt-color-header-time',
                'type'     => 'color',
                'output'   => array('.logo-left-date'),
                'title'    => __( 'رنگ ساعت و تاریخ سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #111).', 'redux-framework-demo' ),
                'default'  => '#111',
            ),
			array(
                'id'       => 'opt-color-site-shoar',
                'type'     => 'color',
                'output'   => array('.shoar h1'),
                'title'    => __( 'رنگ شعار سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #454545).', 'redux-framework-demo' ),
                'default'  => '#454545',
            ),
			array(
                'id'       => 'opt-color-site-time',
                'type'     => 'color',
                'output'   => array('.time-pos span','.wpcarousel2 .wpc-info'),
                'title'    => __( 'رنگ تاریخ مطالب', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #a7a7a7).', 'redux-framework-demo' ),
                'default'  => '#a7a7a7',
            ),
			array(
                'id'       => 'opt-color-header-social',
                'type'     => 'color',
                'output'   => array('.social-network a','.text-404-page span'),
                'title'    => __( 'رنگ شبکه اجتماعی سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #4fc0e8).', 'redux-framework-demo' ),
                'default'  => '#4fc0e8',
            ),
			array(
                'id'       => 'opt-color-header-social-hover',
                'type'     => 'color',
                'output'   => array('.social-network a:hover','.top-hader-link a:hover','.top-hader-lang a:hover','.post-news a h3:hover','.widget-news-title h4:hover','.wpcarousel2 article.slick-slide h2:hover','.voice-car-panel h4:hover','.pic-car-panel h4:hover','.vid-car-panel h4:hover','#footer-link a:hover','.share-social-network i:hover','.post-opt button:hover','.owl-theme .owl-nav [class*="owl-"]:hover','.nav-search .fam-search:hover','.nav-search .fam-search:hover','#linkcat- a:hover','.top-social-net a:hover','.car-widget-1 a:hover','.number-page a:hover','.newspaper-footer h4:hover'),
                'title'    => __( 'رنگ هاور', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #1898c9).', 'redux-framework-demo' ),
                'default'  => '#1898c9',
            ),
			array(
                'id'       => 'opt-color-text-bio',
                'type'     => 'color',
                'output'   => array('.text-bio h5'),
                'title'    => __( 'رنگ عنوان زندگی نامه', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #1898c9).', 'redux-framework-demo' ),
                'default'  => '#1898c9',
            ),
			array(
                'id'       => 'opt-color-text-bio-p',
                'type'     => 'color',
                'output'   => array('.text-bio p'),
                'title'    => __( 'رنگ متن زندگی نامه', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #5f5f5f).', 'redux-framework-demo' ),
                'default'  => '#5f5f5f',
            ),
			array(
                'id'       => 'opt-color-text-panel',
                'type'     => 'color',
                'output'   => array('.header-news h2','.header-widget h4','.car-widget-1 .widgets-header h4','.voice-car-header a','.voice-car-header h4','.voice-car-header i','.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot','.pic-car-header h4','.panel-title-back i','.vid-car-header h4','.panel-title-back span','.azan_name','#cities','.header-single-comments h4','.current'),
                'title'    => __( 'رنگ عنوان پنل', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #454545).', 'redux-framework-demo' ),
                'default'  => '#454545',
            ),
            array(
                'id'       => 'opt-color-title',
                'type'     => 'color',
                'output'   => array( '.post-titel h3' , '.widget-news-title h4' , '.wpcarousel2 h2','.voice-car-panel h4' ,'.pic-car-panel h4' , '.vid-car-panel h4' ,'.related-car-header h4' ,'.share-post span' , '.post-short-link input','.azan_title','.azan_value' , '.car-widget-1 a','.newspaper-footer h4'),
                'title'    => __( 'رنگ عنوان مطالب', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #515151).', 'redux-framework-demo' ),
                'default'  => '#515151',
            ),
            array(
                'id'       => 'opt-color-content-text',
                'type'     => 'color',
                'output'   => array( '.post-text p' , '.single-post-opt-header p' ,'.single-post-opt-text p' ,'.single-post-opt p'),
                'title'    => __( 'رنگ متن مطالب', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #464545).', 'redux-framework-demo' ),
                'default'  => '#464545',
            ),
			array(
                'id'       => 'opt-color-footer-menu-link',
                'type'     => 'color',
                'output'   => array( '#footer-link a' , '#linkcat- a','#linkcat- h2'),
                'title'    => __( 'رنگ منو و لینک ها فوتر', 'redux-framework-demo' ),
                'subtitle' => __( '(پیش فرض : #fff).', 'redux-framework-demo' ),
                'default'  => '#fff',
            ),
        )
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'رنگ پس زمینه ها', 'redux-framework-demo' ),
        'id'         => 'back-color',
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'opt-color-body',
                'type'     => 'color',
                'title'    => __( 'رنگ اصلی', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #fff' ),
                'output'   => array( 'body' ),
                'mode'     => 'background',
                'default'  => '#fff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-top-hader',
                'type'     => 'color',
                'title'    => __( 'رنگ منو سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #EFF5FF' ),
                'output'   => array( '.top-hader' ,'.res-link-panel' ),
                'mode'     => 'background',
                'default'  => '#EFF5FF',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-main-header',
                'type'     => 'color',
                'title'    => __( 'رنگ سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #fff' ),
                'output'   => array( '.main-header-org' , '.news-header' ),
                'mode'     => 'background',
                'default'  => '#fff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-main-header-pat',
                'type'     => 'color',
                'title'    => __( 'رنگ الگو سربرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #dce9ff' ),
                
                'mode'     => 'background',
                'default'  => '#dce9ff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-menu-hader',
                'type'     => 'color',
                'title'    => __( 'رنگ منو اصلی', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #EFF5FF' ),
                'output'   => array( '.menu-hader'),
                'mode'     => 'background',
                'default'  => '#EFF5FF',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-panel-title-back',
                'type'     => 'color',
                'title'    => __( 'رنگ پس زمینه عنوان پنل ها', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #EFF5FF' ),
                'output'   => array( '.car-widget-1 .panel-title-back','.panel-title-back','.header-news','.header-single-comments','.current'),
                'mode'     => 'background',
                'default'  => '#EFF5FF',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-panel-content-back',
                'type'     => 'color',
                'title'    => __( 'رنگ پس زمینه محتوا پنل ها', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #fff' ),
                'output'   => array('.car-widget-1 .content-back' , '.content-back','.state-p','.post-news','.dana_wg'),
                'mode'     => 'background',
                'default'  => '#fff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'opt-color-back-map',
                'type'     => 'color',
                'title'    => __( 'رنگ پس زمینه نقشه', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #C3D8FB' ),
                'default'  => '#C3D8FB',
                'validate' => 'color',
            ),
			
			array(
                'id'       => 'opt-color-border-map',
                'type'     => 'color',
                'title'    => __( 'رنگ حاشیه نقشه', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: ##95B1DF' ),
                
                
                'default'  => '#95B1DF',
                'validate' => 'color',
            ),
			
			
			
			array(
                'id'       => 'opt-color-footer-panel-back',
                'type'     => 'color',
                'title'    => __( 'رنگ پس زمینه پابرگ', 'redux-framework-demo' ),
                'subtitle' => __( 'رنگ پیش فرض: #424852' ),
                'output'   => array('.footer-panel-back'),
                'mode'     => 'background', 'background-color',
                'default'  => '#424852',
                'validate' => 'color',
            ),
			
			
			
        )
    ) );



 // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'تم ها', 'redux-framework-demo' ),
        //'id'    => 'color',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-puzzle'
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'تم', 'redux-framework-demo' ),
        'id'         => 'theme-opt-color',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'color-theme-opt',
				'type'     => 'button_set',
				'title'    => __('تم های رنگی', 'redux-framework-demo'),
				
				'desc'     => __('توجه : رنگ هایی که از قسمت رنگ ها ویرایش شدن فقط بر روی تم پیش فرض اعمال میشوند . رنگ نقشه را میتوانید از قسمت رنگ ها تغییر بدهید.'),
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'پیش فرض', 
					'2' => 'قرمز', 
					'3' => 'سبز',
					'4' => 'زرد',
					'5' => 'بنفش',
					'6' => 'سیاه',
					
				 ), 
				'default' => '1'
			),
			array(
                'id'       => 'main-left-right-pic',
                'type'     => 'media',
                'title'    => __( 'تصویر چپ و راست', 'redux-framework-demo' ),
                'subtitle' => __( 'تصویر چپ و راست تم سیاه', 'redux-framework-demo' ),
                'desc'     => __( '<span style="color:red;">این تصویر فقط برای تم سیاه میباشد</span>', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_bloginfo('template_url') . '/assets/img/katibe.jpg' ),
				
            ),
        )
    ) );

 Redux::setSection( $opt_name, array(
        'title'            => __( 'فعال |غیر فغال گالری صفحات', 'redux-framework-demo' ),
        'id'               => 'video-options',
        'icon'             => 'el el-wrench '
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'اسلایدر صفحه اصلی', 'redux-framework-demo' ),
        'id'         => 'additional-slides',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'additional-slides-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
            
        )
    ) );
Redux::setSection( $opt_name, array(
        'title'      => __( 'اسلایدر صفحه ویدیو', 'redux-framework-demo' ),
        'id'         => 'video-slides',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'video-slides-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
            
        )
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'اسلایدر صفحه عکس', 'redux-framework-demo' ),
        'id'         => 'photo-slides',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'photo-slides-panel-status',
				'type'     => 'button_set',
				'title'    => __( 'وضعیت پنل', 'redux-framework-demo' ),
				'options'	   => array(
					'0' =>	'فعال',
					'1' =>  'غیرفعال',
				),
				'default'  => '1'
			),
            
        )
    ) );






// -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'اسلایدر ها', 'redux-framework-demo' ),
        //'id'    => 'color',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-video'
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'مدیریت اسلایدر ها', 'redux-framework-demo' ),
        'id'         => 'additional-slides-page',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'home-page-opt-slider',
				'type'     => 'button_set',
				'title'    => __('اسلاید صفحه اصلی', 'redux-framework-demo'),
				
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'اسلایدر ساده', 
					'2' => 'اسلایدر عکس', 
					'3' => 'اسلایدر ویدیو',
				 ), 
				'default' => '1'
			),
			array(
				'id'       => 'pic-page-opt-slider',
				'type'     => 'button_set',
				'title'    => __('اسلاید صفحه تصاویر', 'redux-framework-demo'),
				
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'اسلایدر ساده', 
					'2' => 'اسلایدر عکس', 
					'3' => 'اسلایدر ویدیو',
				 ), 
				'default' => '1'
			),
			array(
				'id'       => 'vid-page-opt-slider',
				'type'     => 'button_set',
				'title'    => __('اسلاید صفحه ویدیو', 'redux-framework-demo'),
				
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'اسلایدر ساده', 
					'2' => 'اسلایدر عکس',
					'3' => 'اسلایدر ویدیو',
					
				 ), 
				'default' => '1'
			),
            
        )
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'اسلایدر ساده', 'redux-framework-demo' ),
        'id'         => 'additional-opt-slides-status',
        'subsection' => true,
        'fields'     => array(
			array(
                'id'          => 'opt-slides',
                'type'        => 'slides',
                'title'       => __( 'اسلایدر ساده', 'redux-framework-demo' ),
				 'desc'     => __( '<span style="color:red;">size : 823 * 300 px </span>', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'عنوان', 'redux-framework-demo' ),
                    'description' => __( 'توضیح', 'redux-framework-demo' ),
                    'url'         => __( 'لینک', 'redux-framework-demo' ),
                ),
            ),
            
        )
    ) );
Redux::setSection( $opt_name, array(
        'title'      => __( 'اسلایدر تصاویر', 'redux-framework-demo' ),
        'id'         => 'additional-image-opt-slides-status',
        'subsection' => true,
        'fields'     => array(
			array(
                'id'          => 'image-slider-opt-slides',
                'type'        => 'slides',
                'title'       => __( 'اسلایدر تصاویر', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'عنوان', 'redux-framework-demo' ),
                    'description' => __( 'توضیح', 'redux-framework-demo' ),
                    'url'         => __( 'لینک', 'redux-framework-demo' ),
                ),
            ),
            
        )
    ) );




Redux::setSection( $opt_name, array(
        'title'      => __( 'اسلایدر ویدیو', 'redux-framework-demo' ),
        'id'         => 'additional-video-opt-slides-status',
        'subsection' => true,
        'fields'     => array(
			array(
                'id'          => 'video-opt-slides',
                'type'        => 'slides',
                'title'       => __( 'اسلایدر ویدیو', 'redux-framework-demo' ),
				'desc'     => __( '<span style="color:red;">size : 600 * 420 px </span>', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'عنوان', 'redux-framework-demo' ),
                    'description' => __( 'توضیح', 'redux-framework-demo' ),
                    'url'         => __( 'لینک', 'redux-framework-demo' ),
                ),
            ),
            
        )
    ) );





Redux::setSection( $opt_name, array(
        'title' => __( 'صفحه فیلم و عکس', 'redux-framework-demo' ),
        //'id'    => 'color',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-picture'
    ) );



Redux::setSection( $opt_name, array(
        'title'      => __( 'تعداد مطالب', 'redux-framework-demo' ),
        'id'         => 'additional-video-opt-page-pic-vid-number',
        'subsection' => true,
        'fields'     => array(
			array(
					'id'       => 'opt-page-pic-numbe',
					'type'     => 'text',
					'title'    => __( 'تعداد مطالب صفحه عکس', 'redux-framework' ),
					'subtitle' => __( '', 'redux-framework' ),
					'default'  => '6',
				),
			array(
					'id'       => 'opt-page-vid-numbe',
					'type'     => 'text',
					'title'    => __( 'تعداد مطالب صفحه فیلم', 'redux-framework' ),
					'subtitle' => __( '', 'redux-framework' ),
					'default'  => '6',
				),
			array(
					'id'       => 'opt-page-voice-numbe',
					'type'     => 'text',
					'title'    => __( 'تعداد مطالب صفحه سخنرانی', 'redux-framework' ),
					'subtitle' => __( '', 'redux-framework' ),
					'default'  => '10',
				),
			array(
					'id'       => 'opt-page-newspaper-numbe',
					'type'     => 'text',
					'title'    => __( 'تعداد مطالب صفحه روزنامه', 'redux-framework' ),
					'subtitle' => __( '', 'redux-framework' ),
					'default'  => '10',
				),
			
        )
    ) );

 // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'فونت ها', 'redux-framework-demo' ),
        //'id'    => 'color',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-puzzle'
    ) );

Redux::setSection( $opt_name, array(
        'title'      => __( 'فونت ها', 'redux-framework-demo' ),
        'id'         => 'theme-opt-font',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'font-theme-opt',
				'type'     => 'button_set',
				'title'    => __('فونت انتخاب', 'redux-framework-demo'),
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'ایران یکان', 
					'2' => 'ایران سانس', 
					'3' => 'پرستو',
					'4' => 'شبنم',
					'5' => 'وزیر',
					
				 ), 
				'default' => '1'
			),
        )
    ) );






// -> START Color Selection
Redux::setSection( $opt_name, array(
    'title' => __( 'المنتور', 'redux-framework-demo' ),
    //'id'    => 'color',
    'desc'  => __( '', 'redux-framework-demo' ),
    'icon'  => 'el el-puzzle'
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'سربرگ', 'redux-framework-demo' ),
    'id'         => 'theme-header-element',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'theme-header-element-select',
            'type'     => 'button_set',
            'title'    => __('نوع سربرگ', 'redux-framework-demo'),
            //Must provide key => value pairs for options
            'options' => array(
                '1' => 'سربرگ پیش فرض های قالب',
                '2' => 'المنتور',

            ),
            'default' => '1'
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'پابرگ', 'redux-framework-demo' ),
    'id'         => 'theme-footer-element',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'theme-footer-element-select',
            'type'     => 'button_set',
            'title'    => __('نوع پابرگ', 'redux-framework-demo'),
            //Must provide key => value pairs for options
            'options' => array(
                '1' => 'پابرگ پیش فرض های قالب',
                '2' => 'المنتور',

            ),
            'default' => '1'
        ),
    )
) );







    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

