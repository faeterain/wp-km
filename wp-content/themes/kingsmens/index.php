<?php get_header(  ) ?>
<div class="page content">
    <div id="index">
        <div class="entry-header">
        <h2>Kingsmen Group News Updates</h2>
        </div>
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile ?>
        <?php kingsmen_pagination(); ?>
        <?php else: ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer() ?>