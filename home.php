<?php

/**
 * Template file for displaying posts page.
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
                <p><?=get_the_title( get_option('page_for_posts', true ) ); ?></p>
            </div>
        </div>
    </div>

    <div class="news-block">
        <div class="container">
            <div class="news-block__title">
                <h1 class="repeater-title"><?=get_the_title( get_option('page_for_posts', true ) ); ?></h1>
            </div>

            <?php if( have_posts() ) : ?>
                <div class="news-items">
                    <?php while( have_posts() ) : the_post(); ?>
                        <div class="news-item__inner">
                            <?php get_template_part( 'template-parts/news' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php

                gti_display_archive_pagination();
            else :
            
            ?>

                <div class="posts-not-found">
                    <h2 align="center" class="posts-not-found__title"><?=__( 'Новин не знайдено', 'gti' ); ?></h2>
                </div>
                
            <?php endif; ?>
        </div>
    </div>

<?php

get_footer();