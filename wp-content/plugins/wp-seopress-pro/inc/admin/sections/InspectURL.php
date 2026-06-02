<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO Inspect URL section.
 *
 * @package SEOPress PRO
 * @subpackage Sections
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Print section info inspect url.
 *
 * @return void
 */
function seopress_print_section_info_inspect_url() {
	seopress_print_pro_section( 'inspect-url' );
}
