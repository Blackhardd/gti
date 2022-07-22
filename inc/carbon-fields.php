<?php

/**
 * Carbon Fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


add_action( 'after_setup_theme', 'gti_load_carbon_fields' );

function gti_load_carbon_fields(){
    require_once( GTI_THEME_PATH . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}


// Init custom fields.

add_action( 'carbon_fields_register_fields', 'gti_init_carbon_fields' );

function gti_init_carbon_fields() {
    include_once GTI_THEME_PATH . '/inc/carbon-fields/pages.php';


    // Page templates
    
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/homepage.php';
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/about.php';
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/calculator.php';
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/faq.php';
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/service-catalog.php';
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/service-category.php';
    include_once GTI_THEME_PATH . '/inc/carbon-fields/page-templates/thank-you.php';


    // Post types

    include_once GTI_THEME_PATH . '/inc/carbon-fields/post-types/testimonial.php';
}


// Disable default page editor on specific templates.

add_action( 'init', 'gti_disable_default_page_editor' );

function gti_disable_default_page_editor(){
    if( is_admin() && isset( $_GET['post'] ) ){
        $id = $_GET['post'];

        $templates = [
            'homepage.php',
            'about.php',
            'calculator.php',
            'contacts.php',
            'faq.php',
            'service-catalog.php',
            'service-category.php',
            'thank-you.php'
        ];

        $current_page_template = get_post_meta( $id, '_wp_page_template', true );

        if( in_array( $current_page_template, $templates ) || $id === get_option('page_for_posts', true ) ){
            remove_post_type_support( 'page', 'editor' );
        }
    }
}