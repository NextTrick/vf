<?php
/**
 * Construct theme customizer
 *
 * @package Construct
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Construct_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {
		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( ! isset( $this->config['fields'][$name] ) ) {
			return false;
		}

		$default = isset( $this->config['fields'][$name]['default'] ) ? $this->config['fields'][$name]['default'] : false;

		return get_theme_mod( $name, $default );
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function construct_get_option( $name ) {
	global $construct_customize;

	if ( empty( $construct_customize ) ) {
		return false;
	}

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( $construct_customize->get_theme(), $name );
	} else {
		$value = $construct_customize->get_option( $name );
	}

	return apply_filters( 'construct_get_option', $value, $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function construct_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}

add_action( 'customize_register', 'construct_customize_modify' );

/**
 * Customizer configuration
 */
$construct_customize = new Construct_Customize(
	array(
		'theme'    => 'construct',

		'panels'   => array(
			'general' => array(
				'priority' => 10,
				'title'    => esc_html__( 'General', 'construct' ),
			),
			'header'  => array(
				'priority' => 11,
				'title'    => esc_html__( 'Header', 'construct' ),
			),
			'socials'  => array(
				'priority' => 210,
				'title'    => esc_html__( 'Socials', 'construct' ),
			),
		),

		'sections' => array(

			// Panel Header
			'top_header'      => array(
				'title'       => esc_html__( 'Top Header', 'construct' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'header'      => array(
				'title'       => esc_html__( 'Navigation', 'construct' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			
			'logo'        => array(
				'title'       => esc_html__( 'Site Logo', 'construct' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),	

			'page_header'      => array(
				'title'       => esc_html__( 'Page Header', 'construct' ),
				'description' => '',
				'priority'    => 100,
				'capability'  => 'edit_theme_options',
			),

			
			
			// Panel Content
			'content'     => array(
				'title'       => esc_html__( 'Blog', 'construct' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
			),	

			// Panel Shop
			'shop'     => array(
				'title'       => esc_html__( 'Shop', 'construct' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
			),

			// Panel Footer
			'footer'     => array(
				'title'       => esc_html__( 'Footer', 'construct' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
			),			

			// Coming Soon
			'csoon'     => array(
				'title'       => esc_html__( 'Coming Soon', 'construct' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
			),

			// Panel Styling
			'styling'     => array(
				'title'       => esc_html__( 'Miscellaneous', 'construct' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
			),
		),

		'fields'   => array(
			
			//Top Header
			'top_header' => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Enable Top Header', 'construct' ),
				'section'  => 'top_header',
				'default'  => '1',
				'priority' => 10,
			),
			'bg_top'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background', 'construct' ),
				'section'  => 'top_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'top_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_top'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text', 'construct' ),
				'section'  => 'top_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'top_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'top_info'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Top Infomation', 'construct' ),
				'section'  => 'top_header',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon Class', 'construct' ),
						'description' => esc_html__( 'This will be the icon: http://fontawesome.io/icons/', 'construct' ),
						'default'     => '',
					),
					'details' => array(
						'type'        => 'textarea',
						'label'       => esc_html__( 'Details', 'construct' ),
						'description' => esc_html__( 'This will be the details', 'construct' ),
						'default'     => '',
					),
				),
				'active_callback' => array(
					array(
					  	'setting'  => 'top_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials', 'construct' ),
				'section'  => 'top_header',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon Class', 'construct' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'construct' ),
						'default'     => '',
					),
					'link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link URL', 'construct' ),
						'description' => esc_html__( 'This will be the social link', 'construct' ),
						'default'     => '',
					),
				),
				'active_callback' => array(
					array(
					  	'setting'  => 'top_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			

			// Header layout
			'header_layout'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Header Style', 'construct' ),
				'section'  => 'header',
				'default'  => '1',
				'priority' => 10,
				'choices'  => array(
					'1' 	=> esc_html__( 'Header Solid', 'construct' ),
					'2' 	=> esc_html__( 'Header Transparent', 'construct' ),
				),
			),
			'custom_menu'     => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Custom Header', 'construct' ),
				'section'  => 'header',
				'default'  => '0',
				'priority' => 10,
			),
			'bg_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Header', 'construct' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'custom_menu',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Header', 'construct' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'custom_menu',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			
			'sticky'     => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Sticky Header', 'construct' ),
				'section'  => 'header',
				'default'  => '1',
				'priority' => 10,
			),
			'bg_menu_scroll'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Header Scroll', 'construct' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'sticky',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_menu_scroll'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Header Scroll', 'construct' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'sticky',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'search_btn'     => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Search Button', 'construct' ),
				'section'  => 'header',
				'default'  => '1',
				'priority' => 10,
			),
			'cart_btn'     => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Cart Button', 'construct' ),
				'section'  => 'header',
				'default'  => '1',
				'priority' => 10,
			),
			
			// Page header
			'header_title' => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Page Header', 'construct' ),
				'section'  => 'page_header',
				'default'  => '1',
				'priority' => 10,
			),
			'breadcrumb'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Breadcrumb', 'construct' ),
				'description' => esc_html__( 'Enable to show a breadcrumb on the page header', 'construct' ),
				'section'     => 'page_header',
				'default'     => '1',
				'priority'    => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'header_title',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'subheader'		=> array(
				'type'     => 'image',
				'label'    => esc_html__( 'Background Subheader', 'construct' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'header_title',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'bg_title'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color', 'construct' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'header_title',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_title'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text', 'construct' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'header_title',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'title_padding_t'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Padding Top', 'construct' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'header_title',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'title_padding_b'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Padding Bottom', 'construct' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'header_title',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			

			// Logo
			'logo'           => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo', 'construct' ),
				'section'  => 'logo',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/img/logo.png',
				'priority' => 10,
			),
			'logo_trans'   => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo Transparent Header', 'construct' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width', 'construct' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height', 'construct' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_position'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Margin', 'construct' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '0',
					'bottom' => '0',
					'left'   => '0',
					'right'  => '0',
				),
			),
						
			// Content
			'blog_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Blog List Layout', 'construct' ),
				'section'  => 'content',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'left-bar' 	=> get_template_directory_uri() . '/framework/admin/images/left.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'post_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Single Blog Layout', 'construct' ),
				'section'  => 'content',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'left-bar' 	=> get_template_directory_uri() . '/framework/admin/images/left.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'title_single' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Title Header Single', 'hosted' ),
				'section' 		=> 'content',
				'default' 		=> '',
				'priority'    	=> 12,
			),
			'excerpt_length' => array(
				'type'    	=> 'number',
				'label'   	=> esc_html__( 'Excerpt Length', 'construct' ),
				'section' 	=> 'content',
				'default' 	=> 50,
				'priority' 	=> 12,
				'choices' 	=> array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),
			'readmore_btn' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Read More Button Text', 'construct' ),
				'section' 		=> 'content',
				'default' 		=> 'Read More',
				'priority'    	=> 12,				
			),

			'share_btn'      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Share Button', 'construct' ),
				'section'     => 'content',
				'default'     => '1',
				'priority'    => 13,
			),
			'facebook_btn'      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Facebook Button Share', 'construct' ),
				'section'     => 'content',
				'default'     => '1',
				'priority'    => 13,
				'active_callback' => array(
					array(
					  	'setting'  => 'share_btn',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'twitter_btn'      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Twitter Button Share', 'construct' ),
				'section'     => 'content',
				'default'     => '1',
				'priority'    => 13,
				'active_callback' => array(
					array(
					  	'setting'  => 'share_btn',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'google_btn'      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Google Plus Button Share', 'construct' ),
				'section'     => 'content',
				'default'     => '1',
				'priority'    => 13,
				'active_callback' => array(
					array(
					  	'setting'  => 'share_btn',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'linkedin_btn'      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Linkedin Button Share', 'construct' ),
				'section'     => 'content',
				'default'     => '1',
				'priority'    => 13,
				'active_callback' => array(
					array(
					  	'setting'  => 'share_btn',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'pinterest_btn'      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Pinterest Button Share', 'construct' ),
				'section'     => 'content',
				'default'     => '1',
				'priority'    => 13,
				'active_callback' => array(
					array(
					  	'setting'  => 'share_btn',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),			

			//Shop			
			'shop_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Shop Layout', 'construct' ),
				'section'  => 'shop',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'per_shop' => array(
				'type'    		=> 'number',
				'label'   		=> esc_html__( 'Products Per Page', 'construct' ),
				'section' 		=> 'shop',
				'default' 		=> '6',
				'priority'    	=> 12
			),
			'col_shop'     => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Number Columns', 'construct' ),
				'description' => esc_html__( 'Store column count for displaying the grid', 'construct' ),
				'section'  => 'shop',
				'default'  => '3',
				'priority' => 10,
				'choices'  => array(
					'2' 	 => esc_html__( '2 Columns', 'construct' ),
					'3' 	 => esc_html__( '3 Columns', 'construct' ),
					'4'  	 => esc_html__( '4 Columns', 'construct' ),
				),
			),

			//Footer
			'w_footer'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Footer Widget', 'construct' ),
				'section'     => 'footer',
				'default'     => '1',
				'priority'    => 10,
			),
			'bg_footer'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color Footer Widget', 'construct' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'w_footer',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_footer'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Footer Widget', 'construct' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'w_footer',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_ftitle'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Title Widget', 'construct' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'w_footer',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'bfooter'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Footer Bottom', 'construct' ),
				'section'     => 'footer',
				'default'     => '1',
				'priority'    => 10,
			),
			'bg_bottom'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Bottom Footer', 'construct' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'bfooter',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_bottom' => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Footer', 'construct' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'bfooter',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'copy_right'      => array(
				'type'        => 'textarea',
				'label'       => esc_html__( 'Copy Right Text', 'construct' ),
				'section'     => 'footer',
				'default'     => '',
				'priority'    => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'bfooter',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),

			//Styling
			'preload'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Preloader', 'construct' ),
				'section'     => 'styling',
				'default'     => '1',
				'priority'    => 10,
			),
			'main_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Primary Color', 'construct' ),
				'section'  => 'styling',
				'default'  => '#ffc925',
				'priority' => 10,
			),
		),
	)
);