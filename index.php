<?php

/**
 * The main template file.
 *
 * @package GTI
 * @since GTI 1.0.0
 */

get_header();

if( have_posts() ) :
    while( have_posts() ) :
        the_post();

        ?>
        
            <div class="container">
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
            </div>

        <?php

    endwhile;
else :

?>

    <div class="container">
        <div class="posts-not-found">
            <h2 align="center" class="posts-not-found__title"><?=__( 'Постів не знайдено', 'gti' ); ?></h2>
        </div>
    </div>

<?php

endif;

get_footer();