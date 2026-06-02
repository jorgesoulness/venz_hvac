<?php

namespace SEOPressPro\Actions\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use SEOPress\Core\Hooks\ExecuteHooksBackend;

/**
 * User Profile Field for ProfilePage Schema
 */
class UserProfileField implements ExecuteHooksBackend {
	/**
	 * Hooks
	 *
	 * @return void
	 */
	public function hooks() {
		add_action( 'show_user_profile', array( $this, 'renderField' ) );
		add_action( 'edit_user_profile', array( $this, 'renderField' ) );
		add_action( 'personal_options_update', array( $this, 'saveField' ) );
		add_action( 'edit_user_profile_update', array( $this, 'saveField' ) );
	}

	/**
	 * Render the ProfilePage schema disable checkbox on user profile
	 *
	 * @param \WP_User $user The user object.
	 *
	 * @return void
	 */
	public function renderField( $user ) {
		// Check if global feature is enabled.
		$enabled = seopress_pro_get_service( 'OptionPro' )->getProfilePageSchemaEnable();
		if ( '1' !== $enabled ) {
			return;
		}

		// Check user capability.
		if ( ! current_user_can( 'edit_user', $user->ID ) ) {
			return;
		}

		$disabled = get_user_meta( $user->ID, '_seopress_pro_rich_snippets_profilepage_disable', true );
		?>
		<h2><?php esc_html_e( 'SEO - ProfilePage Schema', 'wp-seopress-pro' ); ?></h2>
		<table class="form-table" role="presentation">
			<tr>
				<th scope="row"><?php esc_html_e( 'Disable ProfilePage schema', 'wp-seopress-pro' ); ?></th>
				<td>
					<label for="seopress_pro_rich_snippets_profilepage_disable">
						<input
							type="checkbox"
							name="seopress_pro_rich_snippets_profilepage_disable"
							id="seopress_pro_rich_snippets_profilepage_disable"
							value="1"
							<?php checked( '1', $disabled ); ?>
						/>
						<?php esc_html_e( 'Disable ProfilePage schema markup for this author archive', 'wp-seopress-pro' ); ?>
					</label>
					<p class="description">
						<?php esc_html_e( 'Check this option to prevent ProfilePage schema from being displayed on your author archive page.', 'wp-seopress-pro' ); ?>
					</p>
				</td>
			</tr>
		</table>
		<?php
	}

	/**
	 * Save the ProfilePage schema disable option
	 *
	 * @param int $user_id The user ID.
	 *
	 * @return void
	 */
	public function saveField( $user_id ) {
		// Check user capability.
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return;
		}

		// Verify nonce.
		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'update-user_' . $user_id ) ) {
			return;
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Missing -- Nonce verified above.
		if ( isset( $_POST['seopress_pro_rich_snippets_profilepage_disable'] ) ) {
			update_user_meta( $user_id, '_seopress_pro_rich_snippets_profilepage_disable', '1' );
		} else {
			delete_user_meta( $user_id, '_seopress_pro_rich_snippets_profilepage_disable' );
		}
	}
}
