<?php

/**
 * Template Name: FAQ
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

    <div class="faq">
        <div class="container">
            <div class="faq__inner">
                <div class="faq-title">
                    <h1 class="repeater-title"><?php the_title(); ?></h1>
                </div>

                <?php if( !empty( $faq_items = carbon_get_the_post_meta( 'faq_items' ) ) ) : ?>
                    <div class="faq-items">
                            <?php
                            
                            foreach( $faq_items as $index => $item ) :
                                if( $index === 0 && $index % intval( ceil( count( $faq_items ) / 2 ) ) === 0 ) : ?>
                                    <div class="faq__columns">
                                <?php elseif( $index !== 0 && $index % intval( ceil( count( $faq_items ) / 2 ) ) === 0 ) : ?>
                                    </div>
                                    <div class="faq__columns">
                                <?php endif; ?>

                                <div class="faq-item__inner">
                                    <div class="faq-item">
                                        <div class="faq__question">
                                            <p><?=$item['question']; ?></p>

                                            <span class="faq__plus-minus">
                                                <span class="plus"></span>
                                                <span class="minus"></span>
                                            </span>
                                        </div>

                                        <div class="faq__answer">
                                            <p><?=wpautop( $item['answer'] ); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php if( $index === count( $faq_items ) - 1 ) : ?>
                                    </div>
                            <?php
                                
                                endif;
                            endforeach;
                            
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php

get_footer();