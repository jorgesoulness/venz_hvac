<?php //phpcs:ignore
/**
 * SEOPress PRO Advanced callbacks.
 *
 * @package SEOPress PRO
 * @subpackage Callbacks
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Advanced appearance PS column callback.
 *
 * @return void
 */
function seopress_pro_advanced_appearance_ps_col_callback() {
	$options = get_option( 'seopress_advanced_option_name' );

	$check = isset( $options['seopress_advanced_appearance_ps_col'] ); ?>

<label for="seopress_advanced_appearance_ps_col">
	<input id="seopress_advanced_appearance_ps_col"
		name="seopress_advanced_option_name[seopress_advanced_appearance_ps_col]" type="checkbox" <?php if ( '1' == $check ) { ?>
	checked="yes"
	<?php } ?>
	value="1"/>

	<?php esc_html_e( 'Display Page Speed column to check performances', 'wp-seopress-pro' ); ?>
</label>

	<?php
	if ( isset( $options['seopress_advanced_appearance_ps_col'] ) ) {
		esc_attr( $options['seopress_advanced_appearance_ps_col'] );
	}
}

/**
 * Advanced appearance Search Console column callback.
 *
 * @return void
 */
function seopress_pro_advanced_appearance_search_console_callback() {
		$options = get_option( 'seopress_advanced_option_name' );

		$check = isset( $options['seopress_advanced_appearance_search_console'] );
	?>

	<label for="seopress_advanced_appearance_search_console">
		<input id="seopress_advanced_appearance_search_console"
			name="seopress_advanced_option_name[seopress_advanced_appearance_search_console]" type="checkbox" <?php if ( '1' == $check ) { ?>
		checked="yes"
		<?php } ?>
		value="1"/>

		<?php
		esc_html_e( 'Display Search Console Data (clicks, impressions, CTR, positions)', 'wp-seopress-pro' );
		?>
</label>

	<?php
	if ( isset( $options['seopress_advanced_appearance_search_console'] ) ) {
		esc_attr( $options['seopress_advanced_appearance_search_console'] );
	}
}

/**
 * Advanced rewrite search callback.
 *
 * @return void
 */
function seopress_rewrite_search_callback() {

	$options = get_option( 'seopress_advanced_option_name' );
	$check   = isset( $options['seopress_rewrite_search'] ) ? $options['seopress_rewrite_search'] : null;

	// Handle data prior to version 8.1.
	if ( is_null( $check ) ) {
		$options = get_option( 'seopress_pro_option_name' );
		$check   = isset( $options['seopress_rewrite_search'] ) ? $options['seopress_rewrite_search'] : null;
	}
	?>

<input type="text" name="seopress_advanced_option_name[seopress_rewrite_search]"
	placeholder="<?php esc_html_e( 'Search results base', 'wp-seopress-pro' ); ?>"
	aria-label="<?php esc_html_e( 'Search results base, e.g. "search-results" without quotes', 'wp-seopress-pro' ); ?>"
	value="<?php echo esc_attr( $check ); ?>" />

	<div class="seopress-notice">
		<p>
			<?php esc_html_e( 'You have to flush your permalinks each time you change this setting.', 'wp-seopress-pro' ); ?>
		</p>
	</div>
	<?php
}

/**
 * Advanced appearance Dashboard Live Chat callback.
 *
 * @return void
 */
function seopress_advanced_appearance_dashboard_livechat_callback() {
	$options = get_option( 'seopress_advanced_option_name' );

	$check = isset( $options['seopress_advanced_appearance_dashboard_livechat'] );
	?>

<label for="seopress_advanced_appearance_dashboard_livechat">
	<input id="seopress_advanced_appearance_dashboard_livechat"
		name="seopress_advanced_option_name[seopress_advanced_appearance_dashboard_livechat]" type="checkbox" <?php if ( '1' == $check ) { ?>
	checked="yes"
	<?php } ?>
	value="1"/>

	<?php esc_attr_e( 'Disable AI Live Chat', 'wp-seopress-pro' ); ?>
</label>

	<?php
	if ( isset( $options['seopress_advanced_appearance_dashboard_livechat'] ) ) {
		esc_attr( $options['seopress_advanced_appearance_dashboard_livechat'] );
	}
}