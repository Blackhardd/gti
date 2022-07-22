<?php

/**
 * Framework functions
 * 
 * @since 1.0.0
 * @package GTI
 */

if( !defined( 'ABSPATH' ) )
    exit;


/**
 * Get theme image asset URL.
 * 
 * @param string $name
 * @return string
 */
function gti_get_image_asset_url( $name ){
    return GTI_THEME_URI . '/assets/img/' . $name;
}


/**
 * Get theme icon.
 * 
 * @param string $path
 * @param string[] $classes
 * @return string
 */
function gti_get_icon( $name, $size = [], $classes = [], $remove_xlmns = true ){
    $path = GTI_THEME_PATH . "/assets/icons/{$name}.svg";

    if( !file_exists( $path ) ){
        return '';
    }

    $content = file_get_contents( $path );

    if( !empty( $size ) ){
        $content = preg_replace( '/width="\d+"/', "width='{$size[0]}' ", $content );
        $content = preg_replace( '/height="\d+"/', "height='{$size[1]}' ", $content );
    }

    if( !empty( $classes ) ){
        $classes = implode( ' ', $classes );

        $content = str_replace( '<svg', "<svg class='{$classes}' ", $content );
    }

    if( $remove_xlmns ){
        $content = str_replace( 'xmlns="http://www.w3.org/2000/svg"', '', $content );
    }

    return $content;
}


/**
 * Send AJAX response.
 * 
 * @param string $status
 * @param string $message
 * @param mixed[] $data
 */
function gti_send_ajax_response( $status, $message = '', $data = array() ){
    wp_send_json( array(
        'status'    => $status,
        'message'   => $message,
        'data'      => $data
    ) );
    
    wp_die();
}


/**
 * Send notifcation to admins.
 * 
 * @param string $subject
 * @param string $message
 * @return boolean
 */
function ccpt_send_admins_notification( $subject, $message ){
    $site_name = get_bloginfo( 'name' );
    $site_url = home_url();
    $recipients = [get_option( 'admin_email' )];

    $is_sent = wp_mail( $recipients, $site_name . ' | ' . $subject, $message, [
        'From: ' . $site_name . ' <noreply@gti.com.ua>',
        'Content-Type: text/html; charset=UTF-8'
    ] );

    return $is_sent;
}


/**
 * Get thank you page link.
 * 
 * @return string
 */
function gti_get_thank_you_page_url(){
    if( $thank_you_page_id = get_option( 'thank_you_page' ) ){
        return get_permalink( $thank_you_page_id );
    }

    return home_url();
}


/**
 * Get random posts.
 * 
 * @param int $numberposts
 * @param string[]|int[] $exclude
 * @return WP_Post[]
 */
function gti_get_random_posts( $numberposts = 8, $exclude = [] ){
    $args = array(
        'post_type'     => 'post',
        'numberposts'   => $numberposts,
        'orderby'       => 'rand'
    );

    if( !empty( $exclude ) ){
        $args['exclude'] = $exclude;
    }

    return get_posts( $args );
}


/**
 * Add new testimonial.
 * 
 * @param string $name
 * @param string $content
 * @param string $phone
 * @param string $company
 * @return integer|WP_Error
 */
function gti_add_testimonial( $name, $content, $phone = '', $company = '' ){
    $args = array(
        'post_type'     => 'testimonial',
        'post_title'    => $name,
        'post_content'  => $content
    );

    if( !empty( $phone ) ){
        $args['meta_input']['_phone'] = $phone;
    }

    if( !empty( $company ) ){
        $args['meta_input']['_company'] = $company;
    }

    $testimonial_id = wp_insert_post( $args, true );

    return $testimonial_id;
}


/**
 * Get testimonials WP_Query object.
 * 
 * @param string[] $args
 * @return WP_Query
 */
function gti_get_testimonials_query( $numberposts = -1 ){
    $args = array(
        'post_type'     => 'testimonial',
        'numberposts'   => $numberposts ? $numberposts : -1
    );

    return new WP_Query( $args );
}


/**
 * Display pagination on archive page if needed.
 */
function gti_display_archive_pagination(){
    global $wp_query;

    if( $wp_query->max_num_pages > 1 ) :
        $current_page_index = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

        $prev_page_link = add_query_arg( 'paged', $current_page_index - 1 );
        $next_page_link = add_query_arg( 'paged', $current_page_index + 1 );

    ?>

        <div class="pagination">
            <?php if( $current_page_index > 1 ) : ?>
                <a class="prev" href="<?=$prev_page_link; ?>"><?=gti_get_icon( 'pagination/arrow-left' ); ?></a>
            <?php

            endif;

            for( $page_index = 1; $page_index <= $wp_query->max_num_pages; $page_index++ ) :
                $page_link = add_query_arg( 'paged', $page_index );
                $is_active_page = $page_index === $current_page_index;

            ?>

                <a <?=$is_active_page ? "class='active'" : "href='{$page_link}'"; ?>><?=$page_index; ?></a>

            <?php
            
            endfor;
            
            if( $current_page_index < $wp_query->max_num_pages ) : ?>
                <a class="next" href="<?=$next_page_link; ?>"><?=gti_get_icon( 'pagination/arrow-right' ); ?></a>
            <?php endif; ?>
        </div>

    <?php

    endif;
}