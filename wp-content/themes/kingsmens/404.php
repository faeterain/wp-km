<?php get_header(  ) ?>
<div class="content page">
    <div id="notfound">
        <?php
            _e('<div class="content-notfound"><h1>Opps!</h1>', 'kingsmen');
            _e('<h2>404 NOT FOUND</h2></div>', 'kingsmen');
            get_search_form();

            // _e('<h3>Content categories: </h3>', 'kingsmen');
            // echo'<div class="404-cat-list">';
            //     wp_list_categories( array('title_li'=>'') );
            // echo '</div>';

            // _e('Tag Cloud', 'kingsmen');
            // wp_tag_cloud();
        ?>
    
    </div>
    <!--<div id="sidebar">
        <?php 
        get_sidebar(); 
        ?>
    </div>-->
</div>
<?php get_footer() ?>