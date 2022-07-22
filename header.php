<!DOCTYPE html>
<html lang="<?=pll_current_language() === 'ua' ? 'uk' : pll_current_language(); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
        
    if( is_404() || is_page_template( 'thank-you.php' ) ) :
        get_template_part( 'template-parts/header/minimal' ); 
    else:
        get_template_part( 'template-parts/header/default' ); 
    endif;
        
    ?>

    <div class="wrapper scroller">
        <main class="main">