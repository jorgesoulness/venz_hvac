<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO LLMS section.
 *
 * @package SEOPress PRO
 * @subpackage Sections
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Print section info llms.
 *
 * @return void
 */
function seopress_print_section_info_llms() {
	seopress_print_pro_section( 'llms' ); ?>

	<p>
		<a href="<?php echo esc_url( get_home_url() . '/llms.txt' ); ?>" class="btn btnSecondary" target="_blank">
			<?php esc_html_e( 'View your llms.txt', 'wp-seopress-pro' ); ?>
		</a>
		<span class="spinner"></span>
	</p>

	<div class="seopress-notice is-info">
		<p>
			<?php
				/* translators: %1$s: the home URL. %2$s: the llms.txt URL. */
				echo wp_kses_post( sprintf( __( 'An <strong>llms.txt file</strong> lives at the root of your site. So, for site %1$s, the llms.txt file lives at %2$s.', 'wp-seopress-pro' ), '<code>' . esc_url( get_home_url() ) . '</code>', '<code>' . esc_url( get_home_url() . '/llms.txt' ) . '</code>' ) );
			?>
		</p>

		<p>
			<?php echo wp_kses_post( __( 'llms.txt is a <strong>markdown-formatted text file</strong> that helps Large Language Models (LLMs) like ChatGPT, Claude, and Gemini discover and understand your most important content.', 'wp-seopress-pro' ) ); ?>
		</p>

		<p>
			<?php echo wp_kses_post( __( 'The file follows the <strong>llms.txt standard</strong>, which was proposed by Jeremy Howard of Answer.AI. It provides a curated index of your site\'s key pages to help AI systems find authoritative information during inference time.', 'wp-seopress-pro' ) ); ?>
		</p>

		<p>
			<?php echo wp_kses_post( __( 'Our llms.txt file is <strong>virtual</strong> (like the default WordPress robots.txt). It means it\'s not physically present on your server. It\'s generated via <strong>URL rewriting</strong>.', 'wp-seopress-pro' ) ); ?>
		</p>
	</div>

	<div class="seopress-notice is-warning">
		<p>
			<strong><?php esc_html_e( 'Important Notice:', 'wp-seopress-pro' ); ?></strong>
			<?php echo wp_kses_post( __( 'The llms.txt file is <strong>not yet officially supported</strong> by major search engines or AI platforms (OpenAI, Google, Anthropic). As of 2025, major AI crawlers do not actively request this file. However, implementing it now can help <strong>future-proof</strong> your site for when adoption improves, and it can be useful for custom AI implementations.', 'wp-seopress-pro' ) ); ?>
		</p>
	</div>

	<?php
	if ( file_exists( ABSPATH . 'llms.txt' ) && '1' ) {
		?>
			<div class="seopress-notice is-warning">
				<p>
				<?php
					echo wp_kses_post( __( 'An <strong>llms.txt</strong> file already exists at the root of your site. We invite you to remove it so we can handle it virtually.', 'wp-seopress-pro' ) );
				?>
				</p>
			</div>
		<?php
	}
}
