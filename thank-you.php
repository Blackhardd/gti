<?php

/**
 * Template Name: Спасибі
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();

?>

    <div class="thanks__page">
        <?php if( $image = carbon_get_the_post_meta( 'image' ) ) : ?>
            <img src="<?=wp_get_attachment_image_url( $image, 'full' ); ?>">
        <?php endif; ?>

        <div class="thanks__page-title">
            <p class="title"><?=carbon_get_the_post_meta( 'title' ); ?></p>
            <p class="text"><?=carbon_get_the_post_meta( 'subtitle' ); ?></p>
            <a href="<?=home_url(); ?>"><?=__( 'Перейти на головну', 'gti' ); ?></a>
        </div>
    </div>

<?php

get_footer();