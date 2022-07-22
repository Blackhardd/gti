<?php

/**
 * Template file for displaying testimonials archive.
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
                <p>Отзывы</p>
            </div>
        </div>
    </div>

    <div class="title-pages feedback__title-pages">
        <div class="container">
            <div class="title-pages__inner">
                <h1 class="repeater-title"><?php the_archive_title(); ?></h1>

                <div class="title-pages__desc">
                    <p>Нам подобається те, чим ми займоєось! Ми прагнемо залишити лише найкраші враження від нашої співпраці.</p>
                    <p>Нище представлені наші роботи, наш автопарк та все чим ми займаємось. </p>
                </div>
            </div>
        </div>
    </div>

<?php if( have_posts() ) : ?>

    <div class="feedback-inner feedback-inner__margin">
        <div class="container">
            <div class="feedback-items feedback-flex">
                <?php while( have_posts() ) : the_post(); ?>
                    <div class="feedback-items__inner feedback-width">
                        <?php get_template_part( 'template-parts/testimonial' ); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

<?php

    gti_display_archive_pagination();
endif;


$add_testimonial_hide = get_theme_mod( 'add_testimonial_hide' );

if( !$add_testimonial_hide ) : ?>

    <div class="repeater-block feedback-padding__repeater padding-block__bottom">
        <div class="container">
            <div class="repeater-block__inner">
                <?php
                
                $add_testimonial_title = get_theme_mod( 'add_testimonial_title' );
                $add_testimonial_subtitle = get_theme_mod( 'add_testimonial_subtitle' );
                $add_testimonial_button_title = get_theme_mod( 'add_testimonial_button_title' );
                $add_testimonial_image = get_theme_mod( 'add_testimonial_image' );
                
                ?>

                <div class="repeater-block__content">
                    <div class="repeater-title">
                        <p><?=__( $add_testimonial_title, 'gti' ); ?></p>
                    </div>

                    <span class="repeater-line"></span>
                        
                    <div class="repeater-block__desc">
                        <p><?=__( $add_testimonial_subtitle, 'gti' ); ?></p>
                    </div>
                        
                    <div class="repeater-block__button">
                        <button type="button" class="text-regular" data-fancybox data-src="#modal-feedback"><?=__( $add_testimonial_button_title, 'gti' ); ?></button>
                    </div>
                </div>
                
                <?php if( $add_testimonial_image ) : ?>
                    <div class="repeater-block__img">
                        <img src="<?=wp_get_attachment_image_url( $add_testimonial_image, 'full' ); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php

endif;

get_footer();