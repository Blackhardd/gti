<?php if( !is_front_page() ) : ?>

    <div class="breadcrumbs">
            <a href="<?=home_url(); ?>" class="breadcrumbs__link breadcrumbs__link--home"><?=__( 'Головна', 'gti' ); ?></a>

            <?php if( is_single() ) : ?>
                <span class="breadcrumbs__separator">/</span>
                <a href="<?=get_permalink( get_option('page_for_posts', true) ); ?>" class="breadcrumbs__link"><?=get_the_title( get_option('page_for_posts', true) ); ?></a>
            <?php

            endif;
            
            if( $parents = get_post_ancestors( get_the_ID() ) ) :
                foreach( array_reverse( $parents ) as $parent ) : ?>
                    <span class="breadcrumbs__separator">/</span>
                    <a href="<?=get_permalink( $parent ); ?>" class="breadcrumbs__link"><?=get_the_title( $parent ); ?></a>
            <?php

                endforeach;
            endif;

            ?>

            <span class="breadcrumbs__separator">/</span>
            <span class="breadcrumbs__current"><?php the_title(); ?></span>
    </div>

<?php endif; ?>