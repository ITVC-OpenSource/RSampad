<div class="footer_box">
<div id='holder' style='display:none;'>
<ul id="text_ads">
<?php
$my_query = new WP_Query('showposts=10&cat=0'); // 10
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>
<li class='objImgFrame' >
<a href="<?php the_permalink() ?>/" title="<?php the_title(); ?>" class="image" target="_blank">
<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail( array(212,64) );
}
else {
echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/no.png" />';
}
?></a>
<a href="<?php the_permalink() ?>/" title="<?php the_title(); ?>" class="title" target="_blank"><?php the_title(); ?></a>
 </li>
<?php endwhile; ?><?php wp_reset_query(); ?>
</ul>
<div class="srcoll_nav">
<a href"#" id="leftNav" >&nbsp; </a>
<a href"#" id="rightNav" >&nbsp; </a>
</div>
</div>
</div>