<?php

$action_background = get_theme_mod( 'footer_action_background' );
$action_background_image = get_theme_mod( 'footer_action_background_image' );
$action_image = get_theme_mod( 'footer_action_image' );
$action_title = get_theme_mod( 'footer_action_title' );
$action_subtitle = get_theme_mod( 'footer_action_subtitle' );
$action_button_title = get_theme_mod( 'footer_action_button_title' );

?>

<div class="call-services" <?=$action_background ? "style='background-color: {$action_background};'" : ''; ?>>
    <?php if( $action_background_image ) : ?>
        <img src="<?=wp_get_attachment_image_url( $action_background_image, 'full' ); ?>">
    <?php endif; ?>

    <div class="container">
        <div class="call-services__inner">
            <?php if( $action_image ) : ?>
                <div class="call-services__item">
                    <img src="<?=wp_get_attachment_image_url( $action_image, 'full' ); ?>">
                </div>
            <?php endif; ?>

            <div class="call-services__item">
                <div class="call-services__text">
                    <?php if( $action_title ) : ?>
                        <div class="call-services__title repeater-title">
                            <p><?=__( $action_title, 'gti' ); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if( $action_subtitle ) : ?>
                        <div class="call-services__desc">
                            <p><?=__( $action_subtitle, 'gti' ); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <button class="button-services" data-fancybox data-src="#modal-services" type="button"><?=__( $action_button_title, 'gti' ); ?></button>
            </div>
        </div>
    </div>
</div>