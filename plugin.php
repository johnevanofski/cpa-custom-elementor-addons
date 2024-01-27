<?php
namespace Elementor_Addon;

final class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \Elementor_Addon\Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \Elementor_Addon\Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {
		add_action( 'elementor/init', [ $this, 'init' ] );
	}

	public function register_styles() {
		wp_register_style( 'styles', plugins_url( 'assets/css/styles.css', __FILE__ ) );
	
		wp_enqueue_style( 'styles' );
	}

	public function register_scripts() {
		wp_register_script( 'plotly', plugins_url( 'assets\vendor\plotly-2.27.0.min.js', __FILE__ ));
		wp_register_script( 'johnee_script',  plugins_url( 'assets\js\script.js', __FILE__ ), ['plotly'], null, array('in_footer' => true, 'strategy' => 'defer'));

		wp_enqueue_script('plotly');
		wp_enqueue_script('johnee_script');
	}

	public function register_widgets( $widgets_manager ) {
		require_once( __DIR__ . '/widgets/power-sunburst.php' );
		require_once( __DIR__ . '/widgets/svg-painter.php' );

		$widgets_manager->register( new \Power_Sunburst_Widget() );
		$widgets_manager->register( new \SVG_Painter_Widget() );
	}

	public function add_category( $elements_manager ) {
		$elements_manager->add_category(
			'johnee-addons',
			[
				'title' => esc_html__( 'Johnee\'s Addons', 'johnee-addons' ),
                'icon' => 'fa fa-plug'
			]
		);
	}

	public function init() {
		add_action( 'elementor/elements/categories_registered', [$this, 'add_category'] );
		add_action( 'elementor/widgets/register', [$this, 'register_widgets'] );
		add_action( 'elementor/frontend/after_register_scripts', [$this, 'register_scripts'] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_styles' ] );
	}

}

Plugin::instance();