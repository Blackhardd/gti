<div class="feedback-item">
    <div class="feedback-person">
        <?php if( has_post_thumbnail( get_the_ID() ) ) : ?>
            <div class="feedback-img">
                <?php the_post_thumbnail( 'testimonial-thumb' ); ?>
            </div>
        <?php endif; ?>

        <div class="feedback-name">
            <div class="feedback-name__name"><?php the_title(); ?></div>

            <?php if( $company = carbon_get_the_post_meta( 'company' ) ) : ?>
                <div class="feedback-name__company"><?=$company; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="feedback-content">
        <?php the_content(); ?>
    </div>

    <div class="feedback-date">
        <p><?=get_the_date( 'd.m.Y' ); ?></p>
    </div>
</div>