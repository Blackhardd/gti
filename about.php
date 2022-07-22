<?php

/**
 * Template Name: Про нас
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();

?>

    <div class="breadcrumbs">
        <div class="container">
            <div class="main-page">
                <a href="<?=home_url(); ?>" class="main-text"><?=__( 'Головна', 'gti' ); ?></a>
                <div class="separator">/</div>
                <p><?php the_title(); ?></p>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="container">
            <div class="about__inner">
                <div class="about__title">
                    <h1><?=carbon_get_the_post_meta( 'hero_title' ); ?></h1>
                </div>

                <div class="about__desc"><?=wpautop( carbon_get_the_post_meta( 'hero_description' ) ); ?></div>
            </div>
        </div>
    </div>

<?php

$counters_image_desktop = carbon_get_the_post_meta( 'counters_image_desktop' );
$counters_image_mobile = carbon_get_the_post_meta( 'counters_image_mobile' );
$counters_list = carbon_get_the_post_meta( 'counters_list' );

if( !empty( $counters_list ) ) : ?>

    <div class="spincrement padding-blocks">
        <?php if( $counters_image_desktop || $counters_image_mobile ) : ?>
            <picture class="about-us">
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


$company_hide = carbon_get_the_post_meta( 'company_hide' );
$company_image = carbon_get_the_post_meta( 'company_image' );
$company_content_left = carbon_get_the_post_meta( 'company_content_left' );
$company_content_right = carbon_get_the_post_meta( 'company_content_right' );
$company_services = carbon_get_the_post_meta( 'company_services' );

if( !$company_hide ) : ?>

    <div class="about-content padding-block__bottom">
        <div class="container">
            <div class="about-content__inner">
                <?php if( $company_image ) : ?>
                    <div class="about-content__img">
                        <img src="<?=wp_get_attachment_image_url( $company_image, 'full' ); ?>">
                    </div>
                <?php endif; ?>

                <?php if( $company_content_left || $company_content_right ) : ?>
                    <div class="about-content__text">
                        <?php if( $company_content_left ) : ?>
                            <div>
                                <?=wpautop( $company_content_left ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( $company_content_right ) : ?>
                            <div>
                                <?=wpautop( $company_content_right ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if( !empty( $company_services ) ) : ?>

        <div class="padding-blocks about-services">
            <div class="container">
                <div class="about-services__inner">
                    <div class="about-services__items">
                        <?php foreach( $company_services as $index => $service ) : ?>
                            <div class="about-services__item">
                                <div class="about-services__number">
                                    <span><?=$index + 1; ?></span>
                                </div>

                                <div class="about-services__text">
                                    <p><?=$service['title']; ?></p>
                                    <p><?=$service['subtitle']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    endif;
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

get_footer();