<?php //phpcs:ignore
/**
 * SEOPress PRO AI callbacks.
 *
 * @package SEOPress PRO
 * @subpackage Callbacks
 */

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * AI provider callback.
 *
 * @return void
 */
function seopress_ai_provider_callback() {
	$providers = array(
		'openai'   => esc_attr__( 'OpenAI', 'wp-seopress-pro' ),
		'deepseek' => esc_attr__( 'DeepSeek', 'wp-seopress-pro' ),
		'gemini'   => esc_attr__( 'Gemini', 'wp-seopress-pro' ),
		'mistral'  => esc_attr__( 'Mistral', 'wp-seopress-pro' ),
		'claude'   => esc_attr__( 'Claude', 'wp-seopress-pro' ),
	);

	$selected = seopress_pro_get_service( 'OptionPro' )->getAIProvider() ?: 'openai'; // phpcs:ignore
	?>

	<div class="seopress-ai-providers" role="radiogroup" aria-label="<?php esc_attr_e( 'Select AI Provider', 'wp-seopress-pro' ); ?>">
		<?php foreach ( $providers as $key => $value ) { ?>
			<div class="seopress-ai-provider <?php echo ( $key === $selected ) ? 'active' : ''; ?>">
				<label for="seopress_ai_provider_<?php echo esc_attr( $key ); ?>" tabindex="0">
					<input
						type="radio"
						id="seopress_ai_provider_<?php echo esc_attr( $key ); ?>"
						name="seopress_pro_option_name[seopress_ai_provider]"
						value="<?php echo esc_attr( $key ); ?>"
						<?php checked( $key, $selected ); ?>
						aria-label="
						<?php
							echo esc_attr(
								sprintf(
									/* translators: %s: provider name */
									__( 'Select %s as AI provider', 'wp-seopress-pro' ),
									$value
								)
							);
						?>
						"/>
					<img src="<?php echo esc_url( SEOPRESS_PRO_ASSETS_DIR . '/img/logo-' . $key . '.svg' ); ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
			</div>
		<?php } ?>
	</div>

	<?php
}

/**
 * OpenAI API key callback.
 *
 * @return void
 */
function seopress_ai_openai_api_key_callback() {
	$docs = seopress_get_docs_links();

	$api_key = seopress_pro_get_service( 'OptionPro' )->getAIOpenaiApiKey();

	// Show placeholder if key exists, otherwise show empty field.
	$display_value = ! empty( $api_key ) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : '';

	printf( '<input id="seopress_ai_openai_api_key" type="text" name="seopress_pro_option_name[seopress_ai_openai_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" placeholder="%s" aria-label="' . esc_html__( 'OpenAI API key', 'wp-seopress-pro' ) . '"/>', esc_attr( $display_value ), esc_attr__( 'Enter your OpenAI API key', 'wp-seopress-pro' ) );
	?>
	<p class="description">
		<?php
		/* translators: %s documentation URL */
		echo wp_kses_post( sprintf( __( 'Sign up to <a href="%s" target="_blank">OpenAI</a> to generate your API key.', 'wp-seopress-pro' ), esc_url( 'https://platform.openai.com/account/api-keys' ) ) );
		?>
	</p>

	<?php
	$api_key = seopress_pro_get_service( 'Usage' )->getLicenseKey( 'openai' );

	if ( defined( 'SEOPRESS_OPENAI_KEY' ) && ! empty( SEOPRESS_OPENAI_KEY ) && is_string( SEOPRESS_OPENAI_KEY ) ) {
		?>
		<p class="seopress-notice"><?php esc_html_e( 'Your OpenAI key is defined in wp-config.php.', 'wp-seopress-pro' ); ?></p>
	<?php } ?>

	<p>
		<button type="button" id="seopress-open-ai-check-license" class="btn btnTertiary">
			<?php esc_html_e( 'Test API Key', 'wp-seopress-pro' ); ?>
		</button>
		<span class="spinner" style="float: none; margin-left: 10px;"></span>
	</p>
	<div id="seopress-open-ai-check-license-log" style="display: none; margin-top: 10px;"></div>
	<?php
}

/**
 * Open AI model callback.
 *
 * @return void
 */
