<?php

/**
 * Template Name: Головна сторінка
 *
 * @package     GTI
 * @since       1.0.0
 */

get_header();


$slider_items = carbon_get_the_post_meta( 'slider_items' );

if( $slider_items ) : ?>

    <div class="banner">
        <div class="swiper-container banner-swiper">
            <div class="banner-swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $slider_items as $index => $slide ) : ?>
                        <div class="swiper-slide banner-slider">
                            <img class="zoom-image" src="<?=wp_get_attachment_image_url( $slide['image'], 'full' ); ?>" alt="<?=$slide['title']; ?>">

                            <div class="swiper-slide__container">
                                <div class="swiper-slide__content">
                                    <<?=$index === 0 ? 'h1' : 'div'; ?>><?=$slide['title']; ?></<?=$index === 0 ? 'h1' : 'div'; ?>>

                                    <?php if( $slide['subtitle'] ) : ?>
                                        <p><?=$slide['subtitle']; ?></p>
                                    <?php endif; ?>

                                    <button type="button" class="button-banner"><?=$slide['button_title']; ?></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if( $badges = carbon_get_the_post_meta( 'slider_badges' ) ) : ?>
                <div class="swiper-services">
                    <div class="swiper-services__container">
                        <div class="swiper-services__inner">
                            <div class="swiper-services__items">
                                <?php foreach( $badges as $index => $badge ) : ?>
                                    <div class="swiper-services__item">
                                        <div class="swiper-services__number">
                                            <span><?=$index + 1; ?></span>
                                        </div>

                                        <div class="swiper-services__text">
                                            <p><?=$badge['title']; ?></p>
                                            <p><?=$badge['subtitle']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="swiper-pagination"></div>
        </div>
    </div>

<?php

endif;


$services_hide = carbon_get_the_post_meta( 'services_hide' );
$services_title = carbon_get_the_post_meta( 'services_title' );
$services_items = carbon_get_the_post_meta( 'services_items' );

if( !$services_hide && !empty( $services_items ) ) : ?>

    <div class="services services__padding-main padding-blocks">
        <div class="container">
            <?php if( $services_title ) : ?>
                <div class="repeater-title">
                    <p><?=$services_title; ?></p>
                </div>
            <?php endif; ?>

            <div class="services-inner">
                <div class="services-items">
                    <?php foreach( $services_items as $service ) : ?>
                        <div class="services-item">
                            <a href="<?=get_permalink( $service['id'] ); ?>"></a>

                            <div class="services-img">
                                <img src="<?=get_the_post_thumbnail_url( $service['id'], 'service-thumb' ); ?>" alt="<?=get_the_title( $service['id'] ); ?>">
                            </div>

                            <div class="services-title">
                                <span><?=gti_get_icon( 'arrow-right' ); ?></span>
                                <p><?=get_the_title( $service['id'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

<?php

endif;


$testimonials_hide = carbon_get_the_post_meta( 'testimonials_hide' );
$testimonials_title = carbon_get_the_post_meta( 'testimonials_title' );
$testimonials_amount = carbon_get_the_post_meta( 'testimonials_amount' );
$testimonials_query = gti_get_testimonials_query( $testimonials_amount );

if( !$testimonials_hide && $testimonials_query->have_posts() ) : ?>

    <div class="feedback padding-blocks">
        <div class="container">
            <div class="repeater-title repeater-title__feedback">
                <?php if( $testimonials_title ) : ?>
                    <p><?=$testimonials_title; ?></p>
                <?php endif; ?>

                <div class="swiper-arrows">
                    <div class="swiper-navigation">
                        <span class="swiper-button-prev swiper-feedback__prev"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                        <span class="swiper-button-next swiper-feedback__next"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                    </div>
                </div>
            </div>

            <div class="feedback-inner">
                <div class="feedback-items feedback-slider swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        
                        while( $testimonials_query->have_posts() ) :
                            $testimonials_query->the_post();

                            ?>

                            <div class="swiper-slide">
                                <?php get_template_part( 'template-parts/testimonial' ); ?>
                            </div>

                            <?php

                        endwhile;

                        wp_reset_postdata();

                        ?>
                    </div>

                    <div class="swiper-arrows">
                        <div class="swiper-navigation">
                            <span class="swiper-button-prev swiper-feedback__mob-prev"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                            <span class="swiper-button-next swiper-feedback__mob-next"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
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