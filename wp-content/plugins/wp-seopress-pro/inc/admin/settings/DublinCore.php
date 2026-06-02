<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO Dublin Core section.
 *
 * @package SEOPress PRO
 * @subpackage Settings
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

// Dublin Core SECTION.
add_settings_section(
	'seopress_setting_section_dublin_core', // ID.
	'',
	// __("Dublin Core","wp-seopress-pro"), // Title.
	'seopress_print_section_info_dublin_core', // Callback.
	'seopress-settings-admin-dublin-core' // Page.
);

add_settings_field(
	'seopress_dublin_core_enable', // ID.
	__( 'Enable Dublin Core', 'wp-seopress-pro' ), // Title.
	'seopress_dublin_core_enable_callback', // Callback.
	'seopress-settings-admin-dublin-core', // Page.
	'seopress_setting_section_dublin_core' // Section.
);
