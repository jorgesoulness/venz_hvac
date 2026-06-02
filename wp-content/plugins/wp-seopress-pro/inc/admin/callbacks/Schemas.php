<?php //phpcs:ignore
/**
 * SEOPress PRO Schemas callbacks.
 *
 * @package SEOPress PRO
 * @subpackage Callbacks
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Structured Data Types enable callback.
 *
 * @return void
 */
function seopress_rich_snippets_enable_callback() {
	$options = get_option( 'seopress_pro_option_name' );

	$check = isset( $options['seopress_rich_snippets_enable'] ); ?>

<label for="seopress_rich_snippets_enable">
	<input id="seopress_rich_snippets_enable" name="seopress_pro_option_name[seopress_rich_snippets_enable]"
		type="checkbox" <?php if ( true === $check ) { ?>
	checked="yes"
	<?php } ?>
	value="1"/>

	<?php esc_html_e( 'Enable Structured Data Types metabox for your posts, pages and custom post types', 'wp-seopress-pro' ); ?>
</label>

	<?php
	if ( isset( $options['seopress_rich_snippets_enable'] ) ) {
		esc_attr( $options['seopress_rich_snippets_enable'] );
	}
}

/**
 * Structured Data Types publisher logo callback.
 *
 * @return void
 */
function seopress_rich_snippets_publisher_logo_callback() {
	$options = get_option( 'seopress_pro_option_name' );

	$options_set = isset( $options['seopress_rich_snippets_publisher_logo'] ) ? $options['seopress_rich_snippets_publisher_logo'] : null;

	$options_set2 = isset( $options['seopress_rich_snippets_publisher_logo_width'] ) ? $options['seopress_rich_snippets_publisher_logo_width'] : null;
	$options_set3 = isset( $options['seopress_rich_snippets_publisher_logo_height'] ) ? $options['seopress_rich_snippets_publisher_logo_height'] : null;

	$check = isset( $options['seopress_rich_snippets_publisher_logo'] );
	?>

<input id="seopress_rich_snippets_publisher_logo_meta" autocomplete="off" type="text"
	value="<?php echo esc_attr( $options_set ); ?>"
	name="seopress_pro_option_name[seopress_rich_snippets_publisher_logo]"
	aria-label="<?php esc_html_e( 'Upload your publisher logo', 'wp-seopress-pro' ); ?>"
	placeholder="<?php esc_html_e( 'Select your logo', 'wp-seopress-pro' ); ?>" />

<input id="seopress_rich_snippets_publisher_logo_width" type="hidden"
	value="<?php echo esc_attr( $options_set2 ); ?>"
	name="seopress_pro_option_name[seopress_rich_snippets_publisher_logo_width]" />
<input id="seopress_rich_snippets_publisher_logo_height" type="hidden"
	value="<?php echo esc_attr( $options_set3 ); ?>"
	name="seopress_pro_option_name[seopress_rich_snippets_publisher_logo_height]" />

<input id="seopress_rich_snippets_publisher_logo_upload" class="btn btnSecondary" type="button"
	value="<?php esc_html_e( 'Upload an Image', 'wp-seopress-pro' ); ?>" />

<input id="seopress_rich_snippets_publisher_logo_remove" class="btn btnLink is-deletable" type="button" value="<?php esc_html_e( 'Remove', 'wp-seopress-pro' ); ?>" />

<p class="description">
	<?php esc_html_e( 'A logo that is representative of the organization. Files must be BMP, GIF, JPEG, PNG, WebP or SVG. The image must be 112x112px, at minimum.', 'wp-seopress-pro' ); ?>
</p>

<div id="seopress_rich_snippets_publisher_logo_placeholder_upload" class="seopress-img-placeholder" data_caption="<?php esc_html_e( 'Click to select an image', 'wp-seopress-pro' ); ?>">
	<img id="seopress_rich_snippets_publisher_logo_placeholder_src" src="<?php echo esc_attr( $options_set ); ?>" />
</div>

	<?php
	if ( isset( $options['seopress_rich_snippets_publisher_logo'] ) ) {
		esc_attr( $options['seopress_rich_snippets_publisher_logo'] );
	}
}

/**
 * ProfilePage Schema enable callback.
 *
 * @since 9.6.0
 *
 * @return void
 */
function seopress_rich_snippets_profilepage_enable_callback() {
	$options = get_option( 'seopress_pro_option_name' );

	$check = isset( $options['seopress_rich_snippets_profilepage_enable'] ); ?>

<label for="seopress_rich_snippets_profilepage_enable">
	<input id="seopress_rich_snippets_profilepage_enable" name="seopress_pro_option_name[seopress_rich_snippets_profilepage_enable]"
		type="checkbox" <?php if ( true === $check ) { ?>
	checked="yes"
	<?php } ?>
	value="1"/>

	<?php esc_html_e( 'Add ProfilePage schema markup to author archive pages for improved E-E-A-T signals', 'wp-seopress-pro' ); ?>
</label>

<p class="description">
	<?php esc_html_e( 'When enabled, ProfilePage schema will be added to author archive pages. This includes author name, bio, avatar, website URL, and post count. Individual users can opt out via their profile settings.', 'wp-seopress-pro' ); ?>
</p>

	<?php
	if ( isset( $options['seopress_rich_snippets_profilepage_enable'] ) ) {
		esc_attr( $options['seopress_rich_snippets_profilepage_enable'] );
	}
}
