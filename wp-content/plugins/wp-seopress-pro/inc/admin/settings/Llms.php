<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO LLMS section.
 *
 * @package SEOPress PRO
 * @subpackage Settings
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

// LLMS SECTION.
if ( is_network_admin() && is_multisite() ) {
	add_settings_section(
		'seopress_mu_setting_section_llms', // ID.
		'',
		'seopress_print_section_info_llms', // Callback.
		'seopress-mu-settings-admin-llms' // Page.
	);
	add_settings_field(
		'seopress_mu_llms_file', // ID.
		__( 'Your llms.txt file', 'wp-seopress-pro' ), // Title.
		'seopress_llms_file_callback', // Callback.
		'seopress-mu-settings-admin-llms', // Page.
		'seopress_mu_setting_section_llms' // Section.
	);
} else {
	add_settings_section(
		'seopress_setting_section_llms', // ID.
		'',
		'seopress_print_section_info_llms', // Callback.
		'seopress-settings-admin-llms' // Page.
	);
	add_settings_field(
		'seopress_llms_file', // ID.
		__( 'Your llms.txt file', 'wp-seopress-pro' ), // Title.
		'seopress_llms_file_callback', // Callback.
		'seopress-settings-admin-llms', // Page.
		'seopress_setting_section_llms' // Section.
	);
}
