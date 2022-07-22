<?php

/**
 * Customizer fields.
 * 
 * @since 1.0.0
 * @package GTI
 */

if( !defined( 'ABSPATH' ) )
    exit;


add_action( 'customize_register', 'gti_customize_register' );

function gti_customize_register( $customizer ){
    // Service pages

    $customizer->add_section( 'service_pages_section', array(
        'title'         => __( 'Службові сторінки', 'gti' ),
        'priority'      => 140
    ) );


    $customizer->add_setting( 'thank_you_page', array(
        'default'   => 0,
        'type'      => 'option'
    ) );


    $customizer->add_control( 'thank_you_page', array(
        'label'         => __( 'Сторінка спасибі', 'gti' ),
        'section'       => 'service_pages_section',
        'type'          => 'dropdown-pages'
    ) );


    // Contacts

    $customizer->add_section( 'contacts_section', array(
        'title'         => __( 'Контакти', 'gti' ),
        'priority'      => 140
    ) );


    $customizer->add_setting( 'contacts_address', array( 'default' => '' ) );
    $customizer->add_setting( 'contacts_address_link', array( 'default' => '' ) );
    $customizer->add_setting( 'contacts_hours', array( 'default' => '' ) );
    $customizer->add_setting( 'contacts_phones', array( 'default' => '' ) );
    $customizer->add_setting( 'contacts_email', array( 'default' => '' ) );
    $customizer->add_setting( 'contacts_instagram', array( 'default' => '' ) );
    $customizer->add_setting( 'contacts_facebook', array( 'default' => '' ) );


    $customizer->add_control( 'contacts_address', array(
        'label'         => __( 'Адреса', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'textarea'
    ) );

    $customizer->add_control( 'contacts_address_link', array(
        'label'         => __( 'Посилання', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'contacts_hours', array(
        'label'         => __( 'Час роботи', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'contacts_phones', array(
        'label'         => __( 'Номера телефонів', 'gti' ),
        'description'   => __( 'Розділяти новою строкою.', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'textarea'
    ) );

    $customizer->add_control( 'contacts_email', array(
        'label'         => __( 'Email', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'contacts_instagram', array(
        'label'         => __( 'Instagram', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'contacts_facebook', array(
        'label'         => __( 'Facebook', 'gti' ),
        'section'       => 'contacts_section',
        'type'          => 'text'
    ) );


    // Testimonials

    $customizer->add_panel( 'testimonials_panel', array(
        'title'         => __( 'Відгуки', 'ce-crypto' ),
        'priority'      => 145
    ) );

    $customizer->add_section( 'add_testimonial_section', array(
        'title'         => __( 'Додати відгук', 'gti' ),
        'panel'         => 'testimonials_panel'
    ) );

    $customizer->add_setting( 'add_testimonial_hide', array( 'default' => '' ) );
    $customizer->add_setting( 'add_testimonial_title', array( 'default' => '' ) );
    $customizer->add_setting( 'add_testimonial_subtitle', array( 'default' => '' ) );
    $customizer->add_setting( 'add_testimonial_button_title', array( 'default' => '' ) );
    $customizer->add_setting( 'add_testimonial_image', array( 'default' => '' ) );

    $customizer->add_control( 'add_testimonial_hide', array(
        'label'         => __( 'Приховати блок', 'gti' ),
        'section'       => 'add_testimonial_section',
        'type'          => 'checkbox'
    ) );

    $customizer->add_control( 'add_testimonial_title', array(
        'label'         => __( 'Заголовок', 'gti' ),
        'section'       => 'add_testimonial_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'add_testimonial_subtitle', array(
        'label'         => __( 'Підзаголовок', 'gti' ),
        'section'       => 'add_testimonial_section',
        'type'          => 'textarea'
    ) );

    $customizer->add_control( 'add_testimonial_button_title', array(
        'label'         => __( 'Надпис на кнопці', 'gti' ),
        'section'       => 'add_testimonial_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( new WP_Customize_Media_Control( $customizer, 'add_testimonial_image', array(
        'label'         => __( 'Зображення', 'gti' ),
        'section'       => 'add_testimonial_section',
        'mime_type'     => 'image'
    ) ) );


    // Map

    $customizer->add_section( 'map_section', array(
        'title'         => __( 'Карта', 'ce-crypto' ),
        'priority'      => 151
    ) );

    $customizer->add_setting( 'map_api_key', array( 'default' => '', 'type' => 'option' ) );
    $customizer->add_setting( 'map_lattitude', array( 'default' => '', 'type' => 'option' ) );
    $customizer->add_setting( 'map_longitude', array( 'default' => '', 'type' => 'option' ) );

    $customizer->add_control( 'map_api_key', array(
        'label'         => __( 'API ключ', 'gti' ),
        'section'       => 'map_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'map_lattitude', array(
        'label'         => __( 'Широта', 'gti' ),
        'section'       => 'map_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'map_longitude', array(
        'label'         => __( 'Довгота', 'gti' ),
        'section'       => 'map_section',
        'type'          => 'text'
    ) );


    // Footer

    $customizer->add_panel( 'footer_panel', array(
        'title'         => __( 'Футер', 'ce-crypto' ),
        'priority'      => 150
    ) );


    $customizer->add_section( 'footer_copyright_section', array(
        'title'         => __( 'Копірайт', 'gti' ),
        'panel'         => 'footer_panel'
    ) );

    $customizer->add_setting( 'footer_copyright', array( 'default' => '' ) );

    $customizer->add_control( 'footer_copyright', array(
        'label'         => __( 'Копірайт', 'gti' ),
        'description'   => __( 'Ви можете використовувати тег [year] для выводу поточного року.', 'gti' ),
        'section'       => 'footer_copyright_section',
        'type'          => 'textarea'
    ) );


    $customizer->add_section( 'footer_action_section', array(
        'title'         => __( 'Заклик до дії', 'gti' ),
        'panel'         => 'footer_panel'
    ) );
    
    $customizer->add_setting( 'footer_action_background', array( 'default' => '' ) );
    $customizer->add_setting( 'footer_action_background_image', array( 'default' => '' ) );
    $customizer->add_setting( 'footer_action_image', array( 'default' => '' ) );
    $customizer->add_setting( 'footer_action_title', array( 'default' => '' ) );
    $customizer->add_setting( 'footer_action_subtitle', array( 'default' => '' ) );
    $customizer->add_setting( 'footer_action_button_title', array( 'default' => '' ) );

    $customizer->add_control( new WP_Customize_Color_Control( $customizer, 'footer_action_background', array(
        'label'         => __( 'Колір фону', 'gti' ),
        'section'       => 'footer_action_section',
        'settings'      => 'footer_action_background'
    ) ) );

    $customizer->add_control( new WP_Customize_Media_Control( $customizer, 'footer_action_background_image', array(
        'label'         => __( 'Фонове зображення', 'gti' ),
        'section'       => 'footer_action_section',
        'mime_type'     => 'image'
    ) ) );

    $customizer->add_control( new WP_Customize_Media_Control( $customizer, 'footer_action_image', array(
        'label'         => __( 'Зображення', 'gti' ),
        'section'       => 'footer_action_section',
        'mime_type'     => 'image'
    ) ) );

    $customizer->add_control( 'footer_action_title', array(
        'label'         => __( 'Заголовок', 'gti' ),
        'section'       => 'footer_action_section',
        'type'          => 'text'
    ) );

    $customizer->add_control( 'footer_action_subtitle', array(
        'label'         => __( 'Підзаголовок', 'gti' ),
        'section'       => 'footer_action_section',
        'type'          => 'textarea'
    ) );

    $customizer->add_control( 'footer_action_button_title', array(
        'label'         => __( 'Заголовок кнопки', 'gti' ),
        'section'       => 'footer_action_section',
        'type'          => 'text'
    ) );
}