<?php get_header('gallery'); ?>
  		<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="container">
		<div class="single-post-header">
			<h1><?php the_title(); ?></h1>
		</div>
  		<div class="single-post-content">
			<div class="row">

				<div class="single-post-opt col-lg-12 col-md-12">
					<div class="single-post-opt-header">
						<h2>
						<p>
							<?php the_content(); ?>
						</p>
					</h2>
					</div>
					
				</div>
</div>
		
		<div class="row">
			
			<div class="col-lg-12">
				<?php 
					if(get_post_meta(get_the_id(),'media_video',true)) {
	
				?>
					<video width="100%" controls>
					  <source src="<?php echo get_post_meta(get_the_id(),'media_video',true);  ?>">
					</video>
				<?php 
					}	
				?>
		</div>
			
			
			
			
		</div>
  			</main>
  			
<?php 
		endwhile; endif;
get_footer(); ?>
