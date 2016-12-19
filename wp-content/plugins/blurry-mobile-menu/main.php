<?php
/*
Plugin Name: Blurry Mobile menu
Plugin URI: http://blurry.looks-awesome.com
Description: Dimmed menu to add stylish  navigation for mobiles
Version: 1.0.0
Authors: Looks Awesome
Author URI: http://looks-awesome.com/
Text Domain: blurry
Domain Path: /lang
*/


global $blurry_options;

load_plugin_textdomain('blurry', false, basename( dirname( __FILE__ ) ) . '/lang' );

include_once(dirname(__FILE__) . '/settings.php');

add_action('wp_enqueue_scripts', 'blurry_scripts');

add_action( 'admin_menu', 'blurry_menu' );

function blurry_menu() {
    add_options_page( 'Blurry Options', 'Blurry Mobile Nav', 'manage_options', 'blurry-options', 'blurry_page' );
}

/**
 * Settings page in the WP Admin
 */
function blurry_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'blurry' ) );
	}
  wp_enqueue_script("jquery");
	wp_enqueue_script( 'tinycolor', plugins_url('/js/tinycolor.js', __FILE__) );
	wp_enqueue_script( 'blurry_colorpickersliders', plugins_url('/js/jquery.colorpickersliders.js', __FILE__) );
	wp_enqueue_script( 'blurry_dlmenu', plugins_url('/js/dlmenu.js', __FILE__) );

	//wp_register_style('open-sans-font', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	wp_register_style('open-sans-font', '//fonts.googleapis.com/css?family=Open+Sans:300normal,400normal,400italic,600normal,600italic&subset=all' );
	wp_enqueue_style( 'open-sans-font' );
  wp_register_style('colorpickersliders-ui-css', plugins_url('/css/jquery.colorpickersliders.css', __FILE__));
	wp_enqueue_style( 'colorpickersliders-ui-css' );
	wp_register_style('blurry-awesome-font', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
	wp_enqueue_style( 'blurry-awesome-font' );

  wp_register_style('admin-css', plugins_url('/css/admin.css', __FILE__));
	wp_enqueue_style( 'admin-css' );

	include_once(dirname(__FILE__) . '/options-page.php');
}


add_filter('plugin_action_links_blurry/main.php', 'blurry_plugin_action_links', 10, 1);
//add_filter( 'wp_nav_menu_items', 'blurry_nav_class', 10, 2 );
//add_filter( 'wp_page_menu', 'blurry_page_menu_class', 10, 2 );
add_filter( 'wp_nav_menu_args', 'blurry_page_menu_class', 10, 2 );

function blurry_plugin_action_links($links) {
	$settings_page = add_query_arg(array('page' => 'blurry-options'), admin_url('options-general.php'));
	$settings_link = '<a href="'.esc_url($settings_page).'">'.__('Settings', 'blurry' ).'</a>';
	array_unshift($links, $settings_link);
	return $links;
}

function blurry_nav_class( $items, $args ) {
	die('Callback was called!');
		$options = blurry_get_options();

    if($args->theme_location == $options['blurry_active_menu'] ) {
        $items = '<li id="blurry-marker"></li>' . $items;
    }

    return '';
}

function blurry_page_menu_class( $args ) {

	$options = blurry_get_options();

	if (isset($args['menu_class']) && isset($args['theme_location'] ) && $args['theme_location'] == $options['blurry_active_menu']) {
		$args['menu_class'] = $args['menu_class'] . ' blurry-menu';
	}

	return $args;
}

add_action('wp_footer', 'blurry_main_html');

function blurry_main_html() {
	global $wpdb;
	$options = blurry_get_options();
	include_once(dirname(__FILE__) . '/blurry.php');
}

function blurry_scripts() {
    $options = blurry_get_options();
	 wp_enqueue_script(
		'blurry_main',
	  plugins_url('/js/blurry.js', __FILE__),
//		plugins_url('/js/blurry.min.js', __FILE__),
		array('jquery')
	);

	wp_localize_script( 'blurry_main', 'blurry_Opts', array(
				'test_mode' => $options['blurry_test_mode'],
				'path' => plugins_url('/img/', __FILE__),
				'menu_animation' => $options['blurry_menu_animation'],
				'gen_width' => $options['blurry_gen_width'],
				'navbar_blur' => $options['blurry_tab_style'] == 'blur',
				'togglers' => $options['blurry_togglers'],
				'hideDefMenu' => $options['blurry_hide_def'],
				'addHomeLink' => $options['blurry_add_main'],
				'addHomeText' => $options['blurry_main_text'],
				'subMenuSupport' => $options['blurry_submenu_support'],
				'subMenuSelector' => $options['blurry_submenu_classes'],
				'activeClassSelector' => 'current-menu-item',
				'allowedTags' => 'DIV, NAV, UL, OL, LI, A, P, H1, H2, H3, H4, SPAN'
		)
    );

	wp_register_style('open-sans-font', '//fonts.googleapis.com/css?family=Open+Sans:300normal,400normal,400italic,600normal,600italic&subset=all' );
	wp_enqueue_style( 'open-sans-font' );

	wp_register_style( 'blurry_styles', plugins_url('/css/blurry.css', __FILE__) );
	wp_enqueue_style( 'blurry_styles' );
}


function bl_debug_to_console($data) {
	if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
	} else {
		echo("<script>console.log('PHP: ".$data."');</script>");
	}
}

