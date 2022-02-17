<div class="post-tags single-post-panels">
	<header>
		<h4><span>ارسال نظر</span></h4>
	</header>
	<footer>
		<?php 
			global $post;
			if ('open' == $post->comment_status) {
				comments_template( '/comments.php', true );
			} else {
				echo '<p>ارسال دیدگاه برای این نوشته بسته می باشد.</p>';
			}
		?>
	</footer>
</div>