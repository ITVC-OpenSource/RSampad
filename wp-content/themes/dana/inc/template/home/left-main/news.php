<?php
	global $themeoptions , $post;

	$r_side_ac = $themeoptions['right-sidebar-panel-status'];
	$l_side_ac = $themeoptions['left-sidebar-panel-status'];
	$ads_side_ac = $themeoptions['tabligh-sidebar-panel-status'];
	
	if($r_side_ac ==0 && $l_side_ac==0 && $ads_side_ac==1){
		$home_content_news = 'col-lg-8 col-md-12';
	} elseif($r_side_ac == 1 && $l_side_ac==0 && $ads_side_ac==1){
		$home_content_news = 'col-lg-9';
	
	}elseif($r_side_ac == 1 && $l_side_ac==0 && $ads_side_ac==0){
		$home_content_news = 'col-lg-7';
	
	}elseif($r_side_ac == 1 && $l_side_ac==1 && $ads_side_ac==0){
		$home_content_news = 'col-lg-10';
	
	}elseif($r_side_ac == 0 && $l_side_ac==1 && $ads_side_ac==0){
		$home_content_news = 'col-lg-10';
	
	}elseif($r_side_ac == 0 && $l_side_ac==1 && $ads_side_ac==1){
		$home_content_news = 'col-lg-12';
	
	}elseif($r_side_ac == 1 && $l_side_ac==1 && $ads_side_ac==1){
		$home_content_news = 'col-lg-12';
	
	}else{
		$home_content_news = 'col-lg-9';
	}
?>

<!--=================== news  =================================-->
<div class="news <?php echo $home_content_news; ?>">
	<div class="header-news panel-title-back">
		<h2><?php echo $themeoptions['news-panel-title-panel-op'] ?></h2>
	</div>
	<div class="main-news">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<article class="post-news content-back">
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
							<?php echo dana_substr(get_the_excerpt(),120); ?>
						</p>
					</div>
				</div>
			</a>
		</article>
		<?php endwhile; endif; ?>
		<div class="number-page">
			<?php pro_pagination(); ?>
		</div>
	</div>
</div>
<!--=================== end-news  =================================-->