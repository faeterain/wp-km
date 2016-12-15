<?php 
/**
@ Khai bao hang gia tri 
    @THEME_URL : lay duong dan thu muc theme
    @CORE : lay duong dan thu muc core 
    
**/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");

/**
@ Nhung file core/init.php
**/
require_once(CORE . "/init.php");

/**
@ Thiet lap chieu rong noi dung
**/
if ( !isset($content_width) ){
    $content_width = 620;
}

/**
@ Khai bao chuc nang cua theme 
**/
if ( !function_exists('kingsmen_theme_setup')){
    function kingsmen_theme_setup()
    {
        // Thiet lap textdomain
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain( 'kingsmen', $language_folder );
        
        // Tu dong them link RSS len head
        add_theme_support( 'automatic-feed-links' );

        // Theme post thumbnail
        add_theme_support( 'post-thumbnails' );

        // Post format
        add_theme_support( 'post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ) );

        // Them title-tag
        add_theme_support( 'title-tag' );

        // Them custom background
        $default_background = array(
            'default-color' => '#0B0B0B'
        );
        add_theme_support( 'custom-background', $default_background );

        //Them menu 
        register_nav_menu( 'primary-menu', __('Primary Menu','kingsmen') );

        //Tao sidebar
        $sidebar = array(
            'name' => __('Main Sidebar', 'kingsmen'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>',
        );
        register_sidebar( $sidebar );

    }
    add_action( 'init', 'kingsmen_theme_setup' );
}

/********************
TEMPLATE FUNCTIONS
********************/
// Tao ham goi header
if ( !function_exists('kingsmen_header')){
    function kingsmen_header()
    {?>
        <div class="site-name">
            <?php  
            if ( is_home() ){ 
                printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>', 
                get_bloginfo( 'url' ),
                get_bloginfo( 'description' ),
                get_bloginfo( 'sitename' )
                );
            } else {
                printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>', 
                get_bloginfo( 'url' ),
                get_bloginfo( 'description' ),
                get_bloginfo( 'sitename' )
                );
            }
            ?>
        </div>
        <div class="site-description"><?php bloginfo( 'description' ) ?></div>
    <?php }
}

// Tao menu 


if ( !function_exists('kingsmen_menu')){
    function kingsmen_menu($menu)
    {
        $menu = array(
            'theme_location' => $menu,
            'container' => 'nav',
            'container_class' => $menu
        );
        wp_nav_menu( $menu );
    }
}

//Tao phan trang 
if ( !function_exists('kingsmen_pagination')){
    function kingsmen_pagination()
    {
        if ( $GLOBALS['wp_query']->max_num_pages <2){
            return '';
        }?>
        <nav class="pagination" role="pagination">
            <?php if ( get_next_posts_link(  ) ) : ?>
                <div class="prev"><?php next_posts_link( __('Older Posts', 'kingsmen') ); ?></div>
            <?php endif ?>
            <?php if ( get_previous_posts_link(  ) ) : ?>
                <div class="next"><?php previous_posts_link( __('Newest Posts', 'kingsmen') ); ?></div>
            <?php endif ?>

        </nav>
        <?php
    }
}

// Tao thumbnail 

if ( !function_exists('kingsmen_thumbnail')){
    function kingsmen_thumbnail($size)
    {
        if ( is_single() && has_post_thumbnail() && !post_password_required() || has_post_format( 'image' )) :
        ?>
        <figure class="post-thumbnail">
            <?php the_post_thumbnail( $size ); ?>
        </figure>
        <?php endif;
    }
}


// Tao entry header hien thi tieu de post 

if ( !function_exists('kingsmen_entry_header')){
    function kingsmen_entry_header()
    {?>
        <?php if( is_single() ) : ?>
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <?php else: ?>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <?php endif ?>
    <?php
    }
}

// Tao entry meta lay du lieu tu post

if ( !function_exists('kingsmen_entry_meta')){
    function kingsmen_entry_meta()
    {?>
        <?php if( !is_page() ) : ?>
            <div class="entry-meta">
                <?php
                    printf(__('<span class="author">Posted by %1$s </span>', 'kingsmen'), get_the_author());
                    printf(__('<span class="date-published">at %1$s </span>', 'kingsmen'), get_the_date());
                    printf(__('<span class="category">in %1$s </span>', 'kingsmen'), get_the_category_list( ', ' ));

                    if ( comments_open() ) : 
                        echo '<span class="meta-reply">';
                            comments_popup_link( 
                                __('Leave a comment', 'kingsmen'),
                                __('One comment', 'kingsmen'),
                                __('% comments', 'kingsmen'),
                                __('Read all comments', 'kingsmen')
                             );
                        echo '</span>';
                    endif;
                ?>
            </div>    
        <?php endif ?>
    <?php
    }
}

// Tao post content lay noi dung cua post

if ( !function_exists('kingsmen_entry_content')){
    function kingsmen_entry_content()
    {?>
        <?php if( !is_single() && !is_page() ) : 
            the_excerpt();
            else:
            the_content();
            
            // Phan trang trong single
            $link_pages = array(
                'before' => __('<p>Page: ', 'kingsmen'),
                'after' => '</p>',
                'nextpagelink' => __('Next Page: ', 'kingsmen'),
                'previouspagelink' => __('Previous Page: ', 'kingsmen')
            );
            wp_link_pages( $link_pages );
        endif ?>
    <?php
    }
}


if ( !function_exists('kingsmen_readmore')){
    function kingsmen_readmore()
    {
        return '<a href="'.get_permalink( get_the_ID() ).'" class="read-more">'.__('...[Read More]','kingsmen').'</a>';
    }
}
add_filter( 'excerpt_more', 'kingsmen_readmore' );


// Hien thi tag 

if ( !function_exists('kingsmen_entry_tag')){
    function kingsmen_entry_tag()
    {
        if ( has_tag() ) :
            echo '<div class="entry-tag">';
            printf(__('Tagged in %1$s', 'kingsmen'), get_the_tag_list( '', ', ' ));
            echo '</div>';
        endif;
    }
}

/********************* Nhung file style.css *********************/

function kingsmen_style()
{
    wp_register_style( 'main-style', get_template_directory_uri()."/style.css", 'all' );
    wp_enqueue_style( 'main-style' );
    wp_register_style( 'reset', get_template_directory_uri()."/css/reset.css", 'all' );
    wp_enqueue_style( 'reset' );
    wp_register_style( 'menu', get_template_directory_uri()."/css/menu.css", 'all' );
    wp_enqueue_style( 'menu' );
    wp_enqueue_style( 'reset' );
    wp_register_style( 'publication', get_template_directory_uri()."/css/publication.css", 'all' );
    wp_enqueue_style( 'publication' );
    wp_enqueue_style( 'reset' );
    wp_register_style( 'font', get_template_directory_uri()."/css/font.css", 'all' );
    wp_enqueue_style( 'font' );
}

add_action( 'wp_enqueue_scripts', 'kingsmen_style' );