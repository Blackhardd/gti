        </main>

        <?php

        if( !is_404() && carbon_get_the_post_meta( 'show_footer_action' ) ) :
            get_template_part( 'template-parts/partials/action' );
        endif;
        
        if( is_404() || is_page_template( 'thank-you.php' ) ) :
            get_template_part( 'template-parts/footer/minimal' ); 
        else:
            get_template_part( 'template-parts/footer/default' ); 
        endif;
        
        ?>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>