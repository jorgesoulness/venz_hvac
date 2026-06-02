<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO Schemas section.
 *
 * @package SEOPress PRO
 * @subpackage Sections
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Print section info rich snippets.
 *
 * @return void
 */
function seopress_print_section_info_rich_snippets() {
	seopress_print_pro_section( 'rich-snippets' ); ?>

	<a class="btn btnSecondary" href="<?php echo esc_url( admin_url( 'edit.php?post_type=seopress_schemas' ) ); ?>">
		<?php esc_html_e( 'View my automatic schemas', 'wp-seopress-pro' ); ?>
	</a>

	<?php
}
