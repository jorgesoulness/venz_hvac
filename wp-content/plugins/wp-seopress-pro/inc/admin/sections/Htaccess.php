<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO Htaccess section.
 *
 * @package SEOPress PRO
 * @subpackage Sections
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Print section info htaccess.
 *
 * @return void
 */
function seopress_print_section_info_htaccess() {
	seopress_print_pro_section( 'htaccess' ); ?>

	<div class="seopress-notice is-warning">
		<p>
			<strong><?php esc_html_e( 'SAVE YOUR HTACCESS FILE BEFORE EDIT!', 'wp-seopress-pro' ); ?></strong>
		</p>
	</div>

	<?php
}
