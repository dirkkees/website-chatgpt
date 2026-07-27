<?php
/**
 * Mokerdop Pro Theme Functions
 *
 * @package Mokerdop_Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup
 */
function mokerdop_theme_setup() {

	// Vertalingen
	load_theme_textdomain( 'mokerdop-pro', get_template_directory() . '/languages' );

	// Titel beheren door WordPress
	add_theme_support( 'title-tag' );

	// Uitgelichte afbeelding
	add_theme_support( 'post-thumbnails' );

	// Logo ondersteuning
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 280,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// HTML5 ondersteuning
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// WooCommerce
	add_theme_support( 'woocommerce' );

	// Responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Brede uitlijning Gutenberg
	add_theme_support( 'align-wide' );

	// Menus
	register_nav_menus(
		array(
			'primary' => __( 'Hoofdmenu', 'mokerdop-pro' ),
			'footer'  => __( 'Footer menu', 'mokerdop-pro' ),
		)
	);

}
add_action( 'after_setup_theme', 'mokerdop_theme_setup' );


/**
 * CSS & JS laden
 */
function mokerdop_enqueue_assets() {

	// Google Fonts
	wp_enqueue_style(
		'mokerdop-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);

	// Hoofd stylesheet
	wp_enqueue_style(
		'mokerdop-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	// JavaScript
	wp_enqueue_script(
		'mokerdop-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

}
add_action( 'wp_enqueue_scripts', 'mokerdop_enqueue_assets' );


/**
 * Widgetgebieden
 */
function mokerdop_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Footer kolom 1',
			'id'            => 'footer-1',
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name' => 'Footer kolom 2',
			'id'   => 'footer-2',
		)
	);

	register_sidebar(
		array(
			'name' => 'Footer kolom 3',
			'id'   => 'footer-3',
		)
	);

	register_sidebar(
		array(
			'name' => 'Footer kolom 4',
			'id'   => 'footer-4',
		)
	);

}
add_action( 'widgets_init', 'mokerdop_widgets_init' );


/**
 * Eigen afbeeldingsformaten
 */
add_image_size( 'mokerdop-hero', 1920, 1080, true );
add_image_size( 'mokerdop-product', 700, 700, false );


/**
 * WooCommerce winkelwagen teller
 */
function mokerdop_cart_count() {

	if ( class_exists( 'WooCommerce' ) ) {
		return WC()->cart->get_cart_contents_count();
	}

	return 0;

}


/**
 * Geen WordPress emoji scripts
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Versie
 */
define( 'MOKERDOP_THEME_VERSION', '1.0.0' );
