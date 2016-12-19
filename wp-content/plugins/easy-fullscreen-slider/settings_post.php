<?php
if(!class_exists('EasyFullscreenSliderPostSettings')){
    class EasyFullscreenSliderPostSettings
    {
        private $plugins_url;
        /**
        * Construct the settings object
        */
        public function __construct(){
            // register actions
            add_action('add_meta_boxes', array(&$this, 'efs_register_meta_box'));
            add_action('save_post', array(&$this, 'efs_save_post'));
            $this->plugins_url = plugins_url();
        }
       
        /**
         * Register meta boxes
         */
        public function efs_register_meta_box(){
            add_meta_box('efslider_meta_box', 'Easy Fullscreen Slider - Settings', array(&$this, 'efslider_meta_box'), 'post', 'normal');
            add_meta_box('efslider_meta_box', 'Easy Fullscreen Slider - Settings', array(&$this, 'efslider_meta_box'), 'page', 'normal');
            
        }
        public function efslider_meta_box($post){
            //get post_meta vaules
            $values = get_post_meta($post->ID, 'efslider', true);
            $default_values = get_option('efs-settings');
            
            if(!$values){
                $values['transition_effect'] = $default_values['transition_effect'];
                $values['controlls'] = $default_values['controlls'];
                $values['autoplay'] = $default_values['autoplay'];
                $values['disable'] = $default_values['disable'];
                $values['transition_speed'] = $default_values['transition_speed'];
                $values['slide_interval'] = $default_values['slide_interval'];
                $values['slides'] = '';
                $values['progress_bar'] = $default_values['progress_bar'];
                $values['thumbnail_navigation'] = $default_values['thumbnail_navigation'];
                $values['background_pattern'] = $default_values['background_pattern'];
            }
            $values['bg_pattern_filename'] = basename($values['background_pattern']);
            //efslider scripts
            wp_register_script('efslideradmin', plugins_url('assets/js/efslideradmin.js', __FILE__), array('jquery', 'media-upload', 'thickbox'), '2.0.1');
            wp_enqueue_script('efslideradmin');
            wp_register_style( 'efslideradmin', plugins_url('assets/css/efslideradmin.css', __FILE__), array(), '2.0.1');
            wp_enqueue_style('efslideradmin');
            
            require_once(plugin_dir_path( __FILE__ ).'templates/settings_post.php');
        }
        public function efs_save_post($post_id = false, $post = false){
            //update meta post values
            if($_POST){
                $values = array(
                    'transition_effect' => $_POST['transition_effect'],
                    'controlls' => $_POST['controlls'],
                    'autoplay' => $_POST['autoplay'],
                    'disable' => $_POST['disable'],
                    'transition_speed' => $_POST['transition_speed'],
                    'slides' => $_POST['efs-slides'],
                    'slide_interval' => $_POST['slide_interval'],
                    'progress_bar' => $_POST['progress_bar'],
                    'thumbnail_navigation' => $_POST['thumbnail_navigation'],
                    'background_pattern' => $_POST['background_pattern'],
                    );
                update_post_meta( $post_id, 'efslider', $values);
            }
        }
    }
}
