<?php

if( ! class_exists( 'TIE_INSTAGRAM_WIDGET' )){

	/**
	 * Widget API: TIE_INSTAGRAM_WIDGET class
	 */
	 class TIE_INSTAGRAM_WIDGET extends WP_Widget {


		public function __construct(){
			parent::__construct( 'tie-instagram-theme', THEME_NAME .' - '.esc_html__( 'Instagram', 'tie' ) );
		}

		/**
		 * Outputs the content for the widget instance.
		 */
		public function widget( $args, $instance ){

			/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
			$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo ( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ){
				echo ( $args['before_title'] . $instance['title'] . $args['after_title'] );
			}

			// Instagram feed
			$media_link   = ! empty( $instance['media_link'] )   ? $instance['media_link']   : 'file';
			$source_id    = ! empty( $instance['source_id'] )    ? $instance['source_id']    : '';
			$media_number = ! empty( $instance['media_number'] ) ? $instance['media_number'] : 9;
			$button_text  = ! empty( $instance['button_text'] )  ? $instance['button_text']  : '';
			$button_url   = ! empty( $instance['button_url'] )   ? $instance['button_url']   : '';
			$user_data    = ! empty( $instance['user_data'] )    ? true : false;

			$atts = array(
				'username'  => $source_id,
				'number'    => $media_number,
				'link'      => $media_link,
				'user_data' => $user_data,
			);

			new TIELABS_INSTAGRAM( $atts );

			if( ! empty( $button_text )){?>
				<a target="_blank" href="<?php echo esc_url( $button_url ) ?>" class="button dark-btn fullwidth"><?php echo esc_html( $button_text ); ?></a>
				<?php
			}

			echo ( $args['after_widget'] );
		}

		/**
		 * Handles updating settings for widget instance.
		 */
		public function update( $new_instance, $old_instance ){
			$instance                 = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['media_source'] = $new_instance['media_source'];
			$instance['media_link']   = $new_instance['media_link'];
			$instance['source_id']    = $new_instance['source_id'];
			$instance['media_number'] = $new_instance['media_number'];
			$instance['button_text']  = $new_instance['button_text'];
			$instance['button_url']   = $new_instance['button_url'];
			$instance['user_data']    = $new_instance['user_data'];
			return $instance;
		}

		/**
		 * Outputs the settings form for the widget.
		 */
		public function form( $instance ){
			$defaults = array( 'title' => esc_html__( 'Follow Us', 'tie'), 'media_number' => 9, 'media_link' => 'file', 'media_source' => 'user' );
			$instance = wp_parse_args( (array) $instance, $defaults );

			$title        = isset( $instance['title'] )        ? $instance['title'] : '';
			$media_source = isset( $instance['media_source'] ) ? $instance['media_source'] : 'user';
			$media_link   = isset( $instance['media_link'] )   ? $instance['media_link'] : 'file';
			$source_id    = isset( $instance['source_id'] )    ? $instance['source_id'] : '';
			$media_number = isset( $instance['media_number'] ) ? $instance['media_number'] : 9;
			$button_text  = isset( $instance['button_text'] )  ? $instance['button_text'] : '';
			$button_url   = isset( $instance['button_url'] )   ? $instance['button_url'] : '';
			$user_data    = isset( $instance['user_data'] )    ? $instance['user_data'] : false;

			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'tie') ?></label>
					<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" type="text" />
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'source_id' ) ); ?>"><?php esc_html_e( 'Username', 'tie') ?></label>
					<input id="<?php echo esc_attr( $this->get_field_id( 'source_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'source_id' ) ); ?>" value="<?php echo esc_attr( $source_id ); ?>" class="widefat" type="text" />
				</p>

				<p>
					<input id="<?php echo esc_attr( $this->get_field_id( 'user_data' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'user_data' ) ); ?>" value="true" <?php checked( $user_data, 'true' ); ?> type="checkbox" />
					<label for="<?php echo esc_attr( $this->get_field_id( 'user_data' ) ); ?>"><?php esc_html_e( 'Show the Bio and counters?', 'tie') ?></label>
				</p>

				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'media_link' ) ); ?>"><?php esc_html_e( 'Link Images to', 'tie') ?> *</label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'media_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'media_link' ) ); ?>" class="widefat">
						<option value="file" <?php selected( $media_link, 'file' ); ?>><?php esc_html_e( 'Media File', 'tie') ?></option>
						<option value="page" <?php selected( $media_link, 'page' ); ?>><?php esc_html_e( 'Media Page on Instagram', 'tie') ?></option>
					</select>
					<small>* <?php esc_html_e( 'Videos always linked to the Media Page on Instagram.', 'tie') ?></small>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'media_number' ) ); ?>"><?php esc_html_e( 'Number of Media Items', 'tie') ?></label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'media_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'media_number' ) ); ?>" class="widefat">
						<option value="3" <?php selected( $media_number, 3 ); ?>><?php echo '3'; ?></option>
						<option value="6" <?php selected( $media_number, 6 ); ?>><?php echo '6'; ?></option>
						<option value="9" <?php selected( $media_number, 9 ); ?>><?php echo '9'; ?></option>
						<option value="12" <?php selected( $media_number, 12 ); ?>><?php echo '12'; ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php esc_html_e( 'Follow Us Button Text', 'tie') ?></label>
					<input id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" value="<?php echo esc_attr( $button_text ); ?>" class="widefat" type="text" />
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><?php esc_html_e( 'Follow Us Button URL', 'tie') ?></label>
					<input id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" value="<?php echo esc_attr( $button_url ); ?>" class="widefat" type="text" />
				</p>
		<?php

		}
	}



	/**
	 * Register the widget.
	 */
	add_action( 'widgets_init', 'tie_instagram_widget_register' );
	function tie_instagram_widget_register(){
		register_widget( 'TIE_INSTAGRAM_WIDGET' );
	}

}



