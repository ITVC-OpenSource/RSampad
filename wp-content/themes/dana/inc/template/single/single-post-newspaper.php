<!--======================= single-post ===========================-->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<div class="single-post">
	<div class="single-post-header">
		<h1>
			<?php the_title(); ?>
		</h1>
	</div>
	<div class="single-post-content">
		<div class="row">
			<div class="single-post-image col-lg-5 col-md-5">
				<?php the_post_thumbnail('post-news-single' ,array('class' =>'img-fluid','alt' =>get_the_title()))?>
			</div>
			<div class="single-post-opt col-lg-7 col-md-7">
				<div class="single-post-opt-header">
					<div class="time-pos">
						<span>
							<?php echo get_the_date(); ?>
						</span>
					</div>
					<div class="post-opt">
						<button>
							 <i class="fa fam-print" aria-hidden="true"></i>
						</button>
						
						<div class="post-views">
							<i class="fal fam-eye"></i><span><?php echo wpb_get_post_views(get_the_id()); ?></span>
						</div>
					</div>
				</div>
				<h2>
					<p>
						<?php the_excerpt(); ?>
					</p>
				</h2>
			</div>

		</div>
		<div class="single-post-opt-text">
			<?php the_content(); ?>
		</div>
<?php require(get_template_directory() . '/inc/template/single/related-car-newspaper.php'); ?>
		<div class="share-post">
			<span>اشتراک گذاری :</span>
			<div class="share-social-network">
				<a target="_blank" href="https://facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>">
					<i class="fa fam-facebook-1" aria-hidden="true"></i>
				</a>
				
				<a target="_blank" href="http://twitter.com/home?status=<?php the_permalink(); ?>">
					<i class="fa fa fam-twitter-1" aria-hidden="true"></i>
				</a>
				<a target="_blank" href="https://telegram.me/share/url?url=<?php the_permalink(); ?>">
					<i class="fa fam-paper-plane " aria-hidden="true"></i>
				</a>
				<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo dana_substr(get_the_excerpt(),120); ?>%20is%20big&source=<?php bloginfo('name'); ?>">
					<i class="fa fam-linkedin-1 " aria-hidden="true"></i>
				</a>
				
			</div>
			<div class="post-short-link">
				<input  onmouseover="document.getElementById('post-short-link').select();" onclick="document.getElementById('post-short-link').select();" id="post-short-link" type="text" value="<?php bloginfo('url'); ?>/?p=<?php the_ID(); ?>" readonly="">
				<i class="fa fam-link " onmouseover="document.getElementById('post-short-link').select();"></i>
			</div>
		</div>
		<div class="tag-post">
			<div class="tag-post-text tax-terms-tags">
				برچسب ها
				<?php
				
				$terms = get_the_terms (get_the_id(),"newspaper_tags"
					 );
				
				foreach($terms as $term){
					echo "<a href='". get_term_link($term->term_id) ."'>".$term->name."</a>";
				}
				?>
			</div>
		</div>
	</div>
</div>
<!--======================= single-post ===========================-->
<?php endwhile; endif;?>