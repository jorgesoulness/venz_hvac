<?php //phpcs:ignore
/**
 * SEOPress PRO Dublin Core callbacks.
 *
 * @package SEOPress PRO
 * @subpackage Callbacks
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Dublin Core enable callback.
 *
 * @return void
 */
function seopress_dublin_core_enable_callback() {
	$options = get_option( 'seopress_pro_option_name' );

	$check = isset( $options['seopress_dublin_core_enable'] ); ?>

<label for="seopress_dublin_core_enable">
	<input id="seopress_dublin_core_enable" name="seopress_pro_option_name[seopress_dublin_core_enable]" type="checkbox"
		<?php if ( '1' == $check ) { ?>
	checked="yes"
	<?php } ?>
	value="1"/>

	<?php esc_html_e( 'Enable Dublin Core meta tags (dc.title, dc.description, dc.source, dc.language, dc.relation, dc.subject)', 'wp-seopress-pro' ); ?>
</label>

	<?php
	if ( isset( $options['seopress_dublin_core_enable'] ) ) {
		esc_attr( $options['seopress_dublin_core_enable'] );
	}
}