/**
 * Instagram Class
 *
 */

if( ! class_exists( 'TIELABS_INSTAGRAM' )){

	class TIELABS_INSTAGRAM {

		public $link_to;
		public $number_images;
		public $show_card;


		/**
		 *
		 */
		function __construct( $atts ) {

			$user_data = $this->remote_get( $atts['username'] );

			if( ! empty( $user_data['error'] ) ){
				return self::notice_message( $user_data['error'] );
			}

			$this->link_to       = ! empty( $atts['link'] )      ? $atts['link']      : 'file';
			$this->number_images = ! empty( $atts['number'] )    ? $atts['number']    : 6;
			$this->show_card     = ! empty( $atts['user_data'] ) ? $atts['user_data'] : false;


			$this->show_card( $user_data );
			$this->show_photos( $user_data );
		}



		/**
		 * Show the user info section
		 */
		private function show_card( $user_data ){

				if( empty( $user_data['profile'] ) || ! $this->show_card ){
				return;
			}

			$user_data = wp_parse_args( $user_data['profile'], array(
				'biography' => '',
				'followed'  => '',
				'posts'     => '',
				'follow'    => '',
				'full_name' => '',
				'avatar'    => '',
			));

			extract( $user_data );

			?>

			<div class="tie-insta-header">

				<div class="tie-insta-avatar">
					<a href="https://instagram.com/<?php echo esc_attr( $username ) ?>" target="_blank" rel="nofollow">
						<img src="<?php echo $avatar ?>" alt="<?php echo esc_attr( $username ) ?>">
					</a>
				</div>

				<div class="tie-insta-info">
					<a href="https://instagram.com/<?php echo esc_attr( $username ) ?>" target="_blank" rel="nofollow" class="tie-instagram-username"><?php echo esc_attr( $full_name ); ?></a>
				</div>

				<div class="tie-insta-counts">
					<ul>
						<li>
							<span class="counts-number"><?php echo $this->format_number( $posts ) ?></span>
							<span>Posts</span>
						</li>
						<li>
							<span class="counts-number"><?php echo $this->format_number( $followed ) ?></span>
							<span>Followers</span>
						</li>
						<li>
							<span class="counts-number"><?php echo $this->format_number( $follow ) ?></span>
							<span>Following</span>
						</li>
					</ul>
				</div>

				<div class="tie-insta-desc">
					<?php echo $this->links_mentions( $biography, true ); ?>
				</div>

			</div>
			<?php

		}



		/**
		 * Show the photos
		 */
		private function show_photos( $user_data ){

			if( empty( $user_data['photos'] ) ){
				return;
			}

			$user_data = $user_data['photos'];

			$class = ( $this->link_to == 'file' ) ? 'instagram-lightbox' : '';
			?>

			<div class="tie-insta-box <?php echo $class ?>">
				<div class="tie-insta-photos">

					<?php

						$count = 0;

						foreach ( $user_data as $image ) {

							if( empty( $image['node']['thumbnail_src'] ) ){
								return;
							}

							$img_link  = false;
							$is_video  = ! empty( $image['node']['is_video'] ) ? true : false;
							$lightbox  = array();
							$thumbnail = $image['node']['thumbnail_src'];
							$comments  = $this->format_number( $image['node']['edge_media_to_comment']['count'] );
							$likes     = $this->format_number( $image['node']['edge_media_preview_like']['count'] );

							$photo_desc = '';

							if( $this->link_to ){
								if( $this->link_to == 'file' && ! empty( $image['node']['display_url'] ) && ! $is_video ){
									$img_link = $image['node']['display_url'];

									$lightbox[] = 'class="lightbox-img"';
									$lightbox[] = 'data-options="thumbnail: \''. $thumbnail .'\', width: 640, height: 640"';
									$lightbox[] = 'data-title="'. $photo_desc .'"';
									$lightbox[] = 'data-caption="&lt;span class=\'fa fa-heart\'&gt;&lt;/span&gt; &nbsp;'. $likes .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span class=\'fa fa-comment\'&gt;&lt;/span&gt; &nbsp;'. $comments .'"';

								}
								elseif( ! empty( $image['node']['shortcode'] ) ) {
									$img_link = 'https://www.instagram.com/p/'.$image['node']['shortcode'];
								}
							}

							if( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ){
								$photo_desc = wp_trim_words ( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], 40 );
								$photo_desc = $this->links_mentions( $photo_desc );
							}
							?>

							<div class="tie-insta-post">

								<?php
									if( ! empty( $img_link ) ){
										echo '<a href="'. esc_url( $img_link ) .'" '. join( ' ', $lightbox ) .' target="_blank" rel="nofollow">';
									}
								?>

								<img src="<?php echo $thumbnail ?>" width="640" heigh="640" alt="" />

								<?php
									if( $is_video ){
										echo '<span class="media-video"><span class="fa fa-video-camera"></span></span>';
									}

									if( ! empty( $img_link ) ){
										echo '</a>';
									}
								?>
							</div>
						<?php

						$count++;

						if( $count == $this->number_images ){
							break;
						}
					}

					?>
				</div>
			</div>

			<?php
		}



		/**
		 * Activate the links and mentiones in the image description
		 */
		private function links_mentions( $text , $html = false ){
			$text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1&lt;a href='\\2' target='_blank'&gt;\\2&lt;/a&gt;", $text);
			$text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1&lt;a href='http://\\2' target='_blank'&gt;\\2&lt;/a&gt;", $text);
			$text = preg_replace("/@(\w+)/", "&lt;a href='http://instagram.com/\\1' target='_blank'&gt;@\\1&lt;/a&gt;", $text);
			$text = preg_replace("/#(\w+)/", "&lt;a href='http://instagram.com/explore/tags/\\1' target='_blank'&gt;#\\1&lt;/a&gt; ", $text);

			if( $html ){
				$text = htmlspecialchars_decode( $text );
			}

			return $text;
		}



		/**
		 * Format the comments and links numbers
		 */
		private function format_number( $number ){

			if( ! is_numeric( $number ) ){
				return $number;
			}

			if($number >= 1000000){
				return round( ($number/1000)/1000 , 1) . "M";
			}

			if($number >= 100000){
				return round( $number/1000, 0) . "k";
			}

			return @number_format( $number );
		}



		/**
		 * Prepare the Username
		 */
		private function prepare_username( $username = false ){

			if( ! empty( $username ) ){
				return str_replace( '@', '', self::remove_spaces( $username ) );
			}

			return false;
		}



		/**
		 * Make the connection to Instagram
		 */
		private function remote_get( $username = false ){

			$username = $this->prepare_username( $username );

			// Check if there is no a username
			if( empty( $username ) ){
				return array( 'error' => esc_html__( 'Can not find the user!', 'tie' ) );
			}

			// Check if we have a cached version
			if( get_transient( 'tie_insta_'.$username ) !== false ){
				return get_transient( 'tie_insta_'.$username );
			}

			// Make a new connection
			$api_url = 'https://www.instagram.com/'. $username;
			$request = wp_remote_get( $api_url, array( 'timeout' => 30 ) );


			// Have Error
			if( empty( $request ) || is_wp_error( $request ) ){
				return array( 'error' => esc_html__( 'Can not connect to Instagram!', 'tie' ) );
			}

			// Get the data from the HTNL
			$data = wp_remote_retrieve_body( $request );
			$pattern = '/window\._sharedData = (.*);<\/script>/';
			preg_match( $pattern, $data, $matches );

			// Is the json data available?
			if ( empty( $matches[1] ) ){
				return array( 'error' => esc_html__( 'Can not fetch the images!', 'tie' ) );
			}
			else{

				// Check if there is an error with the JSON decoding
				$instagram_data = json_decode( $matches[1], true );

				if( $instagram_data === null && json_last_error() !== JSON_ERROR_NONE ){
					return array( 'error' => esc_html__( 'Can not decoding the instagram json', 'tie' ) );
				}

				// Check if the images set is available
				if( empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user'] ) ){
					return array( 'error' => esc_html__( 'Can not find the user!', 'tie' ) );
				}

				// All the good :)
				$user_data = array(
					'photos'  => false,
					'profile' => array(
						'username' => $username,
					),
				);

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ){
					$user_data['photos'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
				}

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['biography'] ) ){
					$user_data['profile']['biography'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['biography'];
				}

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'] ) ){
					$user_data['profile']['followed'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'];
				}

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['count'] ) ){
					$user_data['profile']['posts'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['count'];
				}

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_follow']['count'] ) ){
					$user_data['profile']['follow'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_follow']['count'];
				}

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['full_name'] ) ){
					$user_data['profile']['full_name'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['full_name'];
				}

				if( ! empty( $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['profile_pic_url'] ) ){
					$user_data['profile']['avatar'] = $instagram_data['entry_data']['ProfilePage'][0]['graphql']['user']['profile_pic_url'];
				}

				// Set the cache for 12 hours
				set_transient( 'tie_insta_'.$username , $user_data, 12*HOUR_IN_SECONDS );

				return $user_data;
			}

			return array( 'error' => esc_html__( 'Something went wrong!', 'tie' ) );
		}



		/**
		 * Get site language
		 */
		public static function notice_message( $message, $echo = true ){

			if( empty( $message) ){
				return;
			}

			echo'<span class="theme-notice">'. $message .'</span>';
		}


		/**
		 * Remove Spaces from string
		 */
		public static function remove_spaces( $string ){
			return preg_replace( '/\s+/', '', $string );
		}

	}
}


