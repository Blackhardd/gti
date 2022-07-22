<header class="header">
    <?php get_template_part( 'template-parts/header/partials/topbar' ); ?>

    <div class="header__main-menu">
        <div class="header__container">
            <nav class="header__inner">
                <div class="header__mobile-btn">
                    <button class="mobile-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div class="mobile__menu">
                        <div class="mobile__transparent"></div>

                        <div class="mobile__menu--inner">
                            <div class="mobile__menu--header">
                                <?php get_template_part( 'template-parts/header/partials/mobile/phones' ); ?>

                                <?php get_template_part( 'template-parts/partials/logo', null, array(
                                    'classes' => [ 'mobile__menu--logo' ]
                                ) ); ?>
                                
                                <div class="mobile__menu--close">
                                    <button type="button" class="mobile__menu--close__btn">
                                        <?=gti_get_icon( 'mobile-menu-close' ); ?>
                                    </button>
                                </div>
                            </div>

                            <div class="mobile__menu--scroll">
                                <div class="mobile__menu--links">
                                    <?php

                                    wp_nav_menu( array(
                                        'theme_location'    => 'services-menu-mobile',
                                        'container'         => false,
                                        'menu_class'        => 'menu menu--services-mobile',
                                        'walker'            => new GTI_Services_Walker()
                                    ) );
                                    
                                    ?>

                                    <div class="menu__between-line"></div>

                                    <?php

                                    wp_nav_menu( array(
                                        'theme_location'    => 'primary-menu',
                                        'container'         => false,
                                        'menu_class'        => 'menu menu--mobile'
                                    ) );


                                    get_template_part( 'template-parts/partials/mobile-language-switcher' );

                                    ?>
                                </div>
                            </div>
                            
                            <?php get_template_part( 'template-parts/header/partials/mobile/menu/footer' ); ?>
                        </div>
                    </div>
                </div>

                <div class="header__inner-content">
                    <?php get_template_part( 'template-parts/partials/logo', null, array(
                        'classes' => [ 'main-menu__logo' ]
                    ) ); ?>

                    <?php get_template_part( 'template-parts/header/partials/services' ); ?>
                </div>

                <div class="header__main-menu__links">
                    <?php get_template_part( 'template-parts/header/partials/menu' ); ?>

                    <button class="text-regular button-header" data-fancybox data-src="#modal-services"><?=__( 'Замовити послугу', 'gti' ); ?></button>

                    <?php get_template_part( 'template-parts/header/partials/tablet/phones' ); ?>
                </div>
            </nav>
        </div>
    </div>
</header>