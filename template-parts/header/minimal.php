<?php

$phones = preg_split( '/\r\n|\r|\n/', get_theme_mod( 'contacts_phones' ) );

?>

<header class="header__another">
    <div class="container">
        <div class="header__error-thanks__top-bar">
            <?php get_template_part( 'template-parts/partials/logo', null, array( 'classes' => ['header__error-thanks__img'] ) ); ?>

            <div class="header__error-thanks__topbar-links">
                <?php if( $working_hours = get_theme_mod( 'contacts_hours' ) ) : ?>
                    <p class="text-regular"><?=$working_hours; ?></p>
                <?php endif; ?>

                <?php if( !empty( $phones ) ) : ?>
                    <?php foreach( $phones as $phone ) : ?>
                        <a class="text-regular" href="tel:<?=str_replace( ['+', '(', ')', ' '], '', $phone ); ?>"><?=$phone; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if( $email = get_theme_mod( 'contacts_email' ) ) : ?>
                    <a class="text-regular" href="mailto:<?=$email; ?>"><?=$email; ?></a>
                <?php endif; ?>

                <?php if( !empty( $phones ) ) : ?>
                    <div class="block-open__mobile-phone">
                        <button class="btn-reset modal-btn text-regular button-header__mobile openMobileAnother">
                            <img src="<?=gti_get_image_asset_url( 'icons/phone-header.svg' ); ?>" class="phone-header" alt="">
                            <img src="<?=gti_get_image_asset_url( 'icons/phone-close.svg' ); ?>" class="none phone-close" alt="">
                        </button>

                        <div class="mobile-phone__list thanks__phone openMobileListAnother">
                            <ul>
                                <?php foreach( $phones as $phone ) : ?>
                                    <li><a href="tel:<?=str_replace( ['+', '(', ')', ' '], '', $phone ); ?>"><?=$phone; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="header__topbar-lang">
                <?php get_template_part( 'template-parts/partials/desktop-language-switcher' ); ?>
            </div>
        </div>
    </div>
</header>