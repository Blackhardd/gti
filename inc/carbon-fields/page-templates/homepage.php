<?php

/**
 * Homepage template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'homepage.php' )
    ->add_tab( __( 'Слайдер', 'gti' ), array(
        Field::make( 'complex', 'slider_items', __( 'Слайди', 'gti' ) )
            ->add_fields( array(
                Field::make( 'text', 'title', __( 'Заголовок', 'gti' ) ),
                Field::make( 'text', 'subtitle', __( 'Підзаголовок', 'gti' ) ),
                Field::make( 'text', 'button_title', __( 'Заголовок кнопки', 'gti' ) ),
                Field::make( 'image', 'image', __( 'Зображення', 'gti' ) )
            ) )
            ->set_collapsed( true )
            ->set_header_template( '
                <% if (title) { %>
                    <%- title %>
                <% } %>
            ' ),
        Field::make( 'complex', 'slider_badges', __( 'Позначки', 'gti' ) )
            ->add_fields( array(
                Field::make( 'text', 'title', __( 'Заголовок', 'gti' ) ),
                Field::make( 'text', 'subtitle', __( 'Підзаголовок', 'gti' ) )
            ) )
            ->set_max( 3 )
            ->set_collapsed( true )
            ->set_header_template( '
                <% if (title) { %>
                    <%- title %>
                <% } %>
            ' )
    ) )
    ->add_tab( __( 'Послуги', 'gti' ), array(
        Field::make( 'checkbox', 'services_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'services_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'association', 'services_items', __( 'Послуги', 'gti' ) )
            ->set_types( [
                array(
                    'type'      => 'post',
                    'post_type' => 'page'
                )
            ] )
    ) )
    ->add_tab( __( 'Відгуки', 'gti' ), array(
        Field::make( 'checkbox', 'testimonials_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'testimonials_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'text', 'testimonials_amount', __( 'Кількість відгуків для відображення', 'gti' ) )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', -1 )
    ) )
    ->add_tab( __( 'Наші партнери', 'gti' ), array(
        Field::make( 'checkbox', 'partners_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'partners_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'media_gallery', 'partners_logo', __( 'Логотипи партнерів', 'gti' ) )
    ) )
    ->add_tab( __( 'SEO секція', 'gti' ), array(
        Field::make( 'checkbox', 'seo_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'seo_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'rich_text', 'seo_content', __( 'Контент', 'gti' ) )
    ) );