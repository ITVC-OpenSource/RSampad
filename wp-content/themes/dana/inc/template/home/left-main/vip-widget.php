<?php  if($themeoptions['import-news-bottom-panel-status'] == 0) {  ?>
		<div class="widget-news col-lg-12 col-md-6 col-sm-6">
			<div class="header-widget panel-title-back">
				<h4>
					اخبار مهم
				</h4>
			</div>
			
		
			<div class="widget-news-content content-back">
<!--=================== 1  =================================-->
				<?php 
					$vip_posts = array(
						'post_type' => 'post',
						'cat' => $themeoptions['vip-category'],
						'posts_per_page' => $themeoptions['vip-count']
					);

					$top_first_news_query = new WP_Query($vip_posts);
					if($top_first_news_query->have_posts()): while($top_first_news_query->have_posts()): $top_first_news_query->the_post();
				?>
				<div class="widget-news-post-form">
					<a href="<?php the_permalink(); ?>">
						<div class="widget-news-post">
							<div class="widget-news-image">
								<?php the_post_thumbnail('widget-news', array('alt'=>get_the_title())); ?>
							</div>
							<div class="widget-news-title">
								<h4>
									
									<?php
										if (strlen($post->post_title) >= 45) {
										echo $short_title=mb_substr(the_title('','',FALSE),0,45) . '...';
										} else {
											the_title();
										} 
									?>
								</h4>
								<div class="time-pos">
									<span>
										<?php echo get_the_date(); ?>  
									</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
<!--=================== 1  =================================-->

			</div>
		</div>
		<?php } dynamic_sidebar('سایدبار فوتر اول'); ?>
		