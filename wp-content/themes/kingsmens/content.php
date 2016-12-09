<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="entry-thumbnail">
        <?php kingsmen_thumbnail('thumbnail'); ?>
    </div>
    <div class="entry-header">
        <?php kingsmen_entry_header(); ?>
        <?php kingsmen_entry_meta(); ?>
    </div>
    <div class="entry-content">
        <?php kingsmen_entry_content(); ?>
        <?php ( is_single() ? kingsmen_entry_tag():''); ?>
    </div>
</article>