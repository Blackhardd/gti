<?php

/**
 * Single posts and attachments template.
 * 
 * @since 1.0.0
 * @package GTI
 */

get_header();

?>

    <div class="banner-article">
        <?php the_post_thumbnail( 'full' ); ?>

        <div class="banner-header">
            <div class="banner-header__breadcrumb">
                <div class="container">
                    <?php get_template_part( 'template-parts/partials/breadcrumbs' ); ?>
                </div>
            </div>

            <div class="banner-header__head">
                <div class="container">
                    <div class="banner-header__inner">

                        <div class="banner-header__title">
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <div class="banner-header__date news-item__date">
                            <p><?=get_the_date( 'd F Y' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-article">
        <article>
            <?php the_content(); ?>
        </article>
    </div>

<?php

$random_posts = gti_get_random_posts( 4, [get_the_ID()] );

if( !empty( $random_posts ) ) : ?>

    <div class="interesting-article interesting__padding padding-block__bottom">
        <div class="container">
            <div class="repeater-title repeater-title__feedback">
                <p><?=__( 'Вас може зацікавити', 'gti' ); ?></p>

                <div class="swiper-arrows">
                    <div class="swiper-navigation">
                        <span class="swiper-button-prev swiper-interesting__prev-pc"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                        <span class="swiper-button-next swiper-interesting__next-pc"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                    </div>
                </div>
            </div>

            <div class="swiper-container swiper-interesting">
                <div class="swiper-wrapper">
                    <?php foreach( $random_posts as $post ) : ?>
                        <div class="swiper-slide">
                            <div class="interesting-article__item">
                                <a href="<?=get_permalink( $post->ID ); ?>"></a>
                                    
                                <div class="interesting-article__item-content">
                                    <?php if( has_post_thumbnail( $post->ID ) ) : ?>
                                        <div class="interesting-article__item-img">
                                            <img src="<?=get_the_post_thumbnail_url( $post->ID, 'news-card-thumb' ); ?>">
                                        </div>
                                    <?php endif; ?>
                                        
                                    <p><?=$post->post_title; ?></p>
                                </div>
                                    
                                <div class="interesting-article__item-date">
                                    <p><?=get_the_date( 'd F Y', $post->ID ); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-arrows">
                    <div class="swiper-navigation">
                        <span class="swiper-button-prev swiper-interesting__prev-mob"><?=gti_get_icon( 'slider/arrow-left' ); ?></span>
                        <span class="swiper-button-next swiper-interesting__next-mob"><?=gti_get_icon( 'slider/arrow-right' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endif;

get_footer();