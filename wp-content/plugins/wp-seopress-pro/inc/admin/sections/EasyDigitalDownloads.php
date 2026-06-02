<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO Easy Digital Downloads section.
 *
 * @package SEOPress PRO
 * @subpackage Sections
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Print section info easy digital downloads.
 *
 * @return void
 */
function seopress_print_section_info_edd() {
	seopress_print_pro_section( 'edd' );

	if ( ! is_plugin_active( 'easy-digital-downloads/easy-digital-downloads.php' ) ) { ?>

		<div class="seopress-notice is-warning">
			<p>
				<?php echo wp_kses_post( __( 'You need to enable <strong>Easy Digital Downloads</strong> to apply these settings.', 'wp-seopress-pro' ) ); ?>
			</p>
		</div>

		<?php
	}
}
