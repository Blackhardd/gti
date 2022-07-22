<?php

/**
 * About page template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'about.php' )
    ->add_tab( __( 'Hero секція', 'gti' ), array(
        Field::make( 'text', 'hero_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'rich_text', 'hero_description', __( 'Опис', 'gti' ) ),
    ) )
    ->add_tab( __( 'Лічильники', 'gti' ), array(
        Field::make( 'checkbox', 'counters_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'image', 'counters_image_desktop', __( 'Зображеня для десктопу', 'gti' ) ),
        Field::make( 'image', 'counters_image_mobile', __( 'Зображеня для мобільної версії', 'gti' ) ),
        Field::make( 'complex', 'counters_list', __( 'Елементи', 'gti' ) )
            ->add_fields( array(
                Field::make( 'text', 'prefix', __( 'Префікс', 'gti' ) ),
                Field::make( 'text', 'number', __( 'Число', 'gti' ) )
                    ->set_attribute( 'type', 'number' ),
                Field::make( 'text', 'suffix', __( 'Суфікс', 'gti' ) ),
                Field::make( 'text', 'description', __( 'Опис', 'gti' ) )
            ) )
            ->set_collapsed( true )
            ->set_max( 4 )
    ) )
    ->add_tab( __( 'Компанія', 'gti' ), array(
        Field::make( 'checkbox', 'company_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'image', 'company_image', __( 'Зображеня', 'gti' ) ),
        Field::make( 'rich_text', 'company_content_left', __( 'Ліва колонка', 'gti' ) ),
        Field::make( 'rich_text', 'company_content_right', __( 'Права колонка', 'gti' ) ),
        Field::make( 'complex', 'company_services', __( 'Послуги', 'gti' ) )
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
    ->add_tab( __( 'Наші партнери', 'gti' ), array(
        Field::make( 'checkbox', 'partners_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'partners_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'media_gallery', 'partners_logo', __( 'Логотипи партнерів', 'gti' ) )
    ) )
    ->add_tab( __( 'Відгуки', 'gti' ), array(
        Field::make( 'checkbox', 'testimonials_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'testimonials_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'text', 'testimonials_amount', __( 'Кількість відгуків для відображення', 'gti' ) )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', -1 )
    ) );