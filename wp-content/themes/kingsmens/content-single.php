<?php kingsmen_entry_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
        <div class="entry-thumbnail-large">
            <?php kingsmen_thumbnail('large'); ?>
        </div>
        <div class="entry-content">
            <?php kingsmen_entry_content(); ?>
            <?php ( is_single() ? kingsmen_entry_tag():''); ?>
        </div>
        <div class="clearfix"></div>
</article>