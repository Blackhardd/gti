<?php

/**
 * Service catalog template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'service-catalog.php' )
    ->add_tab( __( 'Шапка сторінки', 'gti' ), array(
        Field::make( 'rich_text', 'page_header_description', __( 'Опис сторінки', 'gti' ) )
    ) )
    ->add_tab( __( 'Послуги', 'gti' ), array(
        Field::make( 'checkbox', 'services_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'association', 'services_items', __( 'Послуги', 'gti' ) )
            ->set_types( [
                array(
                    'type'      => 'post',
                    'post_type' => 'page'
                )
            ] )
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
    ->add_tab( __( 'SEO секція', 'gti' ), array(
        Field::make( 'checkbox', 'seo_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'seo_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'rich_text', 'seo_content', __( 'Контент', 'gti' ) )
    ) );