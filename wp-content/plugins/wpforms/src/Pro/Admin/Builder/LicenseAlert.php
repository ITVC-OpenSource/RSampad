<?php

namespace WPForms\Pro\Admin\Builder;

/**
 * Form Builder License alert/overlay.
 *
 * @since 1.5.7
 */
class LicenseAlert {

	/**
	 * License type slug.
	 *
	 * @since 1.5.7
	 *
	 * @var string
	 */
	public $license_type;

	/**
	 * License is expired.
	 *
	 * @since 1.5.7
	 *
	 * @var bool
	 */
	public $license_is_expired;

	/**
	 * Constructor.
	 *
	 * @since 1.5.7
	 */
	public function __construct() {

		$this->hooks();
	}

	/**
	 * Hooks.
	 *
	 * @since 1.5.7
	 */
	public function hooks() {

		// Only proceed for the form builder.
		if ( ! wpforms_is_admin_page( 'builder' ) ) {
			return;
		}

		// Load license information.
		$this->license_type       = wpforms_get_license_type();
		$this->license_is_expired = false;

		add_action( 'wpforms_admin_page', array( $this, 'output' ), 1 );
	}

	/**
	 * Output license alert overlay.
	 *
	 * @since 1.5.7
	 */
	public function output() {

		$data = $this->get_alert_data();

		if ( empty( $data ) || isset( $_COOKIE['wpforms-builder-license-alert'] ) ) {
			return;
		}

		printf(
			'<div id="wpforms-builder-license-alert">
				<img src="%1$s" />
				<h3>%2$s</h3>
				<p>%3$s</p>
				<div>
					<a href="%4$s" class="button button-primary">%5$s</a>
					<a href="%6$s" class="button button-secondary">%7$s</a>
					<button class="%8$s"></button>
				</div>
			</div>',
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/sullie-builder-mobile.png' ),
			esc_html( $data['heading'] ),
			esc_html( $data['description'] ),
			esc_url( $data['button-primary-url'] ),
			esc_html( $data['button-primary'] ),
			esc_url( $data['button-secondary-url'] ),
			esc_html( $data['button-secondary'] ),
			sanitize_html_class( $data['button-x'] )
		);

		if ( $data['button-x'] === 'dismiss' ) {
			?>
			<script>
				jQuery( function( $ ){
					$( '#wpforms-builder-license-alert .dismiss' ).click( function( event ){
						event.preventDefault();
						$( '#wpforms-builder-license-alert' ).remove();
						wpCookies.set( 'wpforms-builder-license-alert', 'true', 3600 );
					} );
				} );
			</script>
			<?php
		}
	}

	/**
	 * Prepare alert data.
	 *
	 * @since 1.5.7
	 *
	 * @return false|array Data for output in the alert overlay.
	 */
	public function get_alert_data() {

		$data = array();
     	return $data;
		

		// License is expired.
		if ( $this->license_is_expired && ! empty( $this->license_type ) ) {
			$data['button-primary-url']  = add_query_arg(
				array(
					'utm_source'   => 'WordPress',
					'utm_medium'   => 'Form Builder Overlay',
					'utm_campaign' => 'plugin',
					'utm_content'  => 'Renew Now',
				),
				'https://wpforms.com/account/licenses/'
			);
			$data['button-secondary-url'] = add_query_arg(
				array(
					'utm_source'   => 'WordPress',
					'utm_medium'   => 'Form Builder Overlay',
					'utm_campaign' => 'plugin',
					'utm_content'  => 'Learn More',
				),
				'https://wpforms.com/docs/how-to-renew-your-wpforms-license/'
			);
			$data['heading']              = __( 'Heads up! Your WPForms license has expired.', 'wpforms' );
			$data['description']          = __( 'An active license is needed to access new features & addons, plugin updates (including security improvements), and our world class support!', 'wpforms' );
			$data['button-primary']       = __( 'Renew Now', 'wpforms' );
			$data['button-secondary']     = __( 'Learn More', 'wpforms' );
			$data['button-x']             = 'dismiss';

			return $data;
		}

		// No license.
		if (
			empty( $this->license_type ) &&
			wp_count_posts( 'wpforms' )->publish >= 1 &&
			isset( $_GET['view'] ) &&
			$_GET['view'] === 'setup'
		) {
			$query_vars['utm_content']    = 'Get WPForms Pro';
			$data['button-primary-url']   = admin_url( 'admin.php?page=wpforms-settings' );
			$data['button-secondary-url'] = add_query_arg(
				array(
					'utm_source'   => 'WordPress',
					'utm_medium'   => 'Form Builder Overlay',
					'utm_campaign' => 'plugin',
					'utm_content'  => 'Learn More',
				),
				'https://wpforms.com/pricing/'
			);
			$data['heading']              = __( 'Heads up! A WPForms license key is required.', 'wpforms' );
			$data['description']          = __( 'To create more forms, please verify your WPForms license.', 'wpforms' );
			$data['button-primary']       = __( 'Enter license key', 'wpforms' );
			$data['button-secondary']     = __( 'Get WPForms pro', 'wpforms' );
			$data['button-x']             = 'close';
		}

		return $data;
	}
}