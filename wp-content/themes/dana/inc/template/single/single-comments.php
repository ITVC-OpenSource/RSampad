<!--======================= single-comments ===========================-->
<div class="single-comments">
	<div class="header-single-comments">
		<h4>
			نظرات 
		</h4>
	</div>
<?php 
			global $post;
			if ('open' == $post->comment_status) {
				comments_template( '/comments.php', true );
			} else {
				echo '<p>ارسال دیدگاه برای این نوشته بسته می باشد.</p>';
			}
		?>
</div>
<!--======================= end-single-comments ===========================-->