function seopress_ai_openai_model_callback() {
	$selected = seopress_pro_get_service( 'OptionPro' )->getAIOpenaiModel() ?: 'gpt-4o'; // phpcs:ignore
	?>

	<select id="seopress_ai_openai_model" name="seopress_pro_option_name[seopress_ai_openai_model]">
		<?php
		$models = array(
			'gpt-5.2-chat-latest' => __( 'GPT-5.2 Chat (recommended)', 'wp-seopress-pro' ),
			'gpt-4o'              => __( 'GPT-4o', 'wp-seopress-pro' ),
			'gpt-4o-mini'         => __( 'GPT-4o Mini', 'wp-seopress-pro' ),
		);

		if ( ! empty( $models ) ) {
			foreach ( $models as $key => $model ) {
				?>
				<option
				<?php
				if ( esc_attr( $key ) == $selected ) {
					?>
					selected="selected" <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $model ); ?>
				</option>
				<?php
			}
		}
		?>
	</select>

	<p class="description">
		<?php esc_html_e( 'Select your OpenAI model. This requires at least 1 successful payment of $5 via the OpenAI platform. Note: GPT-5.2 uses reasoning which consumes significantly more tokens than GPT-4o models, but also generates more accurate and detailed responses.', 'wp-seopress-pro' ); ?>
	</p>

	<?php
	if ( isset( $options['seopress_ai_openai_model'] ) ) {
		esc_attr( $options['seopress_ai_openai_model'] );
	}
}

/**
 * DeepSeek API key callback.
 *
 * @return void
 */
function seopress_ai_deepseek_api_key_callback() {
	$docs = seopress_get_docs_links();

	$api_key = seopress_pro_get_service( 'OptionPro' )->getAIDeepSeekApiKey();

	// Show placeholder if key exists, otherwise show empty field.
	$display_value = ! empty( $api_key ) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : '';

	printf( '<input id="seopress_ai_deepseek_api_key" type="text" name="seopress_pro_option_name[seopress_ai_deepseek_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" placeholder="%s" aria-label="' . esc_html__( 'DeepSeek API key', 'wp-seopress-pro' ) . '"/>', esc_attr( $display_value ), esc_attr__( 'Enter your DeepSeek API key', 'wp-seopress-pro' ) );
	?>
	<p class="description">
		<?php
		/* translators: %s documentation URL */
		echo wp_kses_post( sprintf( __( 'Sign up to <a href="%s" target="_blank">DeepSeek</a> to generate your API key.', 'wp-seopress-pro' ), esc_url( 'https://platform.deepseek.com/api_keys' ) ) );
		?>
	</p>

	<?php
	$api_key = seopress_pro_get_service( 'Usage' )->getLicenseKey( 'deepseek' );

	if ( defined( 'SEOPRESS_DEEPSEEK_KEY' ) && ! empty( SEOPRESS_DEEPSEEK_KEY ) && is_string( SEOPRESS_DEEPSEEK_KEY ) ) {
		?>
		<p class="seopress-notice"><?php esc_html_e( 'Your DeepSeek key is defined in wp-config.php.', 'wp-seopress-pro' ); ?></p>
	<?php } ?>

	<p>
		<button type="button" id="seopress-deepseek-check-license" class="btn btnTertiary">
			<?php esc_html_e( 'Test API Key', 'wp-seopress-pro' ); ?>
		</button>
		<span class="spinner" style="float: none; margin-left: 10px;"></span>
	</p>
	<div id="seopress-deepseek-check-license-log" style="display: none; margin-top: 10px;"></div>
	<?php
}

/**
 * DeepSeek model callback.
 *
 * @return void
 */
function seopress_ai_deepseek_model_callback() {
	$selected = seopress_pro_get_service( 'OptionPro' )->getAIDeepSeekModel() ?: 'deepseek-chat'; // phpcs:ignore
	?>

	<select id="seopress_ai_deepseek_model" name="seopress_pro_option_name[seopress_ai_deepseek_model]">
		<?php
		$models = array(
			'deepseek-chat' => __( 'DeepSeek Chat (recommended)', 'wp-seopress-pro' ),
		);

		if ( ! empty( $models ) ) {
			foreach ( $models as $key => $model ) {
				?>
				<option
				<?php
				if ( esc_attr( $key ) == $selected ) {
					?>
					selected="selected" <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $model ); ?>
				</option>
				<?php
			}
		}
		?>
	</select>

	<p class="description">
		<?php esc_html_e( 'Select your DeepSeek model.', 'wp-seopress-pro' ); ?>
	</p>

	<p class="seopress-notice">
		<?php esc_html_e( 'DeepSeek does not support alt text generation.', 'wp-seopress-pro' ); ?>
	</p>

	<?php
	if ( isset( $options['seopress_ai_deepseek_model'] ) ) {
		esc_attr( $options['seopress_ai_deepseek_model'] );
	}
}

