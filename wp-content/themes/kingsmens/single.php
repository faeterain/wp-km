<?php get_header(  ) ?>
<div class="page content <?php echo get_post_format(); ?>">
    <?php 
        $content = get_post_format();
        if($content == 'gallery'){
            
    ?>
                <div id="main-content">
    <?php
        }else{
    ?>
    
                <div id="single">
    
    <?php } ?>
    
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php if( $content == 'gallery'): ?>
            
            <?php get_template_part( 'content-detail-gallery' ); ?>

            <?php elseif( is_single()): ?>
            
            <?php get_template_part( 'content', 'single' ); ?>
            <?php comments_template(); ?>

            <?php else: ?>
            <?php get_template_part( 'content', $content ); ?>

            <?php endif; ?>
            <!--<?php get_template_part( 'author-bio' ); ?>-->

        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

    </div>
</div>
<?php get_footer() ?>