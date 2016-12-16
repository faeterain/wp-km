<?php get_header(  ) ?>
<div class="content page">
    <div id="index">
        <div class="search-info">
            <?php 
                $search_query = new WP_Query( 's='.$s.'&showpost=-1' );
                $search_keyword = wp_specialchars( $s, 1 );
                $search_count = $search_query->post_count;

                printf( __('We found %1$s articles for your search query.', 'kingsmen'), $search_count );
            ?>
        </div>
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'search' ); ?>

        <?php endwhile ?>
        <?php kingsmen_pagination(); ?>
        <?php else: ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

    </div>
</div>
<?php get_footer() ?>