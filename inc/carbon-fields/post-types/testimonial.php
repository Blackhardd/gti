<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування відгуку', 'gti' ) )
    ->where( 'post_type', '=', 'testimonial' )
    ->add_fields( array(
        Field::make( 'text', 'phone', __( 'Номер телефону', 'gti' ) ),
        Field::make( 'text', 'company', __( 'Компанія', 'gti' ) )
    ) );