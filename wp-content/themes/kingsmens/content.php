
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <a href="<?php the_permalink(); ?>" >
        <div class="entry-thumbnail">
            <?php kingsmen_thumbnail('thumbnail'); ?>
        </div>
        <div class="entry-header">
            <?php kingsmen_entry_datepost(); ?>
            <?php kingsmen_entry_header(); ?>
        </div>
        <div class="entry-content">
            <?php kingsmen_entry_content(); ?>
            <?php ( is_single() ? kingsmen_entry_tag():''); ?>
        </div>
        <div class="clearfix"></div>
    </a>
</article>