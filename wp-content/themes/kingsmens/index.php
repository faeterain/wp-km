<?php get_header(  ) ?>
<div class="content">
    <div id="main-content">
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>

        <?php endwhile ?>
        <?php kingsmen_pagination(); ?>
        <?php else: ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
    <?php 
// echo do_shortcode('[smartslider3 slider=1]');
?>
    </div>
</div>
<?php get_footer() ?>