/**
 * Gemini API key callback.
 *
 * @return void
 */
function seopress_ai_gemini_api_key_callback() {
	$docs = seopress_get_docs_links();

	$api_key = seopress_pro_get_service( 'OptionPro' )->getAIGeminiApiKey();

	// Show placeholder if key exists, otherwise show empty field.
	$display_value = ! empty( $api_key ) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : '';

	printf( '<input id="seopress_ai_gemini_api_key" type="text" name="seopress_pro_option_name[seopress_ai_gemini_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" placeholder="%s" aria-label="' . esc_html__( 'Gemini API key', 'wp-seopress-pro' ) . '"/>', esc_attr( $display_value ), esc_attr__( 'Enter your Gemini API key', 'wp-seopress-pro' ) );
	?>
	<p class="description">
		<?php
		/* translators: %s documentation URL */
		echo wp_kses_post( sprintf( __( 'Sign up to <a href="%s" target="_blank">Google AI Studio</a> to generate your API key.', 'wp-seopress-pro' ), esc_url( 'https://aistudio.google.com/apikey' ) ) );
		?>
	</p>

	<?php
	$api_key = seopress_pro_get_service( 'Usage' )->getLicenseKey( 'gemini' );

	if ( defined( 'SEOPRESS_GEMINI_KEY' ) && ! empty( SEOPRESS_GEMINI_KEY ) && is_string( SEOPRESS_GEMINI_KEY ) ) {
		?>
		<p class="seopress-notice"><?php esc_html_e( 'Your Gemini key is defined in wp-config.php.', 'wp-seopress-pro' ); ?></p>
	<?php } ?>

	<p>
		<button type="button" id="seopress-gemini-check-license" class="btn btnTertiary">
			<?php esc_html_e( 'Test API Key', 'wp-seopress-pro' ); ?>
		</button>
		<span class="spinner" style="float: none; margin-left: 10px;"></span>
	</p>
	<div id="seopress-gemini-check-license-log" style="display: none; margin-top: 10px;"></div>
	<?php
}

/**
 * Gemini model callback.
 *
 * @return void
 */
function seopress_ai_gemini_model_callback() {
	$selected = seopress_pro_get_service( 'OptionPro' )->getAIGeminiModel() ?: 'gemini-2.0-flash'; // phpcs:ignore
	?>

	<select id="seopress_ai_gemini_model" name="seopress_pro_option_name[seopress_ai_gemini_model]">
		<?php
		$models = array(
			'gemini-2.0-flash'     => __( 'Gemini 2.0 Flash (recommended)', 'wp-seopress-pro' ),
			'gemini-2.0-flash-exp' => __( 'Gemini 2.0 Flash Experimental', 'wp-seopress-pro' ),
			'gemini-1.5-pro'       => __( 'Gemini 1.5 Pro', 'wp-seopress-pro' ),
			'gemini-1.5-flash'     => __( 'Gemini 1.5 Flash', 'wp-seopress-pro' ),
		);

		if ( ! empty( $models ) ) {
			foreach ( $models as $key => $model ) {
				?>
				<option
				<?php
				if ( esc_attr( $key ) == $selected ) {
					?>
					selected="selected" <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $model ); ?>
				</option>
				<?php
			}
		}
		?>
	</select>

	<p class="description">
		<?php esc_html_e( 'Select your Gemini model. Gemini 1.5 Flash is recommended for fast and efficient generation.', 'wp-seopress-pro' ); ?>
	</p>

	<?php
	if ( isset( $options['seopress_ai_gemini_model'] ) ) {
		esc_attr( $options['seopress_ai_gemini_model'] );
	}
}

/**
 * Mistral API key callback.
 *
 * @return void
 */
