<div class="main-menu__services">
    <div class="text-regular">
        <span><?=__( 'Наші послуги', 'gti' ); ?></span>
        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="white" /></svg>
    </div>
    <?php

    wp_nav_menu( array(
        'theme_location'    => 'services-menu',
        'container'         => false,
        'menu_class'        => 'menu menu--services-desktop',
        'walker'            => new GTI_Services_Walker()
    ) );

    ?>
</div>