<?php

/**
 * Generic pages custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування сторінки', 'gti' ) )
    ->where( 'post_type', '=', 'page' )
    ->add_tab( __( 'Футер', 'gti' ), array(
        Field::make( 'checkbox', 'show_footer_action', __( 'Відображати призив до дії', 'gti' ) )
            ->set_default_value( true )
    ) );