function seopress_ai_mistral_api_key_callback() {
	$docs = seopress_get_docs_links();

	$api_key = seopress_pro_get_service( 'OptionPro' )->getAIMistralApiKey();

	// Show placeholder if key exists, otherwise show empty field.
	$display_value = ! empty( $api_key ) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : '';

	printf( '<input id="seopress_ai_mistral_api_key" type="text" name="seopress_pro_option_name[seopress_ai_mistral_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" placeholder="%s" aria-label="' . esc_html__( 'Mistral API key', 'wp-seopress-pro' ) . '"/>', esc_attr( $display_value ), esc_attr__( 'Enter your Mistral API key', 'wp-seopress-pro' ) );
	?>
	<p class="description">
		<?php
		/* translators: %s documentation URL */
		echo wp_kses_post( sprintf( __( 'Sign up to <a href="%s" target="_blank">Mistral Console</a> to generate your API key. Mistral AI is a French company, GDPR compliant, with all data processed in the EU.', 'wp-seopress-pro' ), esc_url( 'https://console.mistral.ai/api-keys' ) ) );
		?>
	</p>

	<?php
	$api_key = seopress_pro_get_service( 'Usage' )->getLicenseKey( 'mistral' );

	if ( defined( 'SEOPRESS_MISTRAL_KEY' ) && ! empty( SEOPRESS_MISTRAL_KEY ) && is_string( SEOPRESS_MISTRAL_KEY ) ) {
		?>
		<p class="seopress-notice"><?php esc_html_e( 'Your Mistral key is defined in wp-config.php.', 'wp-seopress-pro' ); ?></p>
	<?php } ?>

	<p>
		<button type="button" id="seopress-mistral-check-license" class="btn btnTertiary">
			<?php esc_html_e( 'Test API Key', 'wp-seopress-pro' ); ?>
		</button>
		<span class="spinner" style="float: none; margin-left: 10px;"></span>
	</p>
	<div id="seopress-mistral-check-license-log" style="display: none; margin-top: 10px;"></div>
	<?php
}

/**
 * Mistral model callback.
 *
 * @return void
 */
function seopress_ai_mistral_model_callback() {
	$selected = seopress_pro_get_service( 'OptionPro' )->getAIMistralModel() ?: 'mistral-small-latest'; // phpcs:ignore
	?>

	<select id="seopress_ai_mistral_model" name="seopress_pro_option_name[seopress_ai_mistral_model]">
		<?php
		$models = array(
			'mistral-small-latest' => __( 'Mistral Small (recommended)', 'wp-seopress-pro' ),
			'mistral-large-latest' => __( 'Mistral Large', 'wp-seopress-pro' ),
			'pixtral-large-latest' => __( 'Pixtral Large (vision)', 'wp-seopress-pro' ),
			'pixtral-12b-2409'     => __( 'Pixtral 12B (vision)', 'wp-seopress-pro' ),
		);

		if ( ! empty( $models ) ) {
			foreach ( $models as $key => $model ) {
				?>
				<option
				<?php
				if ( esc_attr( $key ) == $selected ) {
					?>
					selected="selected" <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $model ); ?>
				</option>
				<?php
			}
		}
		?>
	</select>

	<p class="description">
		<?php esc_html_e( 'Select your Mistral model. Pixtral models support image analysis for alt text generation.', 'wp-seopress-pro' ); ?>
	</p>

	<?php
	if ( isset( $options['seopress_ai_mistral_model'] ) ) {
		esc_attr( $options['seopress_ai_mistral_model'] );
	}
}

/**
 * Claude API key callback.
 *
 * @return void
 */
function seopress_ai_claude_api_key_callback() {
	$docs = seopress_get_docs_links();

	$api_key = seopress_pro_get_service( 'OptionPro' )->getAIClaudeApiKey();

	// Show placeholder if key exists, otherwise show empty field.
	$display_value = ! empty( $api_key ) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : '';

	printf( '<input id="seopress_ai_claude_api_key" type="text" name="seopress_pro_option_name[seopress_ai_claude_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" placeholder="%s" aria-label="' . esc_html__( 'Claude API key', 'wp-seopress-pro' ) . '"/>', esc_attr( $display_value ), esc_attr__( 'Enter your Claude API key', 'wp-seopress-pro' ) );
	?>
	<p class="description">
		<?php
		/* translators: %s documentation URL */
		echo wp_kses_post( sprintf( __( 'Sign up to <a href="%s" target="_blank">Anthropic Console</a> to generate your API key.', 'wp-seopress-pro' ), esc_url( 'https://console.anthropic.com/settings/keys' ) ) );
		?>
	</p>

	<?php
	$api_key = seopress_pro_get_service( 'Usage' )->getLicenseKey( 'claude' );

	if ( defined( 'SEOPRESS_CLAUDE_KEY' ) && ! empty( SEOPRESS_CLAUDE_KEY ) && is_string( SEOPRESS_CLAUDE_KEY ) ) {
		?>
		<p class="seopress-notice"><?php esc_html_e( 'Your Claude key is defined in wp-config.php.', 'wp-seopress-pro' ); ?></p>
	<?php } ?>

	<p>
		<button type="button" id="seopress-claude-check-license" class="btn btnTertiary">
			<?php esc_html_e( 'Test API Key', 'wp-seopress-pro' ); ?>
		</button>
		<span class="spinner" style="float: none; margin-left: 10px;"></span>
	</p>
	<div id="seopress-claude-check-license-log" style="display: none; margin-top: 10px;"></div>
	<?php
}

