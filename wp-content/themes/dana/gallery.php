<?php /* Template Name: عکس */ get_header(); ?>
<main class="container">
		<?php require(get_template_directory() . '/inc/template/gallery/top-photo-slider.php'); ?>
	<div class="row">
		<?php 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$photo_args = array(
					'post_type' => 'photo',
					'posts_per_page' => $themeoptions['opt-page-pic-numbe'],
					'paged' =>  $paged
				);
				query_posts($photo_args);
				if(have_posts()): while(have_posts()): the_post(); 
		?>
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="pic-page-post">
				<?php the_post_thumbnail('post-video' ,array('alt' =>get_the_title()))?>
				<div class="pic-page-post-text">
					<h2>
						<?php the_title(); ?>
					</h2>
					<span>
						<?php echo get_the_date(); ?> 
					</span>
					<p>
						<?php the_excerpt(); ?>
					</p>
					<a href="<?php the_permalink(); ?>"></a>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>
	<div class="number-page">
		<?php pro_pagination(); ?>
	</div>
	<?php wp_reset_query(); ?>
</main>
<!--======================= End-main ===========================-->
<?php get_footer(); ?>