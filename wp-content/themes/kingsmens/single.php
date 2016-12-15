<?php get_header(  ) ?>
<div class="page content">
    <div id="single">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php if( is_single()): ?>
            
            <?php get_template_part( 'content', 'single' ); ?>

            <?php else: ?>
            <?php get_template_part( 'content', get_post_format() ); ?>

            <?php endif; ?>
            <!--<?php get_template_part( 'author-bio' ); ?>-->
            <?php comments_template(); ?>

        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

    </div>
</div>
<?php get_footer() ?>