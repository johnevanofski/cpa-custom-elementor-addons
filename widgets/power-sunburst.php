<?php
class Power_Sunburst_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'power_sunburst';
	}

	public function get_title() {
		return esc_html__( 'Power Sunburst', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'johnee-addons' ];
	}

	public function get_keywords() {
		return [ 'power', 'sunburst' ];
	}

    protected function register_controls() {
			// Content Tab Start

				// Title Section

				$this->start_controls_section(
						'section_content',
						[
							'label' => esc_html__( 'Content', 'textdomain' ),
							'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
						]
				);

					$this->add_control(
							'title',
							[
								'label' => esc_html__( 'Chart Title', 'textdomain' ),
								'type' => \Elementor\Controls_Manager::TEXT,
								'default' => esc_html__( 'Power Sunburst', 'textdomain' ),
							]
					);

				// $this->add_control(
				// 	'custom_panel_alert',
				// 	[
				// 		'type' => \Elementor\Controls_Manager::ALERT,
				// 		'alert_type' => 'warning',
				// 		'heading' => esc_html__( 'Maths', 'textdomain' ),
				// 		'content' => esc_html__( 'Totals for the Renewables and Non-Renewables should add up to 100 or less, otherwise the chart will not work correctly', 'textdomain' ),
				// 	]
				// );

				// Renewables Section

				$this->add_control(
					'renewables',
					[
						'label' => esc_html__( 'Renewables', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);


				$this->add_control(
					'biomass',
					[
						'label' => esc_html__( 'Biomass & Biowaste', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'geothermal',
					[
						'label' => esc_html__( 'Geothermal', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'ehydro',
					[
						'label' => esc_html__( 'Eligible Hydroelectric', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'solar',
					[
						'label' => esc_html__( 'Solar', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'wind',
					[
						'label' => esc_html__( 'Wind', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				// Non-Renewables Section

				$this->add_control(
					'non-renewables',
					[
						'label' => esc_html__( 'Non-Renewables', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);

				$this->add_control(
					'coal',
					[
						'label' => esc_html__( 'Coal', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'lhydro',
					[
						'label' => esc_html__( 'Large Hydroelectric', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'gas',
					[
						'label' => esc_html__( 'Natural Gas', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'nuclear',
					[
						'label' => esc_html__( 'Nuclear', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

				$this->add_control(
					'unspec',
					[
						'label' => esc_html__( 'Unspecified', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => '%',
							'size' => 0,
						],
					]
				);

			$this->end_controls_section();

			// Options

			$this->start_controls_section(
				'section_options',
				[
					'label' => esc_html__( 'Options', 'textdomain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'show_hoverinfo',
				[
					'label' => esc_html__( 'Show Tooltip', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'textdomain' ),
					'label_off' => esc_html__( 'Hide', 'textdomain' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'hovertemplate',
				[
					'label' => esc_html__( 'Tooltip Format', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '%{value}% %{label}<extra></extra>',
					'condition' => [
						'show_hoverinfo' => 'yes',
					],
				]
			);

			$this->add_control(
				'hoverinfo_note',
				[
					'label' => esc_html__( 'Note', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => 'You can find formatting options for the Tooltip in the <a href="https://plotly.com/javascript/reference/sunburst/#sunburst-hovertemplate" target=_blank>Plotly documentation here.</a>',
					'content_classes' => 'your-class',
					'condition' => [
						'show_hoverinfo' => 'yes',
					],
				]
			);
			

			$this->end_controls_section();

		// Style Tab Start

		$this->start_controls_section(
			'section_colors',
			[
				'label' => esc_html__( 'Colors', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'color_1',
				[
					'label' => esc_html__( 'Sunburst Color 1', 'textdomain' ),
					'default' => '#017973',
					'type' => \Elementor\Controls_Manager::COLOR,
				]
			);

			$this->add_control(
				'color_2',
				[
					'label' => esc_html__( 'Sunburst Color 2', 'textdomain' ),
					'default' => 'gray',
					'type' => \Elementor\Controls_Manager::COLOR,
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_text',
			[
				'label' => esc_html__( 'Text Styles', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'insidetext_size',
			[
				'label' => esc_html__( 'Radials Text Size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
			]
		);

		$this->add_control(
			'insidetext_orientation',
			[
				'label' => esc_html__( 'Radials Text Orientation', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'horizontal' => esc_html__( 'Horizontal', 'textdomain' ),
					'radial'  => esc_html__( 'Radial', 'textdomain' ),
					'tangential' => esc_html__( 'Tangential', 'textdomain' ),
					'auto' => esc_html__( 'Auto', 'textdomain' ),
				]
			]
		);

		$this->add_control(
			'outsidetext_size',
			[
				'label' => esc_html__( 'Title Text Size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
			]
		);

		$this->add_control(
			'outsidetext_color',
			[
				'label' => esc_html__( 'Title Text Color', 'textdomain' ),
				'default' => '#333',
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->end_controls_section();

		// Style Tab End
    }

	protected function render() {
		$settings = $this->get_settings_for_display();

		$total_renewable = 
			$settings['biomass']['size'] + 
			$settings['geothermal']['size'] +
			$settings['ehydro']['size'] +
			$settings['solar']['size'] +
			$settings['wind']['size'];

		$total_non = 
			$settings['coal']['size'] + 
			$settings['gas']['size'] +
			$settings['lhydro']['size'] +
			$settings['nuclear']['size'] +
			$settings['unspec']['size'];

		$total = $total_renewable + $total_non;

		$opts = array(
			'title' => $settings['title'],
			'renewable_biomass' => $settings['biomass']['size'],
			'renewable_geothermal' => $settings['geothermal']['size'],
			'renewable_ehydro' => $settings['ehydro']['size'],
			'renewable_solar' => $settings['solar']['size'],
			'renewable_wind' => $settings['wind']['size'],
			'non_coal' => $settings['coal']['size'],
			'non_gas' => $settings['gas']['size'],
			'non_lhydro' => $settings['lhydro']['size'],
			'non_nuclear' => $settings['nuclear']['size'],
			'non_unspec' => $settings['unspec']['size'],
			'total_renewable' => $total_renewable,
			'total_non' => $total_non,
			'total' => $total,
			'show_hoverinfo' => $settings['show_hoverinfo'],
			'hovertemplate' => $settings['hovertemplate'],
			'color_1' => $settings['color_1'],
			'color_2' => $settings['color_2'],
			'insidetext_size' => $settings['insidetext_size']['size'],
			'insidetext_orientation' => $settings['insidetext_orientation'],
			'outsidetext_size' => $settings['outsidetext_size']['size'],
			'outsidetext_color' => $settings['outsidetext_color']
		);

		$data_attr = '';

		foreach ($opts as $key => $value) {
  		$data_attr .= ' data-' . $key . '="' . esc_attr( $value ) . '"';
  	}

		?>
		<div>
			<div class="sunburst-chart" <?= $data_attr ?>></div>
		</div>
		<?php
	}
}