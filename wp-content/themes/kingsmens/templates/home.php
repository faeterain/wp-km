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
        <ul class="km-list">
            <?php
                $args = array( 'posts_per_page' => 10, 'order'=> 'DESC');
                $postslist = get_posts( $args );
                foreach ( $postslist as $post ) :
                    setup_postdata( $post ); 
                    if ($post === reset($postslist)){
            ?> 
                        <li>
                            <a href="<?php the_permalink(); ?>" >
                                <?php kingsmen_thumbnail('full'); ?>
                                <div class="latest-title">
                                    <?php the_title(); ?>   
                                </div>
                                <div class="content">
                                    <?php the_date(); ?>
                                    <?php 
                                        the_excerpt("Read more"); 
                                    ?>
                                </div>
                            </a>
                        </li>
            <?php
                    }else{
            ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" >
                                <div class="latest-title">
                                    <?php the_title(); ?>   
                                </div>
                            </a>
                        </li>
            <?php
                    }

                endforeach; 
                wp_reset_postdata();
            ?>
        </ul>
    </div>
</div>
<?php get_footer() ?>
