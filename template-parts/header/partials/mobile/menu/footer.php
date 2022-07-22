<?php

$email = get_theme_mod( 'contacts_email' );
$instagram = get_theme_mod( 'contacts_instagram' );
$facebook = get_theme_mod( 'contacts_facebook' );

?>

<div class="mobile__menu--footer">
    <div class="mobile__menu--footer__links">
        <?php if( $email ) : ?>
            <a href="mailto:<?=$email; ?>"><?=$email; ?></a>
        <?php endif; ?>

        <div class="mobile__menu--social">
            <?php if( $instagram ) : ?>
                <a href="<?=$instagram; ?>" target="_blank">
                    <svg width="12" height="12" fill="none"><path d="M8.9 2.5c-.4 0-.7.3-.7.7 0 .3.3.6.7.6.4 0 .6-.3.6-.6 0-.4-.2-.7-.6-.7ZM6 3.4A2.7 2.7 0 0 0 3.3 6c0 1.4 1.3 2.7 2.7 2.7 1.5 0 2.7-1.3 2.7-2.7 0-1.5-1.2-2.7-2.7-2.7Zm0 4.4a1.8 1.8 0 1 1 1.8-1.7C7.8 7 7 7.8 6 7.8Zm5.5-4C11.5 2 10 .5 8.2.5H3.8A3.3 3.3 0 0 0 .5 3.8v4.4c0 1.8 1.5 3.3 3.3 3.3h4.4c1.8 0 3.3-1.5 3.3-3.3V3.8Zm-1 4.4c0 1.2-1 2.3-2.3 2.3H3.8c-1.2 0-2.3-1-2.3-2.3V3.8c0-1.2 1-2.3 2.3-2.3h4.4c1.2 0 2.3 1 2.3 2.3v4.4Z" fill="#fff"/></svg>
                </a>
            <?php endif; ?>

            <?php if( $facebook ) : ?>
                <a href="<?=$facebook; ?>" target="_blank">
                    <svg width="6" height="12" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.9 6v5.4l.1.1h2l.2-.1V6h1.4l.2-.2.1-1.6-.1-.2H4.2V3c0-.4.2-.6.5-.6h1l.2-.1V.6L5.8.5H3.9a2 2 0 0 0-2 2V4H.7v1.7L1 6h1Z" fill="#fff"/></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>