<?php
/*
Template Name: Home
*/
?>
<?php get_header(  ) ?>
<div class="content">
    <div id="main-content">
    <?php 
        echo do_shortcode('[smartslider3 slider=1]');
    ?>
    </div>
    <div class="latest-news">
        <h2>Latest News</h2>
        <?php
            $recent_posts = wp_get_recent_posts();
            foreach( $recent_posts as $recent ) {

                if ($recent === reset($recent_posts))
                {   
                    echo '<li>';
                    echo get_the_post_thumbnail($recent['ID'], 'full');
                    printf( '<a href="%1$s">%2$s</a></li>',
                        esc_url( get_permalink( $recent['ID'] ) ),
                        apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
                    );
                }else{
                    printf( '<li><a href="%1$s">%2$s</a></li>',
                        esc_url( get_permalink( $recent['ID'] ) ),
                        apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
                    );
                }
            }
        ?>
    </div>
</div>
<?php get_footer() ?>