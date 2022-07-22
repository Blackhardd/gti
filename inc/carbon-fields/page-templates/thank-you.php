<?php

/**
 * Thank you page template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'thank-you.php' )
    ->add_fields( array(
        Field::make( 'image', 'image', __( 'Зображення', 'gti' ) ),
        Field::make( 'text', 'title', __( 'Заголовок', 'gti' ) )
            ->set_default_value( __( 'Дякуємо,<br> ваша заявка прийнята!', 'gti' ) ),
        Field::make( 'text', 'subtitle', __( 'Підзаголовок', 'gti' ) )
            ->set_default_value( __( 'Ми зв\'яжемося з вами найближчим часом', 'gti' ) )
    ) );