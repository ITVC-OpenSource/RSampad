<?php 
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	   <div class="comment-p col-lg-12 col-sm-12 col-xs-12">
	    <div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	<?php endif;
	 printf( __( '<span class="fn">%s</span>' ), get_comment_author_link() ); ?> 
        <div class="comment-meta comment-date  commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"> : 
            <?php 			
                /* translators: 1: date, 2: time */
                printf( __('%1$s at %2$s'), get_comment_date('j F Y'),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
	 ?>
    
		

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
		   <div class="comment-text">
			<?php comment_text(); ?>
        </div>
    </div>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
    
   </div>

<?php
}
