<?php

/**
 * FAQ page template custom fields.
 * 
 * @package GTI
 * @since GTI 1.0.0
 */

if( !defined( 'ABSPATH' ) )
    exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Налаштування шаблону', 'gti' ) )
    ->where( 'post_template', '=', 'faq.php' )
    ->add_tab( __( 'Питання та відповіді', 'gti' ), array(
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
    ) );