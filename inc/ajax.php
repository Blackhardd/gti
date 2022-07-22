<?php

/**
 * AJAX handlers
 * 
 * @since 1.0.0
 * @package GTI
 */

if( !defined( 'ABSPATH' ) )
    exit;


// Public actions list.

$public_actions = [
    'calculate',
    'services_order',
    'add_testimonial',
    'contact'
];

foreach( $public_actions as $action ){
    add_action( "wp_ajax_{$action}", "gti_ajax_{$action}_callback" );
    add_action( "wp_ajax_nopriv_{$action}", "gti_ajax_{$action}_callback" );
}


// Calculate form handler.

function gti_ajax_calculate_callback(){
    $message = "
        <h1>Новий запит на прорахунок</h1>
        <p>
            Ім'я: {$_POST['name']}<br/>
            Номер телефону: <a href='tel:{$_POST['phone']}'>{$_POST['phone']}</a><br/>
            Тип послуг: {$_POST['service']}<br/>
            Вага: {$_POST['weight']} кг<br/>
            Об'єм: {$_POST['volume']} м3<br/>
            Маршрут: {$_POST['direction']}<br/>
            Вид вантажу: {$_POST['cargo']}<br/>
            Повідомлення: {$_POST['message']}
        </p>
    ";

    if( ccpt_send_admins_notification( 'Запит на прорахунок', $message ) ){
        gti_send_ajax_response( 'redirect', gti_get_thank_you_page_url() );
    }
    
    gti_send_ajax_response( 'error', __( 'Щось пішло не так. Спробуйте знову пізніше.', 'gti' ) );
}


// Services order form handler.

function gti_ajax_services_order_callback(){
    $message = "
        <h1>Нова заявка</h1>
        <p>Ім'я: {$_POST['name']}<br/>Номер телефону: <a href='tel:{$_POST['phone']}'>{$_POST['phone']}</a><br/>Повідомлення: {$_POST['message']}</p>
    ";

    if( ccpt_send_admins_notification( 'Нова заявка', $message ) ){
        gti_send_ajax_response( 'redirect', gti_get_thank_you_page_url() );
    }
    
    gti_send_ajax_response( 'error', __( 'Щось пішло не так. Спробуйте знову пізніше.', 'gti' ) );
}


// Add testimonial form handler.

function gti_ajax_add_testimonial_callback(){
    $testimonial_id = gti_add_testimonial( $_POST['name'], $_POST['message'], $_POST['phone'] );

    if( !is_wp_error( $testimonial_id ) ){
        $testimonial_edit_link = get_edit_post_link( $testimonial_id );
        
        ccpt_send_admins_notification( 'Новий відгук', "
            <h1>Новий відгук</h1>
            <p>На сайті з'явився новий вігук.<br/><a href='{$testimonial_edit_link}'>Переглянути</a></p>
        " );

        gti_send_ajax_response( 'redirect', gti_get_thank_you_page_url() );
    }

    gti_send_ajax_response( 'error', __( 'Щось пішло не так. Спробуйте знову пізніше.', 'gti' ) );
}


// Contact form handler.

function gti_ajax_contact_callback(){
    $message = "
        <h1>Заявка з контактної форми</h1>
        <p>Ім'я: {$_POST['name']}<br/>Номер телефону: <a href='tel:{$_POST['phone']}'>{$_POST['phone']}</a><br/>Повідомлення: {$_POST['message']}</p>
    ";

    if( ccpt_send_admins_notification( 'Заявка з контактної форми', $message ) ){
        gti_send_ajax_response( 'redirect', gti_get_thank_you_page_url() );
    }
    
    gti_send_ajax_response( 'error', __( 'Щось пішло не так. Спробуйте знову пізніше.', 'gti' ) );
}