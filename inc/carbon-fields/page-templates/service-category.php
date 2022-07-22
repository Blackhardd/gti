<?php

/**
 * Service category template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'service-category.php' )
    ->add_tab( __( 'Шапка сторінки', 'gti' ), array(
        Field::make( 'checkbox', 'page_header_hide', __( 'Приховати секцію', 'gti' ) )
    ) )
    ->add_tab( __( 'Hero секція', 'gti' ), array(
        Field::make( 'checkbox', 'hero_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'hero_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'rich_text', 'hero_description', __( 'Опис', 'gti' ) ),
        Field::make( 'text', 'hero_button_title', __( 'Надпис кнопки', 'gti' ) ),
        Field::make( 'image', 'hero_image', __( 'Зображення', 'gti' ) )
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
    ->add_tab( __( 'Автомобілі', 'gti' ), array(
        Field::make( 'checkbox', 'cars_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'cars_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'complex', 'cars_type', __( 'Типи', 'gti' ) )
            ->add_fields( array(
                Field::make( 'complex', 'cars', __( 'Авто', 'gti' ) )
                    ->add_fields( array(
                        Field::make( 'image', 'image', __( 'Зображення', 'gti' ) ),
                        Field::make( 'text', 'title', __( 'Назва', 'gti' ) ),
                        Field::make( 'rich_text', 'description', __( 'Опис', 'gti' ) )
                    ) )
                    ->set_collapsed( true )
                    ->set_header_template( '
                        <% if (title) { %>
                            <%- title %>
                        <% } %>
                    ' )
            ) )
            ->set_collapsed( true )
    ) )
    ->add_tab( __( 'Інші послуги', 'gti' ), array(
        Field::make( 'checkbox', 'services_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'services_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'association', 'services_items', __( 'Послуги', 'gti' ) )
            ->set_types( [
                array(
                    'type'      => 'post',
                    'post_type' => 'page'
                )
            ] ),
        Field::make( 'select', 'services_display_type', __( 'Тип відображення', 'gti' ) )
            ->set_options( array(
                'three_columns' => __( 'Три колонки', 'gti' ),
                'two_columns'   => __( 'Дві колонки', 'gti' )
            ) )
            ->set_default_value( 'three_columns' ),
        Field::make( 'rich_text', 'services_content_left', __( 'Ліва колонка', 'gti' ) ),
        Field::make( 'rich_text', 'services_content_right', __( 'Права колонка', 'gti' ) )
    ) )
    ->add_tab( __( 'Наші партнери', 'gti' ), array(
        Field::make( 'checkbox', 'partners_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'partners_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'media_gallery', 'partners_logo', __( 'Логотипи партнерів', 'gti' ) )
    ) )
    ->add_tab( __( 'Калькулятор', 'gti' ), array(
        Field::make( 'checkbox', 'calculator_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'calculator_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'textarea', 'calculator_subtitle', __( 'Підзаголовок', 'gti' ) ),
        Field::make( 'text', 'calculator_button_title', __( 'Надпис кнопки', 'gti' ) ),
        Field::make( 'association', 'calculator_button_link', __( 'Сторінка', 'gti' ) )
            ->set_types( [
                array(
                    'type'      => 'post',
                    'post_type' => 'page'
                )
            ] )
            ->set_max( 1 ),
        Field::make( 'image', 'calculator_image', __( 'Зображення', 'gti' ) )
    ) )
    ->add_tab( __( 'Питання та відповіді', 'gti' ), array(
        Field::make( 'checkbox', 'faq_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'faq_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'complex', 'faq_items', __( 'Список', 'gti' ) )
            ->add_fields( array(
                Field::make( 'text', 'question', __( 'Питання', 'gti' ) ),
                Field::make( 'rich_text', 'answer', __( 'Відповідь', 'gti' ) )
            ) )
            ->set_collapsed( true )
            ->set_header_template( '
                <% if (question) { %>
                    <%- question %>
                <% } %>
            ' )
    ) )
    ->add_tab( __( 'SEO секція', 'gti' ), array(
        Field::make( 'checkbox', 'seo_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'seo_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'rich_text', 'seo_content', __( 'Контент', 'gti' ) )
    ) );