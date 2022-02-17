<?php global $themeoptions; ?>
<!--======================= footer ===========================-->
	<footer class="container-fluid footer-site footer-panel-back">
		<div class="row">
			<div class="container">
				<div class="row">
<!--======================= footer-right ===========================-->
					<?php if($themeoptions['footer-right-logo-status'] == 0) { ?>
					<div class="footer-right col-lg-2 col-md-12 col-sm-12 col-12" >
							<img src="<?php echo $themeoptions['footer-right-logo']['url'] ?>" class="img-fluid">
					</div>
					<?php }?>
<!--======================= enf-footer-right ===========================-->
<!--======================= footer-left ===========================-->
					<div class="footer-left col-lg-10 col-md-12">
						<div class="footer-link ">
							<?php if($themeoptions['footer-left-menu-status'] == 0) { ?>
							<?php wp_nav_menu(array('theme_location'=>'ft_menus','menu_id'=>'footer-link','container'=>'')); ?>
							<?php }?>
							<?php if($themeoptions['footer-left-link-status'] == 0) { ?>
							<?php wp_list_bookmarks(); ?>
							<?php }?>
						</div>
						<div class="footer-copyright">
							<h6>
								<?php echo $themeoptions['copyright-footer'] ?>
							</h6>
						</div>
						<div class="site-designer">
							<h6>
								<?php echo $themeoptions['copyright-designer-footer'] ?>
							</h6>
						</div>
					</div>
<!--======================= enf-footer-left ===========================-->
				</div>
			</div>
		</div>
	</footer>
<!--======================= End-footer ===========================-->
<?php wp_footer(); ?>
	<script>
		
		jQuery(document).ready(function($){
			
			var state_id, ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
				<?php if($themeoptions['top-import-status'] ==0) { ?>
				$('.top-import-news').newsTicker({
					row_height: 20,
					max_rows: 1,
					speed: '<?php echo $themeoptions['top-import-speed']; ?>',
					direction: '<?php echo $themeoptions['top-import-direction']; ?>',
					duration: '<?php echo $themeoptions['top-import-delay']; ?>',
					autostart: 1,
					pauseOnHover: '<?php echo $themeoptions['top-import-pause-hover']; ?>'
				});
			<?php
				}
				if(is_home() || is_front_page()) {
				 ?>
			$('#news-paper-contain').owlCarousel({
				items:7,
				loop: true,
				lazyLoad: true,
				margin:10,
				autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
				rtl:true,
				nav:true,
				navText: ["<i class='pro-right-open'></i>","<i class='pro-left-open'></i>"],
				responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                  }
                }
				
			});  
			
			
			 $(".p-carousel").each(function() {
				$(this).owlCarousel({
					items:1,
					loop: true,
					lazyLoad: true,
					autoplay: true,
					autoplayTimeout: 2000,
					autoplayHoverPause: true,
					rtl:true,
					nav:false,
				});
			});
			
			var map = AmCharts.makeChart( "mapdiv", {
				"type": "map",
			  "dataProvider": {
				"map": "iranHigh",
				"getAreasFromMap": true,
				  "areas":[
   					 { 
						"id": "IR-13",
						"showAsSelected": true,
					 },
				  ]
			  },
			  
				"dragMap": false,
				"language": "fa",
			  "areasSettings": {
				"selectable": true,
				"selectedColor": '<?php echo $themeoptions['opt-color-border-map']; ?>'
			  },
			  "smallMap": false,
			"zoomOnDoubleClick": false,
				"zoomControl": {
					"zoomControlEnabled": false,
					"homeButtonEnabled": false
				},
			} );

			map.addListener("clickMapObject", function(event) {
				$('.state-news').animate({opacity:"0.5"});
				state_id = event.mapObject.id;
				$.post(ajaxUrl,{
					action:"state_ajax",
					state_id: state_id
				}).success(function(posts){
					$('.state-news').html(posts);
					$('.state-news').animate({opacity:"1"});
				});
			});
			<?php } $post_type = explode(".", get_page_template_slug());
				if($post_type[0] == 'gallery') { ?>
					$('.gallery-carousel').owlCarousel({
						items:'<?php echo $themeoptions['photo-panel-count']; ?>',
						loop: true,
						lazyLoad: true,
						margin:10,
						autoplay: true,
						autoplayTimeout: 2000,
						autoplayHoverPause: true,
						rtl:true,
						nav:false,
						responsiveClass: true,
						responsive: {
						  0: {
							items: 1,
							nav: true
						  },
						  600: {
							items: 3,
							nav: false
						  },
						  1000: {
							items: 5,
						  }
						}
					});
			
					$('.gallery-slider').owlCarousel({
						items:1,
						loop: true,
						lazyLoad: true,
						margin:0,
						autoplay: true,
						autoplayTimeout: 2000,
						autoplayHoverPause: true,
						rtl:true,
						nav:false,
						responsiveClass: true,
						responsive: {
						  0: {
							items: 1,
							nav: true
						  },
						  600: {
							items: 1,
							nav: false
						  },
						  1000: {
							items: 1,
						  }
						}
					});
			<?php } ?>
			
			<?php if(is_singular('photo')) { ?>
				$('.lightgallery').lightGallery({
					getCaptionFromTitleOrAlt: false
				});
			<?php } ?>
		});	
		
	</script>
	
	<?php require(get_template_directory() . '/inc/template/footer/map-locations.php'); ?>

<script> var sj = '<?php echo $themeoptions['opt-color-border-map']; ?>'
	var mpc = '<?php echo $themeoptions['opt-color-back-map']; ?>'
</script>
</body>
</html>