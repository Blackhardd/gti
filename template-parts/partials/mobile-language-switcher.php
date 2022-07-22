<?php

/**
 * Mobile language switcher template.
 *
 * @package GTI
 * @since GTI 1.0.0
 */

$langs = pll_the_languages( array( 'raw' => true, 'hide_if_no_translation' => true ) );
$current_lang = pll_current_language();

unset( $langs[$current_lang] );

?>

<div class="mobile-language-switcher">
    <div class="mobile-language-switcher__item mobile-language-switcher__item--active">
        <a class="mobile-language-switcher__link"><?=$current_lang; ?></a>
    </div>

    <?php foreach( $langs as $lang ) : ?>
        <div class="mobile-language-switcher__item">
            <a href="<?=$lang['url']; ?>" class="mobile-language-switcher__link"><?=$lang['slug']; ?></a>
        </div>
    <?php endforeach; ?>
</div>