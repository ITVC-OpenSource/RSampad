<?php get_header();?>
  		<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="container">
		<div class="single-post-header">
			<h1><?php the_title(); ?></h1>
		</div>
  		<div class="single-post-content">
			<div class="row">

				<div class="single-post-opt col-lg-12 col-md-12">
					<div class="single-post-opt-header-pic">
						
						
							<?php the_content(); ?>
						
					
					</div>
					
				</div>
</div>
		
		<div class="row">
			<?php 
				$gallery_images = get_post_meta(get_the_id(),'miu_images',true);
				if($gallery_images) {
				foreach($gallery_images as $image) {
					?>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="pic-page-content">
					
							<a href="<?php echo $image->url; ?>" class="gallery-item">
								<img class="img-fluid" src="<?php echo $image->url; ?>" alt="title-post" />
							</a>
					
					
				</div>
			</div>
			<?php } } ?>
		</div>
			
			
			
			
		</div>
  			</main>
  			
<?php 
		endwhile; endif;
get_footer(); ?>
