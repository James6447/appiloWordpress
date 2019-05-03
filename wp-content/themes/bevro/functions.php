<?php
/**
 * Bevro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'bevro_setup' ) ) :
define( 'BEVRO_THEME_VERSION','1.0.0');
define( 'BEVRO_THEME_DIR', get_template_directory() . '/' );
define( 'BEVRO_THEME_URI', get_template_directory_uri() . '/' );
define( 'BEVRO_THEME_SETTINGS', 'bevro-settings' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bevro_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'bevro' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
        * Enable support for Post Formats.
        */
        add_theme_support( 'post-formats', array('aside',
         'gallery','video', 'audio', 'link','quote'
         ) );
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
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', apply_filters( 'bevro_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
		) ) );
		// Add support for Custom Background.
        $args = array(
	    'default-color' => 'f1f1f1',
        );
        add_theme_support( 'custom-background',$args );
        // Recommend plugins
        add_theme_support( 'recommend-plugins', array(
            'elementor' => array(
                'name' => esc_html__( 'Elementor', 'bevro' ),
                'active_filename' => 'elementor/elementor.php',
            ),
            'contact-form-7' => array(
                'name' => esc_html__( 'Contact Form 7', 'bevro' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
            ), 
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'bevro' ),
                'active_filename' => 'woocommerce/woocommerce.php',
            ),
            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'bevro' ),
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ),
        ) );
	}
endif;
add_action( 'after_setup_theme', 'bevro_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bevro_content_width(){
	$GLOBALS['content_width'] = apply_filters('bevro_content_width', 640 );
}
add_action('after_setup_theme', 'bevro_content_width', 0 );
/**
 * Register widget area.
 */
function bevro_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'bevro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="bevro-widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'bevro' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'bevro' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'bevro' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Below Header First Widget', 'bevro' ),
		'id'            => 'bottom-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in below header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Below Header Second Widget', 'bevro' ),
		'id'            => 'bottom-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in below header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Below Header Third Widget', 'bevro' ),
		'id'            => 'bottom-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in below header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Main Header Widget', 'bevro' ),
		'id'            => 'main-header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in main header.', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'bevro' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in Top Footer', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'bevro' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in Top Footer', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'bevro' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in Top Footer', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'bevro' ),
		'id'            => 'footer-bottom-first',
		'description'   => esc_html__( 'Add widgets here to appear in below footer', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'bevro' ),
		'id'            => 'footer-bottom-second',
		'description'   => esc_html__( 'Add widgets here to appear in below footer','bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'bevro' ),
		'id'            => 'footer-bottom-third',
		'description'   => esc_html__( 'Add widgets here to appear in below Footer', 'bevro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	for ( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'bevro' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'bevro_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function bevro_scripts(){
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome.css', '', '4.7.0' );
	wp_enqueue_style('bevro-menu-style', get_template_directory_uri() . '/css/bevro-menu.css', '', '4.7.0' );
	wp_enqueue_style('bevro-style', get_stylesheet_uri(), array(), '1.0.2' );
	wp_add_inline_style('bevro-style', bevro_typography_style());
	wp_add_inline_style('bevro-style', bevro_custom_style());
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script( 'bevro-menu-js', get_parent_theme_file_uri().'/js/bevro-menu.js', array( 'jquery' ), '', true );
    if (class_exists( 'WooCommerce' ) ){
    wp_enqueue_script( 'bevro-woocommerce-js', get_parent_theme_file_uri().'/inc/woocommerce/js/woocommerce.js', array( 'jquery' ), '', true );
    }
    wp_enqueue_script( 'bevro-custom-js', get_parent_theme_file_uri().'/js/custom.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'bevro_scripts' );
/**
 * Load init.
 */
require_once trailingslashit( get_template_directory()).'inc/init.php';
require_once trailingslashit( get_template_directory()).'demo/import-data.php';