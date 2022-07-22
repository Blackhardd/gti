<?php

/**
 * Topbar template.
 *
 * @package GTI
 * @since GTI 1.0.0
 */

$working_hours = get_theme_mod( 'contacts_hours' );
$phones = preg_split( '/\r\n|\r|\n/', get_theme_mod( 'contacts_phones' ) );
$email = get_theme_mod( 'contacts_email' );

?>


<div class="header__topbar">
    <div class="header__container">
        <div class="header__inner">
            <div class="header__inner-content">
                <?php if( $working_hours ) : ?>
                    <div class="header__topbar-work">
                        <p class="text-regular"><?=$working_hours; ?></p>
                    </div>
                <?php endif; ?>
                    
                <div class="header__topbar-links">
                    <?php foreach( $phones as $phone ) : ?>
                        <a class="text-regular" href="tel:<?=str_replace( ['+', '(', ')', ' '], '', $phone ); ?>"><?=$phone; ?></a>
                    <?php endforeach; ?>

                    <?php if( $email ) : ?>
                        <a class="text-regular" href="mailto:<?=$email; ?>"><?=$email; ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="header__topbar-lang">
                <?php get_template_part( 'template-parts/partials/desktop-language-switcher' ); ?>
            </div>
        </div>
    </div>
</div>