/**
 * Claude model callback.
 *
 * @return void
 */
function seopress_ai_claude_model_callback() {
	$selected = seopress_pro_get_service( 'OptionPro' )->getAIClaudeModel() ?: 'claude-sonnet-4-20250514'; // phpcs:ignore
	?>

	<select id="seopress_ai_claude_model" name="seopress_pro_option_name[seopress_ai_claude_model]">
		<?php
		$models = array(
			'claude-sonnet-4-20250514'  => __( 'Claude Sonnet 4 (recommended)', 'wp-seopress-pro' ),
			'claude-3-5-haiku-20241022' => __( 'Claude 3.5 Haiku (fast)', 'wp-seopress-pro' ),
		);

		if ( ! empty( $models ) ) {
			foreach ( $models as $key => $model ) {
				?>
				<option
				<?php
				if ( esc_attr( $key ) == $selected ) {
					?>
					selected="selected" <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $model ); ?>
				</option>
				<?php
			}
		}
		?>
	</select>

	<p class="description">
		<?php esc_html_e( 'Select your Claude model. Claude Sonnet 4 offers the best balance of performance and cost.', 'wp-seopress-pro' ); ?>
	</p>

	<?php
	if ( isset( $options['seopress_ai_claude_model'] ) ) {
		esc_attr( $options['seopress_ai_claude_model'] );
	}
}

/**
 * Open AI alt text callback.
 *
 * @return void
 */
function seopress_ai_openai_alt_text_callback() {
	$check = seopress_pro_get_service( 'OptionPro' )->getAIOpenaiAltText();
	?>

	<label for="seopress_ai_openai_alt_text">
		<input id="seopress_ai_openai_alt_text" name="seopress_pro_option_name[seopress_ai_openai_alt_text]" type="checkbox"
		<?php
		if ( '1' == $check ) {
			?>
			checked="yes" <?php } ?> value="1" />

		<?php esc_html_e( 'When uploading an image file, automatically set the alternative text using AI', 'wp-seopress-pro' ); ?>
	</label>

	<p class="description">
		<?php esc_html_e( 'This may slow down the image upload.', 'wp-seopress-pro' ); ?>
	</p>

	<?php
	if ( isset( $options['seopress_ai_openai_alt_text'] ) ) {
		esc_attr( $options['seopress_ai_openai_alt_text'] );
	}
}

/**
 * AI logs callback.
 *
 * @return void
 */
function seopress_print_section_info_ai_logs() {
	?>
	<hr>
	<h3 id="seopress-ai-logs">
		<?php esc_html_e( 'AI Logs', 'wp-seopress-pro' ); ?>
	</h3>

	<p><?php esc_html_e( 'Below is the latest error message obtained from the AI API:', 'wp-seopress-pro' ); ?></p>

	<?php
	// Logs.
	$logs = get_transient( 'seopress_pro_ai_logs' ) ? json_decode( get_transient( 'seopress_pro_ai_logs' ), true ) : '';

	echo '<pre style="width: 100%">';
	if ( is_array( $logs ) && ! empty( $logs['error'] ) ) {
		foreach ( $logs['error'] as $key => $value ) {
			echo esc_html( $key ) . ' => ' . esc_html( $value ) . '<br>';
		}
		?>
		<?php
	} else {
		esc_html_e( 'Currently no errors logged.', 'wp-seopress-pro' );
	}
	echo '</pre>';
}
