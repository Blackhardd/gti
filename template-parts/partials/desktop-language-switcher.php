<?php

/**
 * Desktop language switcher template.
 *
 * @package GTI
 * @since GTI 1.0.0
 */

$langs = pll_the_languages( array( 'raw' => true, 'hide_if_no_translation' => true ) );
$current_lang = pll_current_language();

unset( $langs[$current_lang] );

?>

<div class="current-lang">
    <p class="text-regular">
        <?php
        
        echo $current_lang;
        
        if( !empty( $langs ) ) :
            echo gti_get_icon( 'chevron-down' );
        endif;

        ?>
    </p>

    <?php if( !empty( $langs ) ) : ?>
        <ul class="another-lang">
            <?php foreach( $langs as $lang ) : ?>
                <li><a class="text-regular" href="<?=$lang['url']; ?>"><?=$lang['slug']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>