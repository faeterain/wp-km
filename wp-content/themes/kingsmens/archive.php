<?php get_header(  ) ?>
<div class="content page">
    <div id="index">
        <div class="archive-title">
            <?php
                if( is_tag() ):
                    printf( __('<h2>%1$s</h2>', 'kingsmen'), single_tag_title('', false));
                elseif( is_category() ):
                    printf( __('<h2>%1$s</h2>', 'kingsmen'), single_cat_title('', false));
                elseif( is_day() ):
                    printf( __('Daily Archives: %1$s', 'kingsmen'), get_the_time( 'l, F j, Y' ) );
                elseif( is_month() ):
                    printf( __('Monthly tagged: %1$s', 'kingsmen'), get_the_time( 'F Y' ) );
                elseif( is_year() ):
                    printf( __('Yearly tagged: %1$s', 'kingsmen'), get_the_time( 'Y' ) );
                endif;
            ?>
        </div>
        <?php if( is_tag() || is_category() ): ?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php endif; ?>
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