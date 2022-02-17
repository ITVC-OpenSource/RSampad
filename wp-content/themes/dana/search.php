<?php get_header(); ?>
<main class="container">
	<div class="row">
<!--===================  arshive-main =================================-->
		<div class="left-main col-lg-12 col-md-12">
			<div class="row">
<!--=================== news  =================================-->
				<div class="news col-lg-9 col-md-12">
					<div class="header-news">
						<h2>نتایج جستجو</h2>
					</div>
					<?php require(get_template_directory() . '/inc/template/archive/content.php'); ?>
					<p style="font-size: 15px;padding-right: 10px;">
                                                        <?php if ( have_posts() ) : 
                                                              
                                                       else : 
                                                       echo "نتیجه ای برای جستجوی شما یافت نشد!";
                                                       endif; ?>
                                              
					</p>
				</div>
<!--=================== end-news  =================================-->
<!--=================== widget-news  =================================-->
				<div class="left-widget col-lg-3 col-md-12">
						<div class="row">
							<?php require(get_template_directory() . '/inc/template/home/left-main/vip-widget.php'); ?>
<!--=================== end-widget-news  =================================-->
<!--=================== car-widget-arshive  =================================-->
							<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
								<?php dynamic_sidebar('سایدبار چپ'); ?>
							</div>
<!--=================== car-widget-arshive   =================================-->
						</div>
					</div>
			</div>
		</div>
	</div>
</main>
<!--======================= End-main ===========================-->
<?php get_footer(); ?>