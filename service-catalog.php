<?php

/**
 * Template Name: Каталог послуг
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();

?>

    <div class="banner-services">
        <?php if( has_post_thumbnail() ) : ?>
            <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
        <?php endif; ?>

        <div class="banner-services__content">
            <div class="container">
                <div class="banner-services__inner">
                    <?php get_template_part( 'template-parts/partials/breadcrumbs' ); ?>

                    <div class="banner-services__filling">
                        <div class="banner-services__title">
                            <h1><?php the_title(); ?></h1>
                            <span></span>
                        </div>

                        <?php if( $page_description = carbon_get_the_post_meta( 'page_header_description' ) ) : ?>
                            <div class="banner-services__desc"><?=wpautop( $page_description ); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$services_hide = carbon_get_the_post_meta( 'services_hide' );
$services_items = carbon_get_the_post_meta( 'services_items' );

if( !$services_hide && !empty( $services_items ) ) : ?>

    <div class="services services__padding padding-blocks">
        <div class="container">
            <div class="services-inner services-top">
                <div class="services-items">
                    <?php foreach( $services_items as $service ) : ?>
                        <div class="services-item">
                            <a href="<?=get_permalink( $service['id'] ); ?>"></a>

                            <div class="services-img">
                                <img src="<?=get_the_post_thumbnail_url( $service['id'], 'service-thumb' ); ?>">
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