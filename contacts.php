<?php

/**
 * Template Name: Контакти
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();

wp_enqueue_script( 'forms' );

?>

    <section id="breadcrumbs">
        <div class="container">
            <?php get_template_part( 'template-parts/partials/breadcrumbs' ); ?>
        </div>
    </section>

    <div class="title-pages contact__title-pages">
        <div class="container">
            <div class="title-pages__inner">
                <h1 class="repeater-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="contact-block">
        <div class="container">
            <div class="contact-block__items">
                <div class="contact-block__item">
                    <div class="contact-block__inner">
                        <?php if( !empty( $phones = preg_split( '/\r\n|\r|\n/', get_theme_mod( 'contacts_phones' ) ) ) ) : ?>
                            <div class="contact-block__phone">
                                <?=gti_get_icon( 'phone' ); ?>

                                <ul>
                                    <?php foreach( $phones as $phone ) : ?>
                                        <li><a href="tel:<?=str_replace( [' ', '(', ')'], '', $phone ); ?>"><?=$phone; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if( $email = get_theme_mod( 'contacts_email' ) ) : ?>
                            <div class="contact-block__mail">
                                <?=gti_get_icon( 'mail' ); ?>
                                
                                <a href="mailto:<?=$email; ?>"><?=$email; ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if( $address = get_theme_mod( 'contacts_address' ) ) : ?>
                            <div class="contact-block__street">
                                <?=gti_get_icon( 'pin' ); ?>

                                <p><?=$address; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if( $address_link = get_theme_mod( 'contacts_address_link' ) ) : ?>
                            <div class="contact-block__href-map">
                                <a href="<?=$address_link; ?>" target="_blank"><?=__( 'Прокласти маршрут', 'gti' ); ?></a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="contact-block__social">
                            <?php if( $instagram = get_theme_mod( 'contacts_instagram' ) ) : ?>
                                <a href="<?=$instagram; ?>" target="_blank">
                                    <?=gti_get_icon( 'socials/instagram', [16, 16] ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $facebook = get_theme_mod( 'contacts_facebook' ) ) : ?>
                                <a href="<?=$facebook; ?>" target="_blank">
                                    <?=gti_get_icon( 'socials/facebook', [9, 18] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="contact-block__map">
                        <div class="map_box-inner">
                            <div class="map"></div>
                        </div>
                    </div>

                    <div class="form__contact">
                        <p><?=__( 'Зворотній зв\'язок', 'gti' ); ?></p>

                        <?php get_template_part( 'template-parts/form/contact' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

get_footer();