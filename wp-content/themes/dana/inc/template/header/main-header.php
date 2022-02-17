<?php global $themeoptions; ?>
<!--======================= main-header ===========================-->

<style>
	.main-header-center::before{
	content: '';
	background-image: -moz-linear-gradient( 0deg, <?php echo $themeoptions['opt-color-main-header']?> 0%, rgba(246,246,246,0) 100%);
  background-image: -webkit-linear-gradient( 0deg, <?php echo $themeoptions['opt-color-main-header']?> 0%, rgba(246,246,246,0) 100%);
  background-image: -ms-linear-gradient( 0deg, <?php echo $themeoptions['opt-color-main-header']?> 0%, rgba(246,246,246,0) 100%);
	height: 100%;
	float: right;
	width: 141px;
	position: absolute;
	top: 0;
	left: 15px;
	
}

.main-header-center::after{
	content: '';
	background-image: -moz-linear-gradient( 180deg, <?php echo $themeoptions['opt-color-main-header']?> 0%, rgba(246,246,246,0) 100%);
  background-image: -webkit-linear-gradient( 180deg, <?php echo $themeoptions['opt-color-main-header']?> 0%, rgba(246,246,246,0) 100%);
  background-image: -ms-linear-gradient( 180deg, <?php echo $themeoptions['opt-color-main-header']?> 0%, rgba(246,246,246,0) 100%);
	height: 100%;
	float: right;
width: 141px;
position: absolute;
top: 0;
right: 15px;
	
}
	.main-header-center{
	padding-top: 30px;
	background: url("<?php echo $themeoptions['header-main-pat']['url'] ?>")  center center;
	text-align: center;
	background-size: 20%;
	height: 100%;
}
</style>
<div class="container-fluid main-header-org">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="main-header-right col-lg-3 col-md-12">
					<img src="<?php echo $themeoptions['header-right-pic']['url'] ?>" alt="" class="img-fluid">
				</div>
				
				<div class="col-lg-6 col-md-12">
						<div class="main-header-center">

							<div class="main-shadow-right"></div>
								<div class="name-of-god">
									<img src="<?php echo $themeoptions['header-name-of-god']['url']?>" alt="">
								</div>
								<?php if($themeoptions['header-logo-status'] == 0) { ?>
								<div class="logo-header">
									<a href="<?php echo site_url(); ?>">
										<img src="<?php echo $themeoptions['header-logo']['url'] ?>" class="img-fluid" alt="">
									</a>
								</div>
								<?php }?>
							<div class="social-network">
								<?php require(get_template_directory() . '/inc/template/header/social-network.php'); ?>
							</div>

						</div>
					</div>
					<?php
			
						if($themeoptions['top-main-img-widg'] == 1)  
							require(get_template_directory() . '/inc/template/header/azan.php'); 
						else
							require(get_template_directory() . '/inc/template/header/left-main-img.php');


				 ?>
				
			</div>
		</div>
	</div>
</div>

<!--======================= end-main-header ===========================-->