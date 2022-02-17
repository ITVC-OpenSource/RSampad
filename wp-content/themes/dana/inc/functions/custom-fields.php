<?php

// متا باکس رو تیتر خیر

function post_headtitr_meta() {
    add_meta_box( 'post_headtitle_meta', __( 'رو تیتر خبر', 'aryanews' ), 'post_headtitle_meta_callback', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'post_headtitr_meta' );


function post_headtitle_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'post_headtitle_nonce' );
    $post_headtitle_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <input type="text" name="post-headtitle" id="post-headtitle" value="<?php if ( isset ( $post_headtitle_stored_meta['post-headtitle'] ) ) echo $post_headtitle_stored_meta['post-headtitle'][0]; ?>" />
    </p>
 
    <?php
}/**
 * Saves the custom meta input
 */
function post_headtitle_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'post_headtitle_nonce' ] ) && wp_verify_nonce( $_POST[ 'post_headtitle_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'post-headtitle' ] ) ) {
        update_post_meta( $post_id, 'post-headtitle', sanitize_text_field( $_POST[ 'post-headtitle' ] ) );
    }
 
}
add_action( 'save_post', 'post_headtitle_meta_save' );

/* =================================== Media Video Custom Field ===================================== */

function media_video_meta() {
    add_meta_box( 'media_video', __( 'ویدیو', 'aryanews' ), 'media_video_callback', 'media', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'media_video_meta' );


function media_video_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'media_video_nonce' );
    $post_headtitle_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
       <small>ویدیوی مورد نظر خود را از این قسمت بارگذاری کنید.</small>
       <br>
        <input class="header_logo_url" type="text" name="media_video" size="60" value="<?php echo get_post_meta(get_the_id(),'media_video',true); ?>">
		<a href="#" class="header_logo_upload button button-primary">بارگذاری</a>
    </p>
    <script>
    jQuery(document).ready(function($) {
        $('.header_logo_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'بارگذاری تصویر',
                button: {
                    text: 'بارگذاری'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_logo').attr('src', attachment.url);
                $('.header_logo_url').val(attachment.url);

            })
            .open();
        });
    });
</script>
 
    <?php
}/**
 * Saves the custom meta input
 */
function media_video_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'media_video_nonce' ] ) && wp_verify_nonce( $_POST[ 'media_video_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'media_video' ] ) ) {
        update_post_meta( $post_id, 'media_video', sanitize_text_field( $_POST[ 'media_video' ] ) );
    }
 
}
add_action( 'save_post', 'media_video_save' );


