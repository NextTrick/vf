<?php
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package construct
 */


if ( ! function_exists( 'construct_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function construct_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Redux Theme, use a find and replace
	 * to change 'construct' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'construct', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary Menu', 'construct' ),
		'footer'	=> esc_html__( 'Footer Menu', 'construct' ),
		'menuser'	=> esc_html__( 'Service Menu', 'construct' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'comment-form',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'audio',
		'image',
		'video',
		'gallery',
	) );
	
}
endif; // construct_setup
add_action( 'after_setup_theme', 'construct_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function construct_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'construct_content_width', 640 );
}
add_action( 'after_setup_theme', 'construct_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function construct_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'construct' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'construct' ),  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'construct' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'construct' ),  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One Widget Area', 'construct' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'construct' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two Widget Area', 'construct' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'construct' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three Widget Area', 'construct' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'construct' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Widget Area', 'construct' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'construct' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) ); 

	
}
add_action( 'widgets_init', 'construct_widgets_init' );

/**
 * Enqueue Google fonts.
 */
function construct_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open = _x( 'on', 'Open Sans font: on or off', 'construct' );
 	$mont = _x( 'on', 'Montserrat font: on or off', 'construct' );
 	$droi = _x( 'on', 'Droid Serif font: on or off', 'construct' );
 
    if ( 'off' !== $open || 'off' !== $mont || 'off' !== $droi ) {
        $font_families = array();

        if ( 'off' !== $open ) {
            $font_families[] = 'Open Sans:400,400i,600,600i,700,700i';
        } 
        if ( 'off' !== $mont ) {
            $font_families[] = 'Montserrat:300,400,500,600,700&subset=latin';
        }  
        if ( 'off' !== $droi ) {
            $font_families[] = 'Droid Serif';
        }       
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}


if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'construct' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}
	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'construct' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}
	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'construct' ) ) {
		$fonts[] = 'Inconsolata:400';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function construct_scripts() {

	$protocol = is_ssl() ? 'https' : 'http';

	// Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'construct-fonts', construct_fonts_url(), array(), null );

    /** All frontend css files **/ 
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'animsition', get_template_directory_uri().'/assets/css/animsition.css');
    wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.css');
    wp_enqueue_style( 'fontello', get_template_directory_uri().'/assets/css/fontello.css');
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css');
    wp_enqueue_style( 'cubeportfolio', get_template_directory_uri().'/assets/css/cubeportfolio.min.css');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css');
    wp_enqueue_style( 'flexslider', get_template_directory_uri().'/assets/css/flexslider.css');
    wp_enqueue_style( 'vegas', get_template_directory_uri().'/assets/css/vegas.css');
    wp_enqueue_style( 'shortcodes', get_template_directory_uri().'/assets/css/shortcodes.css');

    wp_enqueue_style( 'construct-woocommerce', get_template_directory_uri().'/assets/css/woocommerce.css');
	wp_enqueue_style( 'construct-style', get_stylesheet_uri() );
	

	/** All frontend js files **/
	wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/js/bootstrap.min.js",array('jquery'),false,true);
	wp_enqueue_script("animsition", get_template_directory_uri()."/assets/js/animsition.js",array('jquery'),false,true);
	wp_enqueue_script("construct-plugins", get_template_directory_uri()."/assets/js/plugins.js",array('jquery'),false,true);    
	wp_enqueue_script("countTo", get_template_directory_uri()."/assets/js/countTo.js",array('jquery'),false,true);
	wp_enqueue_script("vegas", get_template_directory_uri()."/assets/js/vegas.js",array('jquery'),false,true);
	wp_enqueue_script("typed", get_template_directory_uri()."/assets/js/typed.js",array('jquery'),false,true);
	wp_enqueue_script("fitText", get_template_directory_uri()."/assets/js/fitText.js",array('jquery'),false,true);
    wp_enqueue_script("flexslider", get_template_directory_uri()."/assets/js/flexslider.js",array('jquery'),false,true);
    wp_enqueue_script("owlCarousel", get_template_directory_uri()."/assets/js/owlCarousel.js",array('jquery'),false,false);
    wp_enqueue_script("cubeportfolio", get_template_directory_uri()."/assets/js/cube.portfolio.js",array('jquery'),false,false);

    wp_enqueue_script("construct-js", get_template_directory_uri()."/assets/js/main.js",array('jquery'),false,true);

    
}
add_action( 'wp_enqueue_scripts', 'construct_scripts' );


/**
 * Implement the Custom Meta Boxs.
 */
require get_template_directory() . '/framework/meta-boxes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';
require get_template_directory() . '/framework/BFI_Thumb.php';
require get_template_directory() . '/framework/widget/recentpost.php';
require get_template_directory() . '/framework/importer.php';
/**
 * Custom shortcode plugin visual composer.
 */
require_once get_template_directory() . '/shortcodes.php';
require_once get_template_directory() . '/vc_shortcode.php';
require_once get_template_directory() . '/framework/customizer.php';
/**
 * Customizer Menu.
 */
require get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
/**
 * Enqueue Style
 */
require get_template_directory() . '/framework/color.php';
require get_template_directory() . '/framework/styling.php';
/**
 * Customizer Shop.
 */
require get_template_directory() . '/framework/woocommerce-customize.php';


//Code Visual Composer.
// Add new Param in Row
if(function_exists('vc_add_param')){
	vc_add_param('vc_row', array(
								"type" => "dropdown",
								"heading" => esc_html__('Setup Full Width', 'construct'),
								"param_name" => "fullwidth",
								"value" => array(   
								                esc_html__('No', 'construct') => 'no',  
								                esc_html__('Yes', 'construct') => 'yes',                                                                                
								              ),
								"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", "construct"),      
					        )
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"heading" => esc_html__('Background Parallax', 'construct'),
                              	"param_name" => "parallax_bg",     
								"description" => esc_html__("Background Image Parallax", "construct"),      
                            ) 
    );
}

if(function_exists('vc_remove_param')){
	vc_remove_param( "vc_row", "parallax" );
	vc_remove_param( "vc_row", "parallax_image" );
	vc_remove_param( "vc_row", "parallax_speed_bg" );
	vc_remove_param( "vc_row", "parallax_speed_video" );
	vc_remove_param( "vc_row", "full_width" );
	vc_remove_param( "vc_row", "full_height" );
	vc_remove_param( "vc_row", "video_bg" );
	vc_remove_param( "vc_row", "video_bg_parallax" );
	vc_remove_param( "vc_row", "video_bg_url" );
	vc_remove_param( "vc_row", "columns_placement" );
	vc_remove_param( "vc_row", "gap" );	
}	

/**
 * Require plugins install for this theme.
 *
 * @since Split Vcard 1.0
 */
require_once get_template_directory() . '/framework/plugin-requires.php';