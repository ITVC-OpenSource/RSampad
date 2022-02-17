<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
<div>
<p><?php _e('This post is password protected. Enter the password to view comments.', 'pro-theme'); ?></p>
</div>
<?php
  return;
}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<div>

<?php
ob_start();
previous_comments_link(__('Newer Entries &raquo;', 'pro-theme'));
$prev_comment_link = ob_get_clean();
ob_start();
next_comments_link(__('&laquo; Older Entries', 'pro-theme'));
$next_comment_link = ob_get_clean();
?>
<?php if ($prev_comment_link || $next_comment_link): ?>

<div class="navigation">
  <div class="alignleft">
        <?php echo $next_comment_link; ?>
  </div>
  <div class="alignright">
        <?php echo $prev_comment_link; ?>
  </div>
</div>
<?php endif; ?>
</div>

<ul class="commentlist">
<?php wp_list_comments( 'reply_text=<i class="fam-reply" title="پاسخ دادن"></i>&type=comment&callback=mytheme_comment&avatar_size=0' ); ?>
</ul>
<hr class="comment-hr" />
<!-- #comments .comments-area -->
<?php if ($prev_comment_link || $next_comment_link): ?>
<div>
<div>
<div class="navigation">
<?php comment_reply_link(); ?> 
  <div class="alignleft">
        <?php echo $next_comment_link; ?>
  </div>
  <div class="alignright">
        <?php echo $prev_comment_link; ?>
  </div>
</div>
</div>
</div>
<?php endif; ?>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
  <!-- If comments are open, but there are no comments. -->
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  <?php if (!is_page()) : ?>
                        <div>
                   
<div>
                   
                        <p><?php _e('دیدگاه ها برای این نوشته بسته شده است.', 'pro-theme'); ?></p>
                        </div>
                   
                   
                        </div>
                   
                         
                <?php endif; ?>
                  
        <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div>
<div>
<div id="respond">
<div class="cancel-comment-reply">
<small><?php cancel_comment_reply_link(); ?></small>
</div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('برای ارسال دیدگاه ابتدا <a href="%s">وارد</a> شوید', 'pro-theme'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php if ( $user_ID ) : ?>
<p><?php printf(__('وارد شده با نام : <a href="%1$s">%2$s</a>.', 'pro-theme'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('خروج از حساب کاربری', 'pro-theme'); ?>"><?php _e('خروج', 'pro-theme'); ?></a></p>
<?php else : ?>

<div class="comment-input">
<div class="form-group ">
<input type="name" class="forms" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="نام :" />
</div>
<div class="form-group">
<input type="email" class="forms" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="ایمیل :">
</div>
</div>
<?php endif;

?>
<div class="comment-text form-group">
	<textarea class="forms" rows="5" name="comment" id="comment"  placeholder="متن پیام :"></textarea>
</div>


<input type="submit" value="ارسال" class="submit-post">
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If registration required and not logged in ?>
</div>
</div>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>