<?php

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

$classes = '';

if( !empty( $args['classes'] ) ){
    $classes = implode( ' ', $args['classes'] );
}

?>

<div class="logo <?=$classes; ?>">
    <?php if( is_front_page() ) : ?>
        <img src="<?=$logo[0]; ?>" width="<?=$logo[1]; ?>" height="<?=$logo[2]; ?>" class="logo__image" alt="<?=get_bloginfo( 'name' ); ?>">
    <?php else : ?>
        <a href="<?=home_url(); ?>" class="logo__link"><img src="<?=$logo[0]; ?>" width="<?=$logo[1]; ?>" height="<?=$logo[2]; ?>" class="logo__image" alt="<?=get_bloginfo( 'name' ); ?>"></a>
    <?php endif; ?>
</div>