<?php

/**
 * Template Name: Калькулятор
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

    <div class="calculator">
        <div class="container">
            <div class="calculator__inner">
                <div class="calculator-title">
                    <h1 class="repeater-title"><?php the_title(); ?></h1>
                </div>
                
                <div class="calculator-content">
                    <div class="calculator-form">
                        <?php get_template_part( 'template-parts/form/calculator' ); ?>
                    </div>
                    
                    <div class="calculator-info">
                        <div class="calculator-info__inner">
                            <div class="calculator-info__tooltip">
                                <?=gti_get_icon( 'cloud' ); ?>
                                <p class="text-regular"><?=__( 'Щоб дізнатися ціну на наші послуги, заповніть усі поля і ми зв\'яжемося з вами протягом дня', 'gti' ); ?></p>
                            </div>

                            <?php if( !empty( $phones = preg_split( '/\r\n|\r|\n/', get_theme_mod( 'contacts_phones' ) ) ) ) : ?>
                                <div class="calculator-info__phones">
                                    <span><?=__( 'Або просто зателефонуйте нам:', 'gti' ); ?></span>
                                    <ul>
                                        <?php foreach( $phones as $phone ) : ?>
                                            <li><a class="text-regular" href="tel:<?=str_replace( ['+', '(', ')', ' '], '', $phone ); ?>"><?=$phone; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$seo_hide = carbon_get_the_post_meta( 'seo_hide' );
$seo_title = carbon_get_the_post_meta( 'seo_title' );
$seo_content = carbon_get_the_post_meta( 'seo_content' );

if( !$seo_hide && $seo_content ) : ?>

    <div class="seo seo__padding padding-blocks">
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