<?php

/**
 * Calculator page template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'calculator.php' )
    ->add_tab( __( 'SEO секція', 'gti' ), array(
        Field::make( 'checkbox', 'seo_hide', __( 'Приховати секцію', 'gti' ) ),
        Field::make( 'text', 'seo_title', __( 'Заголовок', 'gti' ) ),
        Field::make( 'rich_text', 'seo_content', __( 'Контент', 'gti' ) )
    ) );