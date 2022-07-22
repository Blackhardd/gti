<?php

/**
 * Theme modals.
 * 
 * @since 1.0.0
 * @package GTI
 */

if( !defined( 'ABSPATH' ) )
    exit;


// Order service modal.

add_action( 'wp_footer', 'gti_services_order_modal' );

function gti_services_order_modal(){ ?>

        <div class="modal" id="modal-services">
            <div class="modal__container" role="dialog" aria-modal="true">
                <div class="modal-content">
                    <p><?=__( 'Зворотній дзвінок', 'gti' ); ?></p>

                    <?php get_template_part( 'template-parts/form/call-back' ); ?>
                </div>
            </div>
        </div>

    <?php
}


// Add testimonial modal.

add_action( 'wp_footer', 'gti_add_testimonail_modal' );

function gti_add_testimonail_modal(){ ?>

    <div class="modal" id="modal-feedback">
        <div class="modal__container">
            <div class="modal-content">
                <p><?=__( 'Додати вiдгук', 'gti' ); ?></p>

                <?php get_template_part( 'template-parts/form/add-testimonial' ); ?>
            </div>
        </div>
    </div>

    <?php
}