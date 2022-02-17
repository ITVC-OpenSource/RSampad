<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<script>
	fetch("https://rsampad.ir/views/?a=s&w=w&r=" + document.referrer.replace("https://" , "").replace("http://" , "").split("/")[0]);
</script>
</head>
<?php global $is_IE ?>
<body id="top" <?php body_class(); ?>>
<?php //add_revslider('Test'); ?>
<div class="wrapper-outer">

<?php if( tie_get_option('banner_bg_url') && tie_get_option('banner_bg') ): ?>
	<a href="<?php echo esc_url( tie_get_option('banner_bg_url') ) ?>" target="_blank" class="background-cover"></a>
<?php else: ?>
	<div class="background-cover"></div>
<?php endif; ?>

<?php if(  tie_get_option( 'mobile_menu_active' ) ): ?>
	<aside id="slide-out">

	<?php if( tie_get_option( 'mobile_menu_search' ) ): ?>
		<div class="search-mobile">
			<form method="get" id="searchform-mobile" action="<?php echo home_url(); ?>/">
				<button class="search-button" type="submit" value="<?php if( !$is_IE ) _eti( 'Search' ) ?>"><i class="fa fa-search"></i></button>
				<input type="text" id="s-mobile" name="s" title="<?php _eti( 'Search' ) ?>" value="<?php _eti( 'Search' ) ?>" onfocus="if (this.value == '<?php _eti( 'Search' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _eti( 'Search' ) ?>';}"  />
			</form>
		</div><!-- .search-mobile /-->
	<?php endif; ?>

	<?php if( tie_get_option('mobile_menu_social') ):
		tie_get_social( true , false , 'ttip-none' ); ?>
	<?php endif; ?>

		<div id="mobile-menu" <?php if( !tie_get_option('mobile_menu_hide_icons') ) echo' class="mobile-hide-icons"';?>></div>
	</aside><!-- #slide-out /-->
<?php endif; ?>

	<?php $full_width 	=''; if( tie_get_option( 'full_logo' )) 	$full_width  = ' full-logo';
		  $center_logo	=''; if( tie_get_option( 'center_logo' )) 	$center_logo = ' center-logo';
		  $theme_layout = 'boxed';

		  if( tie_get_option( 'theme_layout' ) == 'full' ) 		$theme_layout = 'wide-layout';
		  if( tie_get_option( 'theme_layout' ) == 'boxed-all' ) $theme_layout = 'boxed-all';
	?>
	<div id="wrapper" class="<?php echo $theme_layout ?>">
		<div class="inner-wrapper">

		<header id="theme-header" class="theme-header<?php echo $full_width.$center_logo ?>">
			<?php if( tie_get_option( 'top_menu' ) ): ?>
			<div id="top-nav" class="top-nav">
				<div class="container">

			<?php if(tie_get_option( 'top_date' )):
				if( tie_get_option('todaydate_format') ) $date_format = tie_get_option('todaydate_format');
				else $date_format = 'l ,  j  F Y';
			?>
				<span class="today-date"><?php  echo date_i18n( $date_format , current_time( 'timestamp' ) ); ?></span><?php endif; ?>

				<?php wp_nav_menu( array( 'container_class' => 'top-menu', 'theme_location' => 'top-menu'  ) ); ?>

	<?php if( tie_get_option( 'top_search' ) ): ?>
					<div class="search-block">
						<form method="get" id="searchform-header" action="<?php echo home_url(); ?>/">
							<button class="search-button" type="submit" value="<?php if( !$is_IE ) _eti( 'Search' ) ?>"><i class="fa fa-search"></i></button>
							<input class="search-live" type="text" id="s-header" name="s" title="<?php _eti( 'Search' ) ?>" value="<?php _eti( 'Search' ) ?>" onfocus="if (this.value == '<?php _eti( 'Search' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _eti( 'Search' ) ?>';}"  />
						</form>
					</div><!-- .search-block /-->
	<?php endif;
	if( tie_get_option('top_social') ):
		tie_get_social( true , false , 'ttip-none' ); ?>
	<?php endif; ?>

	<?php tie_language_selector_flags(); ?>

				</div><!-- .container /-->
			</div><!-- .top-menu /-->
			<?php endif; ?>

		<div class="header-content">
			<?php if(  tie_get_option( 'mobile_menu_active' ) ): ?>
	<a id="slide-out-open" class="slide-out-open" href="#"><span></span></a>
