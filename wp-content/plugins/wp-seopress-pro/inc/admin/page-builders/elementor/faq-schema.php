<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * SEOPress PRO FAQ Schema.
 *
 * @package SEOPress PRO
 * @subpackage Elementor
 */

namespace SEOPressElementorFAQScheme;

defined( 'ABSPATH' ) || exit( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Class FAQ_Schema
 *
 * Main FAQ Schema class
 */
class FAQ_Schema {

	/**
	 * Structured data value
	 *
	 * @var string
	 */
	private $structured_data_enabled;

	/**
	 * Instance
	 *
	 * @access private
	 * @static
	 *
	 * @var FAQ_Schema The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @access public
	 *
	 * @return FAQ_Schema An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$seopress_get_toggle_rich_snippets_option = get_option( 'seopress_toggle' );
		$this->structured_data_enabled            = isset( $seopress_get_toggle_rich_snippets_option['toggle-rich-snippets'] ) ? $seopress_get_toggle_rich_snippets_option['toggle-rich-snippets'] : '0';

		add_filter( 'elementor/widget/render_content', array( $this, 'add_faq_json_ld_schema' ), 10, 2 );
		add_action( 'elementor/element/before_section_end', array( $this, 'add_faq_enable_option' ), 10, 3 );
	}

	/**
	 * Add FAQ JSON-LD Schema for the Toggle and Accordion Widget
	 *
	 * @param   string                 $content Content.
	 * @param   \Elementor\Widget_Base $widget Widget.
	 *
	 * @return  string Content.
	 */
	public function add_faq_json_ld_schema( $content, $widget ) {
		if ( '0' == $this->structured_data_enabled || ( ! $widget instanceof \Elementor\Widget_Toggle && ! $widget instanceof \Elementor\Widget_Accordion ) ) {
			return $content;
		}

		$show_faq = $widget->get_settings( 'show_faq_schema' );

		if ( 'yes' !== $show_faq ) {
			return $content;
		}

		$tabs = $widget->get_settings( 'tabs' );

		if ( ! empty( $tabs ) ) {
			$entities = array();
			foreach ( $tabs as $tab ) {
				$entity     = array(
					'@type'          => 'Question',
					'name'           => $tab['tab_title'],
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $tab['tab_content'],
					),
				);
				$entities[] = $entity;
			}

			$schema = '<script type="application/ld+json">
				{
				"@context": "https://schema.org",
				"@type": "FAQPage",
				"mainEntity": ' . wp_json_encode( $entities ) . '
				}
			</script>';

			return $content . apply_filters( 'seopress_schemas_faq_html', $schema );
		}

		return $content;
	}

	/**
	 * Extend Toggle and Accordion widget with option to enable / disable option for show FAQ JSON-LD Schema
	 *
	 * @param   \WP_Base $element Element.
	 * @param   string   $section_id Section ID.
	 * @param   array    $args Args.
	 *
	 * @return  void Void.
	 */
	public function add_faq_enable_option( $element, $section_id, $args ) {
		if ( '0' == $this->structured_data_enabled ) {
			return;
		}

		if (
			( $element->get_name() === 'toggle' && 'section_toggle' === $section_id ) ||
			( $element->get_name() === 'accordion' && 'section_title' === $section_id ) ) {
			$element->add_control(
				'show_faq_schema',
				array(
					'label' => __( 'Enable FAQ Schema', 'wp-seopress-pro' ),
					'type'  => \Elementor\Controls_Manager::SWITCHER,
				)
			);
		}
	}
}
// Instantiate FAQ Schema Class.
FAQ_Schema::instance();
