<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO AI section.
 *
 * @package SEOPress PRO
 * @subpackage Sections
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Print section info AI.
 *
 * @return void
 */
function seopress_print_section_info_ai() {

	seopress_print_pro_section( 'ai' );

	?>
	<p>
		<?php echo wp_kses_post( __( 'Enter your <strong>API key</strong>, select an <strong>AI model</strong>, and start automagically <strong> generating your title and description meta tags, as well as alt texts for images</strong> (from the SEO metabox or from your posts‘ list view bulk actions).', 'wp-seopress-pro' ) ); ?>
	</p>

	<p>
		<?php echo wp_kses_post( __( 'We send your <strong>post content</strong>, <strong>language</strong> and <strong>target keywords</strong> to AI for better results. We ask in return to put at least one of your target keywords. However, we can‘t fully control the answers provided by the AI.', 'wp-seopress-pro' ) ); ?>
	</p>

	<hr>
	
	<h3 id="seopress-ai-general">
		<?php esc_html_e( 'General settings', 'wp-seopress-pro' ); ?>
	</h3>
	<?php
}

/**
 * Print section info AI OpenAI.
 *
 * @return void
 */
function seopress_print_section_info_ai_openai() {
	$docs = function_exists( 'seopress_get_docs_links' ) ? seopress_get_docs_links() : '';
	?>
	<hr>

	<h3 id="seopress-ai-openai">
		<?php esc_html_e( 'OpenAI', 'wp-seopress-pro' ); ?>
	</h3>

	<details class="seopress-notice">
		<summary>
			<?php esc_html_e( 'How to connect your site with OpenAI?', 'wp-seopress-pro' ); ?>
		</summary>

		<ol>
			<li>
				<?php
					/* translators: %s documentation URL */
					echo wp_kses_post( sprintf( __( 'Create an account on <a href="%s" target="_blank">OpenAI</a><span class="dashicons dashicons-external"></span> website.', 'wp-seopress-pro' ), esc_url( 'https://platform.openai.com/account/api-keys' ) ) );
				?>
			</li>
			<li><?php echo wp_kses_post( __( 'Make a <strong>payment of at least $5</strong> on the OpenAI platform.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'Generate an <strong>OpenAI API key</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( '<strong>Paste it</strong> below and <strong>Save changes</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'And There you go! Start <strong>generating titles, meta desc and alt texts using AI</strong>.', 'wp-seopress-pro' ) ); ?></li>
		</ol>
	</details>

	<p>
		<?php
		if ( ! empty( $docs['ai']['openai']['errors'] ) ) {
			/* translators: %s documentation URL */ echo wp_kses_post( sprintf( __( 'If you encounter any error, please read this <a href="%s" target="_blank">guide</a>.', 'wp-seopress-pro' ), esc_url( $docs['ai']['openai']['errors'] ) ) );
		}
		?>
	</p>
	<?php
}

/**
 * Print section info AI DeepSeek.
 *
 * @return void
 */
function seopress_print_section_info_ai_deepseek() {
	$docs = function_exists( 'seopress_get_docs_links' ) ? seopress_get_docs_links() : '';
	?>
	<hr>
	<h3 id="seopress-ai-deepseek">
		<?php esc_html_e( 'DeepSeek', 'wp-seopress-pro' ); ?>
	</h3>

	<details class="seopress-notice">
		<summary>
			<?php esc_html_e( 'How to connect your site with DeepSeek?', 'wp-seopress-pro' ); ?>
		</summary>

		<ol>
			<li>
				<?php
					/* translators: %s documentation URL */
					echo wp_kses_post( sprintf( __( 'Create an account on <a href="%s" target="_blank">DeepSeek</a><span class="dashicons dashicons-external"></span> website.', 'wp-seopress-pro' ), esc_url( 'https://platform.deepseek.com/api_keys' ) ) );
				?>
			</li>
			<li><?php echo wp_kses_post( __( 'Make a <strong>payment of at least $2</strong> on the DeepSeek platform.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'Generate an <strong>DeepSeek API key</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( '<strong>Paste it</strong> below and <strong>Save changes</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'And There you go! Start <strong>generating titles, meta desc and alt texts using AI</strong>.', 'wp-seopress-pro' ) ); ?></li>
		</ol>
	</details>

	<p>
		<?php
		if ( ! empty( $docs['ai']['deepseek']['errors'] ) ) {
			/* translators: %s documentation URL */ echo wp_kses_post( sprintf( __( 'If you encounter any error, please read this <a href="%s" target="_blank">guide</a>.', 'wp-seopress-pro' ), esc_url( $docs['ai']['deepseek']['errors'] ) ) );
		}
		?>
	</p>
	<?php
}

/**
 * Print section info AI Gemini.
 *
 * @return void
 */
function seopress_print_section_info_ai_gemini() {
	$docs = function_exists( 'seopress_get_docs_links' ) ? seopress_get_docs_links() : '';
	?>
	<hr>
	<h3 id="seopress-ai-gemini">
		<?php esc_html_e( 'Gemini', 'wp-seopress-pro' ); ?>
	</h3>

	<details class="seopress-notice">
		<summary>
			<?php esc_html_e( 'How to connect your site with Gemini?', 'wp-seopress-pro' ); ?>
		</summary>

		<ol>
			<li>
				<?php
					/* translators: %s documentation URL */
					echo wp_kses_post( sprintf( __( 'Go to <a href="%s" target="_blank">Google AI Studio</a><span class="dashicons dashicons-external"></span> website.', 'wp-seopress-pro' ), esc_url( 'https://aistudio.google.com/apikey' ) ) );
				?>
			</li>
			<li><?php echo wp_kses_post( __( 'Sign in with your <strong>Google account</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li>
				<?php
					/* translators: %s Google Cloud billing URL */
					echo wp_kses_post( sprintf( __( '<strong>Important:</strong> Even for the free tier, you may need to <a href="%s" target="_blank">enable billing</a><span class="dashicons dashicons-external"></span> on your Google Cloud account to activate your quota.', 'wp-seopress-pro' ), esc_url( 'https://console.cloud.google.com/billing' ) ) );
				?>
			</li>
			<li><?php echo wp_kses_post( __( 'Generate a <strong>Gemini API key</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( '<strong>Paste it</strong> below and <strong>Save changes</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'And there you go! Start <strong>generating titles, meta desc and alt texts using AI</strong>.', 'wp-seopress-pro' ) ); ?></li>
		</ol>
	</details>

	<p class="seopress-notice">
		<?php esc_html_e( 'Gemini offers a free tier with generous rate limits. Check Google AI Studio for current pricing and limits.', 'wp-seopress-pro' ); ?>
	</p>
	<?php
}

/**
 * Print section info AI Mistral.
 *
 * @return void
 */
function seopress_print_section_info_ai_mistral() {
	$docs = function_exists( 'seopress_get_docs_links' ) ? seopress_get_docs_links() : '';
	?>
	<hr>
	<h3 id="seopress-ai-mistral">
		<?php esc_html_e( 'Mistral', 'wp-seopress-pro' ); ?>
	</h3>

	<details class="seopress-notice">
		<summary>
			<?php esc_html_e( 'How to connect your site with Mistral?', 'wp-seopress-pro' ); ?>
		</summary>

		<ol>
			<li>
				<?php
					/* translators: %s documentation URL */
					echo wp_kses_post( sprintf( __( 'Go to <a href="%s" target="_blank">Mistral Console</a><span class="dashicons dashicons-external"></span> website.', 'wp-seopress-pro' ), esc_url( 'https://console.mistral.ai/' ) ) );
				?>
			</li>
			<li><?php echo wp_kses_post( __( 'Create an account and <strong>add credits</strong> to your account.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'Generate a <strong>Mistral API key</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( '<strong>Paste it</strong> below and <strong>Save changes</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'And there you go! Start <strong>generating titles, meta desc and alt texts using AI</strong>.', 'wp-seopress-pro' ) ); ?></li>
		</ol>
	</details>

	<p class="seopress-notice">
		<?php esc_html_e( 'For image alt text generation, select a Pixtral model which supports vision capabilities.', 'wp-seopress-pro' ); ?>
	</p>
	<?php
}

/**
 * Print section info AI Claude.
 *
 * @return void
 */
function seopress_print_section_info_ai_claude() {
	$docs = function_exists( 'seopress_get_docs_links' ) ? seopress_get_docs_links() : '';
	?>
	<hr>
	<h3 id="seopress-ai-claude">
		<?php esc_html_e( 'Claude', 'wp-seopress-pro' ); ?>
	</h3>

	<details class="seopress-notice">
		<summary>
			<?php esc_html_e( 'How to connect your site with Claude?', 'wp-seopress-pro' ); ?>
		</summary>

		<ol>
			<li>
				<?php
					/* translators: %s documentation URL */
					echo wp_kses_post( sprintf( __( 'Go to <a href="%s" target="_blank">Anthropic Console</a><span class="dashicons dashicons-external"></span> website.', 'wp-seopress-pro' ), esc_url( 'https://console.anthropic.com/' ) ) );
				?>
			</li>
			<li><?php echo wp_kses_post( __( 'Create an account and <strong>add credits</strong> to your account.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'Generate a <strong>Claude API key</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( '<strong>Paste it</strong> below and <strong>Save changes</strong>.', 'wp-seopress-pro' ) ); ?></li>
			<li><?php echo wp_kses_post( __( 'And there you go! Start <strong>generating titles, meta desc and alt texts using AI</strong>.', 'wp-seopress-pro' ) ); ?></li>
		</ol>
	</details>

	<p class="seopress-notice">
		<?php esc_html_e( 'Claude offers excellent performance for SEO content generation with strong reasoning capabilities.', 'wp-seopress-pro' ); ?>
	</p>
	<?php
}

/**
 * Print section info AI Misc.
 *
 * @return void
 */
function seopress_print_section_info_ai_misc() {
	?>
	<hr>
	<h3 id="seopress-ai-misc">
		<?php esc_html_e( 'Misc', 'wp-seopress-pro' ); ?>
	</h3>
	<?php
}