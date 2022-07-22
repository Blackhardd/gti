<?php

/**
 * Template Name: Категорія послуг
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();


$page_header_hide = carbon_get_the_post_meta( 'page_header_hide' );

if( !$page_header_hide ) : ?>

    <div class="services-main__banner">
        <?php if( has_post_thumbnail() ) : ?>
            <img src="<?=get_the_post_thumbnail_url( null, 'full' ); ?>">
        <?php endif; ?>

        <div class="services-main__banner-content">
            <div class="container">
                <div class="services-main__banner-inner">
                    <?php get_template_part( 'template-parts/partials/breadcrumbs' ); ?>

                    <div class="services-main__banner-text">
                        <h1 class="repeater-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endif;


$hero_hide = carbon_get_the_post_meta( 'hero_hide' );
$hero_title = carbon_get_the_post_meta( 'hero_title' );
$hero_description = carbon_get_the_post_meta( 'hero_description' );
$hero_button_title = carbon_get_the_post_meta( 'hero_button_title' );
$hero_image = carbon_get_the_post_meta( 'hero_image' );

if( !$hero_hide && $hero_title && $hero_description ) : ?>

    <div class="services-main__order">
        <div class="container">
            <?php
            
            if( $page_header_hide ) :
                get_template_part( 'template-parts/partials/breadcrumbs' );
            endif;
            
            ?>

            <div class="services-main__order-content <?=$page_header_hide ? 'margin-services' : ''; ?>">
                <div class="services-main__order-items">
                    <div class="services-main__order-item <?=$page_header_hide ? 'width__60' : ''; ?>">
                        <div class="service-main__order-title">
                            <<?=$page_header_hide ? 'h1 class="repeater-title"' : 'p'; ?>><?=$hero_title; ?></<?=$page_header_hide ? 'h1' : 'p'; ?>>
                        </div>

                        <div class="service-main__order-desc <?=$page_header_hide ? 'width__625' : ''; ?>">
                            <?=wpautop( $hero_description ); ?>
                        </div>

                        <?php if( $hero_button_title ) : ?>
                            <div class="service-main__order-btn">
                                <button type="button" data-fancybox data-src="#modal-services"><?=$hero_button_title; ?></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if( $hero_image ) : ?>
                        <div class="services-main__order-item <?=$page_header_hide ? 'width__40 sub-subcategory__img' : ''; ?>">
                            <img src="<?=wp_get_attachment_image_url( $hero_image, 'full' ); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if( $hero_button_title ) : ?>
                        <div class="service-main__order-btn display-none__btn">
                            <button type="button" data-fancybox data-src="#modal-services"><?=$hero_button_title; ?></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php

endif;


$counters_image_desktop = carbon_get_the_post_meta( 'counters_image_desktop' );
$counters_image_mobile = carbon_get_the_post_meta( 'counters_image_mobile' );
$counters_list = carbon_get_the_post_meta( 'counters_list' );

if( !empty( $counters_list ) ) : ?>

    <div class="spincrement padding-blocks">
        <?php if( $counters_image_desktop || $counters_image_mobile ) : ?>
            <picture>
                <?php if( $counters_image_mobile ) : ?>
                    <source srcset="<?=wp_get_attachment_image_url( $counters_image_mobile, 'full' ); ?>" media="(max-width: 991px)">
                <?php endif; ?>
                
                <?php if( $counters_image_desktop ) : ?>
                    <img src="<?=wp_get_attachment_image_url( $counters_image_desktop, 'full' ); ?>">
                <?php endif; ?>
            </picture>
        <?php endif; ?>

        <div class="container">
            <div class="spincrement-inner">
                <?php
                
                foreach( $counters_list as $index => $item ) :
                    if( $index % 2 === 0 ) : ?>
                        <div class="spincrement-items">
                    <?php endif; ?>

                    <div class="spincrement-item">
                        <p>
                            <?php if( $item['prefix'] ) : ?>
                                <span class="spincrement-size"><?=$item['prefix']; ?><span>
                            <?php endif; ?>

                            <?php if( $item['number'] ) : ?>
                                <span><?=$item['number']; ?></span>
                            <?php endif; ?>

                            <?php if( $item['suffix'] ) : ?>
                                <?=$item['suffix']; ?>
                            <?php endif; ?>
                        </p>

                        <span></span>

                        <?php if( $item['description'] ) : ?>
                            <p><?=$item['description']; ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if( $index !== 0 && $index % 2 === 1 ) : ?>
                        </div>
                    <?php endif;
                endforeach;
                
                ?>
            </div>
        </div>
    </div>

<?php

endif;


$cars_hide = carbon_get_the_post_meta( 'cars_hide' );
$cars_title = carbon_get_the_post_meta( 'cars_title' );
$cars_type = carbon_get_the_post_meta( 'cars_type' );

if( !$cars_hide && !empty( $cars_type ) ) : ?>

    <div class="services-main__auto padding-blocks">
        <div class="container">
            <div class="repeater-title repeater-title__feedback">
                <?php if( $cars_title ) : ?>
                    <p><?=$cars_title; ?></p>
                <?php endif; ?>

                <div class="swiper-arrows">
                    <div class="swiper-navigation">
                        <span class="swiper-button-prev swiper-prev__auto-main"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                        <span class="swiper-button-next swiper-next__auto-main"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                    </div>
                </div>
            </div>

            <div class="services-main__auto-order">
                <div class="swiper-container">
                    <div class="swiper__services-main__order">
                        <div class="swiper-wrapper">
                            <?php
                            
                            foreach( $cars_type as $types ) :
                                if( !empty( $types ) ) : ?>

                                    <div class="swiper-slide">
                                        <div class="swiper__services-main__item">
                                            <div class="trucks-carousel swiper">
                                                <div class="swiper-wrapper">
                                                    <?php foreach( $types['cars'] as $truck ) : ?>
                                                        <div class="truck-card swiper-slide">
                                                            <img src="<?=wp_get_attachment_image_url( $truck['image'], 'truck-thumb' ); ?>" class="truck-card__image">

                                                            <div class="truck-card__title"><?=$truck['title']; ?></div>

                                                            <div class="truck-card__description"><?=wpautop( $truck['description'] ); ?></div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                
                                                <div class="trucks-carousel__navigation swiper-navigation">
                                                    <span class="swiper-button-prev swiper-prev__auto"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                                                    <span class="swiper-button-next swiper-next__auto"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="button button--primary" data-fancybox data-src="#modal-services"><?=__( 'Замовити', 'gti' ); ?></button>
                                    </div>

                            <?php

                                endif;
                            endforeach;
                            
                            ?>
                        </div>
                    </div>
                </div>

                <div class="swiper-arrows">
                    <div class="swiper-navigation">
                        <span class="swiper-button-prev swiper-prev__auto-main__mobile"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                        <span class="swiper-button-next swiper-next__auto-main__mobile"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endif;


$services_hide = carbon_get_the_post_meta( 'services_hide' );
$services_title = carbon_get_the_post_meta( 'services_title' );
$services_items = carbon_get_the_post_meta( 'services_items' );
$services_display_type = carbon_get_the_post_meta( 'services_display_type' );
$services_content_left = carbon_get_the_post_meta( 'services_content_left' );
$services_content_right = carbon_get_the_post_meta( 'services_content_right' );

if( !$services_hide ) : ?>

    <div class="more-services padding-blocks">
        <div class="container">
            <?php if( $services_title ) : ?>
                <div class="repeater-title repeater-title__feedback">
                    <p><?=$services_title; ?></p>
                </div>
            <?php endif; ?>

            <?php if( !empty( $services_items ) ) : ?>
                <div class="more-services__items">
                    <?php foreach( $services_items as $service ) : ?>
                        <div class="more-services__inner <?=$services_display_type === 'two_columns' ? 'width__50' : ''; ?>">
                            <div class="more-services__item">
                                <a href="<?=get_permalink( $service['id'] ); ?>"></a>

                                <div class="more-service__item-img">
                                    <img src="<?=get_the_post_thumbnail_url( $service['id'], $services_display_type === 'two_columns' ? 'service-thumb' : 'service-thumb-small' ); ?>">
                                </div>
                                    
                                <div class="more-service__item-title"><p><?=get_the_title( $service['id'] ); ?></p></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if( $services_content_left || $services_content_right ) : ?>
                <div class="more-services__content">
                    <?php if( $services_content_left ) : ?>
                        <div class="more-services__text"><?=wpautop( $services_content_left ); ?></div>
                    <?php endif; ?>

                    <?php if( $services_content_right ) : ?>
                        <div class="more-services__text"><?=wpautop( $services_content_right ); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php

endif;


$partners_hide = carbon_get_the_post_meta( 'partners_hide' );
$partners_title = carbon_get_the_post_meta( 'partners_title' );
$partners_logo = carbon_get_the_post_meta( 'partners_logo' );

if( !$partners_hide && !empty( $partners_logo ) ) : ?>

    <div class="partners padding-blocks">
        <div class="container">
            <div class="repeater-title repeater-title__feedback">
                <?php if( $partners_title ) : ?>
                    <p><?=$partners_title; ?></p>
                <?php endif; ?>

                <div class="swiper-arrows">
                    <div class="swiper-navigation">
                        <span class="swiper-button-prev swiper-prev__partner"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                        <span class="swiper-button-next swiper-next__partner"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                    </div>
                </div>
            </div>

            <div class="partners-inner">
                <div class="partners-items partners-slider swiper-container">
                    <div class="swiper-wrapper ">
                        <?php foreach( $partners_logo as $item ) : ?>
                            <div class="swiper-slide">
                                <div class="partner-item">
                                    <?=wp_get_attachment_image( $item, 'full' ); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="swiper-arrows">
                        <div class="swiper-navigation">
                            <span class="swiper-button-prev swiper-prev__mob-partner"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                            <span class="swiper-button-next swiper-next__mob-partner"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endif;


$calculator_hide = carbon_get_the_post_meta( 'calculator_hide' );
$calculator_title = carbon_get_the_post_meta( 'calculator_title' );
$calculator_subtitle = carbon_get_the_post_meta( 'calculator_subtitle' );
$calculator_button_title = carbon_get_the_post_meta( 'calculator_button_title' );
$calculator_button_link = carbon_get_the_post_meta( 'calculator_button_link' );
$calculator_image = carbon_get_the_post_meta( 'calculator_image' );

if( !$calculator_hide && $calculator_title && $calculator_subtitle && $calculator_image ) : ?>

    <div class="repeater-block padding-blocks">
        <div class="container">
            <div class="repeater-block__inner">
                <div class="repeater-block__content">
                    <div class="repeater-title">
                        <p><?=$calculator_title; ?></p>
                    </div>
                    
                    <span class="repeater-line"></span>
                    
                    <div class="repeater-block__desc">
                        <p><?=$calculator_subtitle; ?></p>
                    </div>
                    
                    <?php if( $calculator_button_title && !empty( $calculator_button_link ) ) : ?>
                        <div class="repeater-block__button">
                            <a href="<?=get_permalink( $calculator_button_link[0]['id'] ); ?>" class="button button--primary"><?=$calculator_button_title; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                    
                <?php if( $calculator_image ) : ?>
                    <div class="repeater-block__img">
                        <img src="<?=wp_get_attachment_image_url( $calculator_image, 'full' ); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php

endif;


$faq_hide = carbon_get_the_post_meta( 'faq_hide' );
$faq_title = carbon_get_the_post_meta( 'faq_title' );
$faq_items = carbon_get_the_post_meta( 'faq_items' );

if( !$faq_hide && !empty( $faq_items ) ) : ?>

    <div class="faq padding-blocks margin-none">
        <div class="container">
            <div class="faq__inner">
                <?php if( $faq_title ) : ?>
                    <div class="faq-title repeater-title margin-none">
                        <p><?=$faq_title; ?></p>
                    </div>
                <?php endif; ?>

                <div class="faq-items">
                    <?php
                            
                    foreach( $faq_items as $index => $item ) :
                        if( $index === 0 && $index % intval( ceil( count( $faq_items ) / 2 ) ) === 0 ) : ?>
                            <div class="faq__columns">
                        <?php elseif( $index !== 0 && $index % intval( ceil( count( $faq_items ) / 2 ) ) === 0 ) : ?>
                            </div>
                            <div class="faq__columns">
                        <?php endif; ?>

                        <div class="faq-item__inner">
                            <div class="faq-item">
                                <div class="faq__question">
                                    <p><?=$item['question']; ?></p>

                                    <span class="faq__plus-minus">
                                        <span class="plus"></span>
                                        <span class="minus"></span>
                                    </span>
                                </div>

                                <div class="faq__answer">
                                    <p><?=wpautop( $item['answer'] ); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php if( $index === count( $faq_items ) - 1 ) : ?>
                            </div>
                        <?php
                            
                            endif;
                        endforeach;
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endif;


$seo_hide = carbon_get_the_post_meta( 'seo_hide' );
$seo_title = carbon_get_the_post_meta( 'seo_title' );
$seo_content = carbon_get_the_post_meta( 'seo_content' );

if( !$seo_hide && $seo_content ) : ?>

    <div class="seo padding-blocks">
        <div class="container">
            <?php if( $seo_title ) : ?>
                <div class="seo-title">
                    <p><?=$seo_title; ?></p>
                </div>
            <?php endif; ?>
            
            <div class="seo-inner seo-blog">
                <?=wpautop( $seo_content ); ?>
            </div>
        </div>
    </div>

<?php

endif;

get_footer();