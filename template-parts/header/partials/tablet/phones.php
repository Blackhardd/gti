<?php

$phones = preg_split( '/\r\n|\r|\n/', get_theme_mod( 'contacts_phones' ) );

?>

<div class="block-open__mobile-phone">
    <button class="text-regular button-header__mobile headerMobileSecond">
        <img src="<?=gti_get_image_asset_url( 'icons/phone-header.svg' ); ?>" class="phone-header" alt="">
        <img src="<?=gti_get_image_asset_url( 'icons/phone-close.svg' ); ?>" class="none phone-close" alt="">
    </button>

    <div class="mobile-phone__list headerMobileListSecond">
        <ul>
            <?php foreach( $phones as $phone ) : ?>
                <li><a href="tel:<?=str_replace( ['+', '(', ')', ' '], '', $phone ); ?>"><?=$phone; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>