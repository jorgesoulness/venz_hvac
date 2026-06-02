<?php //phpcs:ignore
/**
 * SEOPress PRO LLMS callbacks.
 *
 * @package SEOPress PRO
 * @subpackage Callbacks
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Generate default LLMS.txt content using placeholders.
 *
 * @return string
 */
function seopress_generate_default_llms_content() {
	$content  = "# {{site_name}}\n\n";
	$content .= "> {{site_description}}\n";
	$content .= "> Last updated: {{current_date}}\n\n";
	$content .= "## Search\n\n";
	$content .= "- Search URL: `{{search_url}}`\n\n";
	$content .= "## Recent Content\n\n";
	$content .= "{{latest_posts:5}}\n\n";

	// Add products section if WooCommerce is active.
	if ( class_exists( 'WooCommerce' ) ) {
		$content .= "## Products\n\n";
		$content .= "{{featured_products:5}}\n\n";
	}

	$content .= "## Complete Sitemap\n\n";
	$content .= "For a comprehensive list of all URLs, see: {{sitemap_url}}\n\n";
	$content .= "---\n\n";
	$content .= "*This file is dynamically generated and highlights our most important content.*\n";

	return apply_filters( 'seopress_default_llms_content', $content );
}

/**
 * LLMS file callback.
 *
 * @return void
 */
function seopress_llms_file_callback() {
	$docs = function_exists( 'seopress_get_docs_links' ) ? seopress_get_docs_links() : '';

	if ( defined( 'SEOPRESS_BLOCK_LLMS' ) && SEOPRESS_BLOCK_LLMS === true ) {
		?>
<div class="seopress-notice is-error">
	<p>
		<?php esc_html_e( 'Access not allowed by the PHP define.', 'wp-seopress-pro' ); ?>
	</p>
</div>
		<?php
	} else {
		if ( is_network_admin() && is_multisite() ) {
			$options = get_option( 'seopress_pro_mu_option_name' );
			$check   = isset( $options['seopress_mu_llms_file'] ) ? $options['seopress_mu_llms_file'] : null;
		} else {
			$options = get_option( 'seopress_pro_option_name' );
			$check   = isset( $options['seopress_llms_file'] ) ? $options['seopress_llms_file'] : null;
		}

		// Generate default content if empty.
		if ( empty( $check ) ) {
			$check = seopress_generate_default_llms_content();
		}

		if ( is_network_admin() && is_multisite() ) {
			printf(
				'<textarea id="seopress_mu_llms_file" class="seopress_llms_file" name="seopress_pro_mu_option_name[seopress_mu_llms_file]" rows="30" aria-label="' . esc_html__( 'Virtual llms.txt file', 'wp-seopress-pro' ) . '" placeholder="' . esc_html__( 'This is your llms.txt file!', 'wp-seopress-pro' ) . '">%s</textarea>',
				esc_html( $check )
			);
		} else {
			printf(
				'<textarea id="seopress_llms_file" class="seopress_llms_file" name="seopress_pro_option_name[seopress_llms_file]" rows="30" aria-label="' . esc_html__( 'Virtual llms.txt file', 'wp-seopress-pro' ) . '" placeholder="' . esc_html__( 'This is your llms.txt file!', 'wp-seopress-pro' ) . '">%s</textarea>',
				esc_html( $check )
			);
		}
		?>

<p class="description">
	<?php esc_html_e( 'Use placeholders to dynamically generate content. Click the buttons below to insert placeholders:', 'wp-seopress-pro' ); ?>
</p>

<div class="wrap-tags">
	<!-- Site Information -->
	<div class="tag-section">
		<h4 class="section-title"><?php esc_html_e( 'Site Information', 'wp-seopress-pro' ); ?></h4>
		<div class="tag-buttons">
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{site_name}}"><span class="dashicons dashicons-admin-site"></span><?php esc_html_e( 'Site Name', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{site_description}}"><span class="dashicons dashicons-text"></span><?php esc_html_e( 'Site Description', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{site_url}}"><span class="dashicons dashicons-admin-links"></span><?php esc_html_e( 'Site URL', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{current_date}}"><span class="dashicons dashicons-calendar"></span><?php esc_html_e( 'Current Date', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{search_url}}"><span class="dashicons dashicons-search"></span><?php esc_html_e( 'Search URL', 'wp-seopress-pro' ); ?></button>
		</div>
	</div>

	<!-- Content Placeholders -->
	<div class="tag-section">
		<h4 class="section-title"><?php esc_html_e( 'Dynamic Content', 'wp-seopress-pro' ); ?></h4>
		<div class="tag-buttons">
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{latest_posts:5}}"><span class="dashicons dashicons-admin-post"></span><?php esc_html_e( 'Latest Posts (5)', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{latest_posts:10}}"><span class="dashicons dashicons-admin-post"></span><?php esc_html_e( 'Latest Posts (10)', 'wp-seopress-pro' ); ?></button>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{featured_products:5}}"><span class="dashicons dashicons-star-filled"></span><?php esc_html_e( 'Featured Products (5)', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{latest_products:5}}"><span class="dashicons dashicons-cart"></span><?php esc_html_e( 'Latest Products (5)', 'wp-seopress-pro' ); ?></button>
			<?php endif; ?>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="{{sitemap_url}}"><span class="dashicons dashicons-networking"></span><?php esc_html_e( 'Sitemap URL', 'wp-seopress-pro' ); ?></button>
		</div>
	</div>

	<!-- Quick Templates -->
	<div class="tag-section">
		<h4 class="section-title"><?php esc_html_e( 'Quick Templates', 'wp-seopress-pro' ); ?></h4>
		<div class="tag-buttons">
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="# {{site_name}}

> {{site_description}}
> Last updated: {{current_date}}

"><span class="dashicons dashicons-welcome-learn-more"></span><?php esc_html_e( 'Site Header', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="## Search

- Search URL: `{{search_url}}`

"><span class="dashicons dashicons-search"></span><?php esc_html_e( 'Search Section', 'wp-seopress-pro' ); ?></button>
			<button type="button" class="btn btnSecondary tag-title seopress-llms-insert" data-tag="## Recent Content

{{latest_posts:5}}

"><span class="dashicons dashicons-admin-post"></span><?php esc_html_e( 'Posts Section', 'wp-seopress-pro' ); ?></button>
		</div>
	</div>
</div>

<p class="description">
	<strong><?php esc_html_e( 'Available Placeholders:', 'wp-seopress-pro' ); ?></strong><br>
	<code>{{site_name}}</code>, <code>{{site_description}}</code>, <code>{{site_url}}</code>, <code>{{current_date}}</code>, <code>{{search_url}}</code>, <code>{{sitemap_url}}</code><br>
	<code>{{latest_posts:X}}</code>, <code>{{featured_products:X}}</code>, <code>{{latest_products:X}}</code>
</p>

		<?php
	}

	if ( isset( $docs['llms']['file'] ) ) {
		echo seopress_tooltip_link( esc_url( $docs['llms']['file'] ), esc_html__( 'Guide to create your llms.txt file - new window', 'wp-seopress-pro' ) );
	}
}
