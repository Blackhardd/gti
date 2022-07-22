<div class="news-item">
    <?php if( has_post_thumbnail() ) : ?>
        <div class="news-item__img">
            <div class="news-item__img-inner">
                <?php the_post_thumbnail( 'news-thumb' ); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="news-item__content">
        <div class="news-item__title">
            <p><?php the_title(); ?></p>

            <div class="news-item__date">
                <p><?=get_the_date( 'd F Y' ); ?></p>
            </div>
        </div>

        <div class="news-item__desc">
            <p class="text-regular"><?php the_excerpt(); ?></p>

            <div class="news-item__href">
                <a href="<?php the_permalink(); ?>"><?=__( 'Детальніше', 'gti' ); ?></a>
            </div>
        </div>
    </div>
</div>