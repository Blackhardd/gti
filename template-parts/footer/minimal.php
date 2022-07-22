<footer class="footer footer__thanks">
    <div class="footer__thanks-inner">
        <div class="container">
            <div class="footer-copyright footer__inner">
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
</footer>