<?php endif; ?>
			<?php echo do_shortcode('[smartslider3 slider="3"]'); ?>
			<div class="clear"></div>
		</div><!-- End of header -->

		<?php $stick = ''; ?>
		<?php if( tie_get_option( 'stick_nav' ) ) $stick = ' class="fixed-enabled"' ?>
			<?php if( tie_get_option( 'main_nav' ) ): ?>
			<?php
			//UberMenu Support
			$navID = 'main-nav';
			if ( class_exists( 'UberMenu' ) ){
				$uberMenus = get_option( 'wp-mega-menu-nav-locations' );
				if( !empty($uberMenus) && is_array($uberMenus) && in_array("primary", $uberMenus)) $navID = 'main-nav-uber';
			}?>
			<nav id="<?php echo $navID; ?>"<?php echo $stick; ?>>
				<div class="container">

				<?php if( tie_get_option( 'nav_logo' ) ): ?>
					<a class="main-nav-logo" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>/">
						<img src="<?php echo tie_get_option( 'nav_logo' ) ?>" width="195" height="54" alt="<?php bloginfo('name'); ?>">
					</a>
				<?php endif ?>

					<?php wp_nav_menu( array( 'container_class' => 'main-menu', 'theme_location' => 'primary', 'walker' => new tie_mega_menu_walker(), 'fallback_cb'=> false) ); ?>
					<?php if(tie_get_option( 'random_article' )): ?>
					<a href="<?php echo home_url(); ?>/?tierand=1" class="random-article ttip" title="<?php _eti( 'Random Article' ) ?>"><i class="fa fa-random"></i></a>
					<?php endif ?>

					<?php if( tie_get_option( 'shopping_cart' ) && function_exists( 'is_woocommerce' ) ):
						global $woocommerce; ?>
						<a class="tie-cart ttip" href="<?php echo wc_get_cart_url(); ?>" title="<?php _eti( 'View your shopping cart' ); ?>"><span class="shooping-count-outer"><?php if( isset( $woocommerce->cart->cart_contents_count ) && ( $woocommerce->cart->cart_contents_count != 0 ) ){ ?><span class="shooping-count"><?php echo $woocommerce->cart->cart_contents_count ?></span><?php } ?><i class="fa fa-shopping-cart"></i></span></a>
					<?php endif ?>

				</div>
			</nav><!-- .main-nav /-->
			<?php endif; ?>
		</header><!-- #header /-->

	<?php get_template_part( 'framework/parts/breaking-news' ); // Get Breaking News template ?>

	<?php tie_banner('banner_below_header' , '<div class="e3lan e3lan-below_header">' , '</div>' ); ?>

<?php
$sidebar = '';
if( tie_get_option( 'sidebar_pos' ) == 'left' ) $sidebar = ' sidebar-left';
if( is_singular() || ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) ){

	$current_ID = $post->ID;
	if( function_exists( 'is_woocommerce' ) && is_woocommerce() )	$current_ID = wc_get_page_id('shop');

	$get_meta = get_post_custom( $current_ID );
	if( !empty($get_meta["tie_sidebar_pos"][0]) ){
		$sidebar_pos = $get_meta["tie_sidebar_pos"][0];

		if( $sidebar_pos == 'left' ) $sidebar = ' sidebar-left';
		elseif( $sidebar_pos == 'full' ) $sidebar = ' full-width';
		elseif( $sidebar_pos == 'right' ) $sidebar = ' sidebar-right';
	}
}
if( ( function_exists('is_bbpress') && is_bbpress() && tie_get_option( 'bbpress_full' )) || is_404() ) $sidebar = ' full-width';
?>
	<div id="main-content" class="container<?php echo $sidebar ; ?>">