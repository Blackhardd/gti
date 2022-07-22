<?php

// Initialize post types

add_action( 'init', 'gti_init_post_types' );

function gti_init_post_types(){
    register_post_type( 'testimonial', array(
        'labels'                => array(
            'name'                  => __( 'Відгуки', 'gti' ),
            'singular_name'         => __( 'Відгук', 'gti' ),
            'menu_name'             => __( 'Відгуки', 'gti' ),
            'name_admin_bar'        => __( 'Відгук', 'gti' ),
            'add_new'               => __( 'Додати новий', 'gti' ),
            'add_new_item'          => __( 'Додати новий відгук', 'gti' ),
            'new_item'              => __( 'Новий відгук', 'gti' ),
            'edit_item'             => __( 'Редагувати відгук', 'gti' ),
            'view_item'             => __( 'Переглянути відгуки', 'gti' ),
            'all_items'             => __( 'Усі відгуки', 'gti' ),
            'search_items'          => __( 'Шукати відгуки', 'gti' ),
            'parent_item_colon'     => __( 'Батьківські відгуки:', 'gti' ),
            'not_found'             => __( 'Відгуків не знайдено.', 'gti' ),
            'not_found_in_trash'    => __( 'Відгуків не знайдено у кошику.', 'gti' ),
            'featured_image'        => __( 'Фото відгука', 'gti' ),
            'set_featured_image'    => __( 'Встановити фото відгука', 'gti' ),
            'remove_featured_image' => __( 'Прибрати фото', 'gti' ),
            'use_featured_image'    => __( 'Використати як фото відгука', 'gti' ),
            'archives'              => __( 'Архів відгуків', 'gti' ),
            'insert_into_item'      => __( 'Додати до відгуку', 'gti' ),
            'uploaded_to_this_item' => __( 'Завантажити в цей відгук', 'gti' )
        ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => true,
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'             => 'dashicons-format-quote'
    ) );
}


// Change post types archive title

add_filter( 'get_the_archive_title', 'gti_change_archive_titles' );

function gti_change_archive_titles( $title ){
    if( is_archive() ){
        $title = post_type_archive_title( '', false );
    }

    return $title;
}


// Change testimonials archive query

add_action( 'pre_get_posts', 'gti_change_testimonials_archive_query' );

function gti_change_testimonials_archive_query( $query ){
    if( !is_admin() && $query->is_main_query() && isset( $query->query_vars['post_type'] ) && $query->query_vars['post_type'] === 'testimonial' ){
        $query->set( 'posts_per_page', 8 );
    }
}