<?php global $themeoptions; ?>
<!--======================= main-header ===========================-->

<div class="continer-fluid news-header" >
	<div class="news-header-back ">
			<div class="container">
				<div class="row">
					
						<div class="logo col-lg-6 col-md-6 col-sm-12">
							<?php if($themeoptions['news-header-logo-status'] == 0) { ?>
								<div class="news-logo-header" style="display: flex">
									<a href="<?php echo site_url(); ?>">
										<img src="<?php echo $themeoptions['news-header-logo']['url'] ?>" class="img-fluid" alt="">
									</a>
									
									<?php if($themeoptions['site-header-title-status'] == 0) { ?>
							<div class="sss">
							<a href="<?php echo site_url(); ?>">
									<h3><?php bloginfo('name'); ?></h3>
									<small><?php bloginfo('description'); ?></small>
								</a>
							</div>

							<?php } ?>
									
									
									
								</div>
							<?php }?>
							
						</div>

						<div class="logo-left-content col-lg-6 col-md-6 col-sm-12">
							<div class="logo-left-image">
								<?php if ($themeoptions['news-header-right-pic-status'] == 0) { ?>
									<img src="<?php echo $themeoptions['news-header-right-pic']['url'] ?>" alt="" class="img-fluid">
								<?php } ?>
								<div class="logo-left-date">
								<span><?php echo date_i18n($themeoptions['date_structure'],false,true); ?></span>
							</div>
							</div>
							
						</div>
						
					
				</div>
			</div>
		
		
	</div>
	
</div>

<!--======================= end-main-header ===========================-->