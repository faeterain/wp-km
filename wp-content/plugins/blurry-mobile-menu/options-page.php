<div id="blurry-options-wrap" class="widefat" style="display: none;">
<?php
    function custom_do_settings_sections($page) {
        global $wp_settings_sections, $wp_settings_fields;

        if ( !isset($wp_settings_sections) || !isset($wp_settings_sections[$page]) )
            return;

        foreach( (array) $wp_settings_sections[$page] as $section ) {
            echo "<div class='postbox'><h3 class='hndle'><span>{$section['title']}</span></h3>\n";
            call_user_func($section['callback'], $section);
            if ( !isset($wp_settings_fields) ||
                 !isset($wp_settings_fields[$page]) ||
                 !isset($wp_settings_fields[$page][$section['id']]) )
                    continue;
            echo '<div class="settings-form-wrapper '. $section['id'] . '">';
            custom_do_settings_fields($page, $section['id']);
            echo "<input name='Submit' type='submit' class='button-primary' value='Save Changes' />";
            echo '</div></div>';
        }
    }

    function custom_do_settings_fields($page, $section) {
        global $wp_settings_fields;

        if ( !isset($wp_settings_fields) ||
             !isset($wp_settings_fields[$page]) ||
             !isset($wp_settings_fields[$page][$section]) )
            return;

        foreach ( (array) $wp_settings_fields[$page][$section] as $field ) {
            echo '<div class="settings-form-row'. (!empty($field['args']['hidden']) ? ' hidden-row' : '') . ' ' . $field['id'] .'">';
            if ( !empty($field['args']['label_for']) ) {
                echo '<p><label for="' . $field['args']['label_for'] . '">' . $field['title'] . '</label><br />';
            }
            else {
                echo '<p><span class="field-title">' . $field['title'] . '</span>';
            }
            call_user_func($field['callback'], $field['args']);
            echo '</p></div>';
        }
    }
    screen_icon();
?>
<h2 class="form-title">Blurry Mobile Nav settings</h2>
<form method="post" action="options.php" enctype="multipart/form-data">
	<aside id="about" class="">
    <div id="sf"><p>Looking for beautiful and responsive sliding menu working both on desktops and mobiles? Check out our another menu <a href="http://superfly.looks-awesome.com/">Superfly 2 — WordPress Vertical Menu Plugin</a>.</p></div>
		<div id="la">Made with love by <a href="http://looks-awesome.com">Looks Awesome</a></div>
		<div id="bl-notice"><h6>Notice</h6><p>There is no paid version of Blurry and all premium features available for free. For this reason Blurry is provided "as is" and doesn't include support.
			</p><p>If you experience any issues please try to find answer in FAQ.</p></div>
	</aside>
<?php settings_fields('blurry_options'); ?>
<?php custom_do_settings_sections('blurry'); ?>

</form>
</div>
<script type="text/javascript">
  (function(){
      var $ = window.jQuery;
	    var current;
      var isLS = 'sessionStorage' in window && window['sessionStorage'] !== null;


	    if($ != null) {
	        if (isLS) {
		        current = sessionStorage.getItem('blurry-section-scroll');

		        if (current) {
			        $('html, body').scrollTop(current);
			        setTimeout(function(){$('html, body').scrollTop(current)}, 0);
		        }

		        $(window).unload(function (e) {
			        sessionStorage.setItem('blurry-section-scroll', $('body').scrollTop() || $('html').scrollTop());
		        });
	        }
		      $(function(){
			      document.getElementById('blurry-options-wrap').style.display = 'block';
		      })
        } else {
            document.getElementById('blurry-options-wrap').style.display = 'block';
        }


    }())
</script>
