<?php
	
	$l_side_ac = $arya_options['home-l-side-status'];
	$ads_side_ac = $arya_options['home-ads-status'];
	
	if($l_side_ac==0 && $ads_side_ac==0){
		$home_content_class = 'col-md-9 col-sm-9 col-xs-12';
	} elseif($l_side_ac==0 && $ads_side_ac==1){
		$home_content_class = 'col-md-9 col-sm-9 col-xs-12';
	} elseif($l_side_ac==1){
		$home_content_class = 'col-md-12 col-sm-12 col-xs-12';
	} elseif($l_side_ac==1 && $ads_side_ac==1) {
		$home_content_class = 'col-md-9 col-sm-9 col-xs-12';	
	} elseif($l_side_ac==1 && $ads_side_ac==0) {
		$home_content_class = 'col-md-8 col-sm-8 col-xs-12';	
	} else {
		$home_content_class = 'col-md-5 col-sm-5 col-xs-12';
	}
?>
<!--======================= main ===========================-->
<div class="main-news">
	<?php 
		if(have_posts()): while(have_posts()): the_post(); 
	?>
	<article class="post-news" <?php post_class('home-post'); ?>>
		<a href="<?php the_permalink(); ?>">
			<div class="post-img">
				<?php the_post_thumbnail('post-news' ,array('alt' =>get_the_title()))?>
			</div>
			<div class="post-text-panel">
				<div class="post-titel">
					<h3>
						<?php the_title(); ?>
					</h3>
				</div>
				<div class="time-pos">
					<span>
						<?php echo get_the_date(); ?>
					</span>
				</div>
				<div class="post-text">
					<p>
						<?php the_excerpt(); ?>
					</p>
				</div>
			</div>
		</a>
	</article>
	<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>
	<div class="number-page">
			<?php pro_pagination(); ?>
		</div>
</div>

