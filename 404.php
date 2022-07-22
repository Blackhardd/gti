<?php

/**
 * Template file for displaying 404 error page.
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();

?>

<div class="error__notfound">
    <div class="error__content">
        <p class="title">404</p>
        <p class="text"><?=__( 'Упс, щось пішло не так', 'gti' ); ?></p>
        <a href="<?=home_url(); ?>"><?=__( 'Перейти на головну', 'gti' ); ?></a>
    </div>
</div>

<?php

get_footer();