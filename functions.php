<?php

/**
 * GTI functions and definitions
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'GTI_THEME_VER' ) )
    define( 'GTI_THEME_VER', '1.0.0' );

if( !defined( 'GTI_THEME_URI' ) )
    define( 'GTI_THEME_URI', get_template_directory_uri() );

if( !defined( 'GTI_THEME_PATH' ) )
    define( 'GTI_THEME_PATH', get_template_directory() );


// Includes

include GTI_THEME_PATH . '/inc/walkers/class-gti-primary-walker.php';
include GTI_THEME_PATH . '/inc/walkers/class-gti-services-walker.php';

require GTI_THEME_PATH . '/inc/framework.php';
require GTI_THEME_PATH . '/inc/post-types.php';
require GTI_THEME_PATH . '/inc/filters.php';
require GTI_THEME_PATH . '/inc/customizer.php';
require GTI_THEME_PATH . '/inc/ajax.php';
require GTI_THEME_PATH . '/inc/modals.php';

require GTI_THEME_PATH . '/inc/carbon-fields.php';


// Adding theme supports

add_action( 'after_setup_theme', 'gti_setup_theme' );

function gti_setup_theme(){
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'width'     => 127,
        'height'    => 36
    ) );
    add_theme_support( 'post-thumbnails' );


    // Adding theme support for HTML5

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
    ) );


    // Adding image sizes

    add_image_size( 'service-thumb', 620, 249, true );
    add_image_size( 'service-thumb-small', 396, 236, true );
    add_image_size( 'truck-thumb', 238, 238, true );
    add_image_size( 'news-thumb', 620, 320, true );
    add_image_size( 'news-card-thumb', 396, 260, true );
    add_image_size( 'testimonial-thumb', 48, 48, true );


    // Registering menus

    register_nav_menus( array(
        'primary-menu'          => __( 'Головне меню', 'ce-crypto' ),
        'services-menu'         => __( 'Меню послуг', 'ce-crypto' ),
        'services-menu-mobile'  => __( 'Меню послуг (Мобільне)', 'ce-crypto' ),
        'footer-menu'           => __( 'Футер меню', 'ce-crypto' )
    ) );
}


// Enqueue theme scripts and styles

add_action( 'wp_enqueue_scripts', 'gti_enqueue_scripts' );

function gti_enqueue_scripts(){
    // Register styles

    wp_register_style( 'swiper', GTI_THEME_URI . '/assets/css/libs/swiper-bundle.min.css', [], GTI_THEME_VER );


    // Register scripts

    wp_register_script( 'imask', GTI_THEME_URI . '/assets/js/libs/imask.js', [], GTI_THEME_VER, true );
    wp_register_script( 'swiper', GTI_THEME_URI . '/assets/js/libs/swiper-bundle.min.js', [], GTI_THEME_VER, true );
    wp_register_script( 'maps', GTI_THEME_URI . '/assets/js/maps.js', [], GTI_THEME_VER, true );


    // Enqueue styles

    wp_enqueue_style( 'theme', get_stylesheet_uri(), [], GTI_THEME_VER );
    wp_enqueue_style( 'index', GTI_THEME_URI . '/assets/css/index.css', [], GTI_THEME_VER );
    wp_enqueue_style( 'critical', GTI_THEME_URI . '/assets/css/critical.css', [], GTI_THEME_VER );


    // Enqueue scripts

    if( $google_api_key = get_option( 'map_api_key' ) ){
        wp_enqueue_script( 'google-maps', "https://maps.googleapis.com/maps/api/js?key={$google_api_key}&callback=initMaps", ['maps'], null, true );
    }
    
    wp_enqueue_script( 'front', GTI_THEME_URI . '/assets/js/index.js', ['jquery', 'imask', 'swiper', 'maps'], GTI_THEME_VER, true );
    wp_enqueue_script( 'front-bad', GTI_THEME_URI . '/assets/js/index.min.js', ['jquery'], GTI_THEME_VER, true );
    wp_enqueue_script( 'forms', GTI_THEME_URI . '/assets/js/forms.js', ['jquery'], GTI_THEME_VER, true );


    // Localize scripts.

    wp_localize_script( 'maps', 'gti_maps_data', array(
        'center' => get_option( 'map_api_key' ) ? array( 'lat' => (float) get_option( 'map_lattitude' ), 'lng' => (float) get_option( 'map_longitude' ) ) : false
    ) );

    wp_localize_script( 'forms', 'gti_ajax_data', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ) );
}