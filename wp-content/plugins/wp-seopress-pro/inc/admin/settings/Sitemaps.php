<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO Sitemaps section.
 *
 * @package SEOPress PRO
 * @subpackage Settings
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Add video sitemap section.
 *
 * @return void
 */
function seopress_pro_settings_sitemaps_image_after() {
	// Video sitemap section.
	add_settings_field(
		'seopress_xml_sitemap_video_enable', // ID.
		__( 'Enable XML Video Sitemap', 'wp-seopress-pro' ), // Title.
		'seopress_pro_xml_sitemap_video_enable_callback', // Callback.
		'seopress-settings-admin-xml-sitemap-general', // Page.
		'seopress_setting_section_xml_sitemap_general' // Section.
	);
}
add_action( 'seopress_settings_sitemaps_image_after', 'seopress_pro_settings_sitemaps_image_after' );
