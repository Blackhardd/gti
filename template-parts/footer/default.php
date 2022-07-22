<footer class="footer">
    <div class="footer-content">
        <div class="footer-content__container">
            <div class="footer-items">
                <div class="footer-item">
                    <?php get_template_part( 'template-parts/partials/logo' ); ?>
                </div>

                <div class="footer-item">
                    <?php wp_nav_menu( array(
                        'theme_location'    => 'footer-menu',
                        'container'         => false,
                        'menu_class'        => 'menu menu--footer'
                    ) ); ?>
                </div>

                <div class="footer-item">
                    <div class="footer-item__social">
                        <?php if( !empty( $phones = preg_split( '/\r\n|\r|\n/', get_theme_mod( 'contacts_phones' ) ) ) ) : ?>
                            <ul>
                                <?php foreach( $phones as $phone ) : ?>
                                    <li><a href="tel:<?=str_replace( [' ', '(', ')'], '', $phone ); ?>"><?=$phone; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if( $email = get_theme_mod( 'contacts_email' ) ) : ?>
                            <ul>
                                <li>
                                    <a href="mailto:<?=$email; ?>"><?=$email; ?></a>
                                </li>
                            </ul>
                        <?php endif; ?>

                        <?php if( $address = get_theme_mod( 'contacts_address' ) ) : ?>
                            <ul>
                                <li>
                                    <p><?=$address; ?></p>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="footer-item">
                    <div class="map map--footer">
                        <div class="map__box"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-inner">
            <div class="footer-content__container">
                <div class="footer-copyright">
                    <div class="footer-copyright__item">
                        <?php if( $privacy_policy_url = get_privacy_policy_url() ) : ?>
                            <a class="footer-copyright__text red" href="<?=$privacy_policy_url; ?>"><?=__( 'Privacy policy', 'gti' ); ?></a>
                        <?php endif; ?>

                        <?php if( false ) : ?>
                            <a class="footer-copyright__text red" href=""><?=__( 'Карта сайта', 'gti' ); ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="footer-copyright__item">
                        <?php if( $copyright = get_theme_mod( 'footer_copyright' ) ) : ?>
                            <p class="footer-copyright__text grey"><?=str_replace( '[year]', date( 'Y' ), $copyright ); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="footer-copyright__item">
                        <?php if( $instagram = get_theme_mod( 'contacts_instagram' ) ) : ?>
                            <a class="footer-copyright__item-social" href="<?=$instagram; ?>" target="_blank">
                                <?=gti_get_icon( 'socials/instagram' ); ?>
                            </a>
                        <?php endif; ?>

                        <?php if( $facebook = get_theme_mod( 'contacts_facebook' ) ) : ?>
                            <a class="footer-copyright__item-social" href="<?=$facebook; ?>" target="_blank">
                                <?=gti_get_icon( 'socials/facebook' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-map">
        <div class="map map--footer">
            <div class="map__box"></div>
        </div>
    </div>
</footer>