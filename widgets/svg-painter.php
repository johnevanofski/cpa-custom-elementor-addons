<?php
class SVG_Painter_Widget extends \Elementor\Widget_Base {

	private function id() {
		return uniqid('svgp-');
	}

	public function get_name() {
		return 'svg_painter';
	}

	public function get_title() {
		return esc_html__( 'SVG Painter', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'johnee-addons' ];
	}

	public function get_keywords() {
		return [ 'svg', 'painter' ];
	}

	protected function register_controls() {
		$default_svg = '<?xml version="1.0" encoding="UTF-8"?>
		<svg width="284px" height="232px" viewBox="0 0 284 232" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g stroke-linecap="round" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<g transform="translate(-622.000000, -218.000000)" stroke="#979797" stroke-width="5">
					<g transform="translate(625.083771, 221.467143)">
						<path d="M137.349332,225.206577 L0,225.206577 C8.19716457,158.845548 26.0658272,113.24783 53.6059878,88.4134237 C81.1461485,63.5790174 115.925801,44.4677497 157.944946,31.0796206 C160.487263,10.3598735 172.211034,0 193.116258,0 C214.021482,0 224.802799,11.1562447 225.460207,33.4687341 C240.045847,35.8047463 250.729652,38.177429 257.511625,40.5867823 C267.684583,44.2008123 276.152588,44.2008123 277.952641,54.5361318 C279.752695,64.8714514 268.300509,84.029936 252.288431,100.32151 C241.613711,111.18256 221.889654,124.07126 193.116258,138.98761 C195.327093,187.785214 197.675536,214.289176 200.161586,218.499497 C202.647636,222.709817 213.827526,224.278844 233.701256,223.206577" id="Path-2"></path>
						<path d="M3,223.206577 C16.0504804,184.066325 36.2583962,151.729857 63.6237472,126.197174 C104.671774,87.8981492 145.382719,93.1753191 154.218563,116.0712 C158.615394,127.464488 147.457167,164.396628 97.9162288,193.003057 C82.6110243,201.840743 50.9722814,211.908583 3,223.206577 Z" id="Path-3"></path>
					</g>
				</g>
			</g>
		</svg>';

		// SVG Information

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'SVG Information', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Important Note', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'In order for the animation to work properly the svg uploaded must include at least one path to be animated. Not currently working for other SVG animations.', 'textdomain' ),
			]
		);

		$this->add_control(
			'aria_label',
			[
				'label' => esc_html__( 'Screenreader Text (aria-label)', 'textdomain' ),
				'description' => esc_html__('Optional. Only create an aria-label if the information provided by the SVG is necessary to understanding the context, for instance if it\'s an animated text path.'),
				'default' => '',
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'svg_code',
			[
				'label' => esc_html__( 'SVG Code', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'rows' => 20,
				'language' => 'html',
				'default' => $default_svg,
			]
		);

		$this->end_controls_section();

		// Animation

		$this->start_controls_section(
			'section_animation',
			[
				'label' => esc_html__( 'Animation', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'transition_duration',
			[
				'label' => esc_html__( 'Transition Duration (seconds)', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['seconds'],
				'range' => [
					'seconds' => [
						'min' => 0,
						'max' => 10,
						'step' => 0.1
					],
				],
				'default' => [
					'unit' => 'seconds',
					'size' => 2,
				],
			]
		);

		$this->end_controls_section();

		// Styles Content

		$this->start_controls_section(
			'section_dropshadow',
			[
				'label' => esc_html__( 'Drop Shadow or Glow', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'dropshadow_enabled',
			[
				'label' => esc_html__( 'Drop Shadow', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'true',
				'default' => '',
			]
		);

		$this->add_control(
			'dropshadow_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'default' => '',
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'dropshadow_h',
			[
				'label' => esc_html__( 'Horizontal Offset', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
			]
		);

		$this->add_control(
			'dropshadow_v',
			[
				'label' => esc_html__( 'Vertical Offset', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
			]
		);

		$this->add_control(
			'dropshadow_b',
			[
				'label' => esc_html__( 'Blur', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_dropshadow',
			[
				'label' => esc_html__( 'Overrides', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'recolor',
			[
				'label' => esc_html__( 'Recolor SVG Paths', 'textdomain' ),
				'default' => '',
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->end_controls_section();
	}

    protected function render() {
		$settings = $this->get_settings_for_display();

		$svg = $settings['svg_code'];
		$recolor = $settings['recolor'];
		$aria_label = $settings['aria_label'];
		$transition_duration = $settings['transition_duration']['size'];

		$dropshadow_opts = array(
			'enabled' => $settings['dropshadow_enabled'],
			'color' => $settings['dropshadow_color'],
			'horizontal_offset' => $settings['dropshadow_h']['size'],
			'vertical_offset' => $settings['dropshadow_v']['size'],
			'blur' => $settings['dropshadow_b']['size'],
		);

        ?>
			<style>
				.svgp_container svg {
					max-width: 100%;
					overflow: visible;
				}
				.svgp_container svg path {
					<?= $recolor ? 'stroke: ' . $recolor . ';' : '' ?>
					opacity: 0;
					<?= $dropshadow_opts['enabled'] ? 'filter: drop-shadow(
						'. $dropshadow_opts['horizontal_offset'].'px
						'. $dropshadow_opts['vertical_offset'].'px
						'. $dropshadow_opts['blur'].'px
						'. $dropshadow_opts['color'].'
					);' : '' ?>
				}
			</style>
            <div 
				<?= $aria_label ? 'aria-label=' . $aria_label : '' ?>
				class="svgp_container" id="<?= $this->id() ?>"
				data-transition-duration="<?= $transition_duration ?>"
			>
				<?= html_entity_decode($svg) ?>
			</div>
        <?php
    }
}