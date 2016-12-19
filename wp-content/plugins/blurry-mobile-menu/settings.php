<?php

add_action( 'admin_init', 'blurry_register_settings' );

function blurry_register_settings() {


	register_setting( 'blurry_options', 'blurry_options', 'blurry_options_validate' );

	add_settings_section('blurry_mode', 'Plugin mode', 'blurry_section', 'blurry');
	add_settings_field('blurry_test_mode', "Test mode during setup", 'blurry_test_mode_str', 'blurry', 'blurry_mode');


	add_settings_section('blurry_menu', 'Source for menu', 'blurry_section', 'blurry');
	add_settings_field('blurry_active_menu', "Theme location which menu Blurry will replace:", 'blurry_active_menu_str', 'blurry', 'blurry_menu');

	add_settings_section('blurry_appearance', 'Appearance Settings', 'blurry_section', 'blurry');
	add_settings_field('blurry_tab_style', "Tab background style:", 'blurry_tab_style_str', 'blurry', 'blurry_appearance');
	add_settings_field('blurry_tab_logo', "Logo for tab:<br>(will be shrinked to 36px height, use images<br>with minimum 2x height for retina displays):", 'blurry_tab_logo_str', 'blurry', 'blurry_appearance');
	add_settings_field('blurry_menu_color', "Background for menu top header:", 'blurry_menu_color_str', 'blurry', 'blurry_appearance');
	add_settings_field('blurry_menu_bg', "Menu background:", 'blurry_menu_bg_str', 'blurry', 'blurry_appearance');
	add_settings_field('blurry_menu_animation', "Animation for menu levels transition:", 'blurry_menu_animation_str', 'blurry', 'blurry_appearance');
	add_settings_field('blurry_uppercase', "Uppercase of menu items:", 'blurry_uppercase_str', 'blurry', 'blurry_appearance');
	add_settings_field('blurry_menu_align', "Align of menu items:", 'blurry_menu_align_str', 'blurry', 'blurry_appearance');
//	add_settings_field('blurry_menu_height', "Menu area height:", 'blurry_menu_height_str', 'blurry', 'blurry_appearance');

	add_settings_section('blurry_css', 'Custom CSS', 'blurry_section', 'blurry');
	add_settings_field('blurry_css', "Additional rules:", 'blurry_css_str', 'blurry', 'blurry_css');

	add_settings_section('blurry_page', 'Layout & Content Settings', 'blurry_section', 'blurry');
	add_settings_field('blurry_gen_width', "Generate when page width is less than (px) :", 'blurry_gen_width_str', 'blurry', 'blurry_page');
	add_settings_field('blurry_padding_top', "Body top padding (CSS value, ex. 10px or 5%, useful if Blurry navbar overlaps main content):", 'blurry_padding_top_str', 'blurry', 'blurry_page');
	add_settings_field('blurry_hide_def', "Visibility of default menu:", 'blurry_hide_def_str', 'blurry', 'blurry_page');
	add_settings_field('blurry_add_main', "Add link to main page to Blurry menu:", 'blurry_add_main_str', 'blurry', 'blurry_page');
	add_settings_field('blurry_main_text', "Text for link to main page:", 'blurry_main_text_str', 'blurry', 'blurry_page', array('hidden' => true));
	add_settings_field('blurry_content_scale', "Main content scale on menu opening:", 'blurry_content_scale_str', 'blurry', 'blurry_page');

	add_settings_section('blurry_other', 'Other Settings', 'blurry_section', 'blurry');
	add_settings_field('blurry_submenu_support', "Build sub-menus:", 'blurry_submenu_support_str', 'blurry', 'blurry_other');
	add_settings_field('blurry_submenu_classes', "Sub-menu classes list (comma-separated):", 'blurry_submenu_classes_str', 'blurry', 'blurry_other');
	add_settings_field('blurry_togglers', "Additional element to toggle menu (valid CSS selector like #id or .class):", 'blurry_togglers_str', 'blurry', 'blurry_other');


}

function blurry_section() {

}

$blurry_cached_opts;

function blurry_get_options()
{
	global $blurry_cached_opts;

	if (isset($blurry_cached_opts)) return $blurry_cached_opts;

	$options = get_option('blurry_options');

	if (empty($options['blurry_test_mode'])) {
		$options['blurry_test_mode'] = '';
	}

	if (empty($options['blurry_active_menu'])) {
		$options['blurry_active_menu'] = '';
	}

	if (empty($options['blurry_tab_style'])) {
		$options['blurry_tab_style'] = 'gradient';
	}
	if (empty($options['blurry_tab_style_gradient_left'])) {
		$options['blurry_tab_style_gradient_left'] = '#925873';
	}
	if (empty($options['blurry_tab_style_gradient_right'])) {
		$options['blurry_tab_style_gradient_right'] = '#28a9e5';
	}
	if (empty($options['blurry_tab_style_solid'])) {
		$options['blurry_tab_style_solid'] = '#800000';
	}
	if (empty($options['blurry_tab_style_semi'])) {
		$options['blurry_tab_style_semi'] = 'rgba(146, 86, 226, 0.4)';
	}
	if (empty($options['blurry_tab_style_blur'])) {
		$options['blurry_tab_style_blur'] = '#800080';
	}

	if (empty($options['blurry_tab_style_blur_rgb'])) {
		$options['blurry_tab_style_blur_rgb'] = 'rgba(0, 128, 98, 0.2)';
	}

	if (empty($options['blurry_tab_logo'])) {
		$options['blurry_tab_logo'] = '';
	}

	if (empty($options['blurry_menu_color'])) {
		$options['blurry_menu_color'] = 'rgba(25, 148, 243, 0.48)';
	}

	if (empty($options['blurry_menu_bg'])) {
		$options['blurry_menu_bg'] = 'dark';
	}

	if (empty($options['blurry_menu_animation'])) {
		$options['blurry_menu_animation'] = '1';
	}

	if (empty($options['blurry_uppercase'])) {
		$options['blurry_uppercase'] = '';
	}

	if (empty($options['blurry_menu_align'])) {
		$options['blurry_menu_align'] = 'center';
	}

	if (empty($options['blurry_menu_height'])) {
		$options['blurry_menu_height'] = 'show_overflow';
	}

	if (empty($options['blurry_content_scale'])) {
		$options['blurry_content_scale'] = '';
	}

	if (empty($options['blurry_hide_def'])) {
		$options['blurry_hide_def'] = '';
	}

	if (empty($options['blurry_add_main'])) {
		$options['blurry_add_main'] = 'no';
	}
	if (empty($options['blurry_main_text'])) {
		$options['blurry_main_text'] = 'Home';
	}

	if (empty($options['blurry_gen_width'])) {
		$options['blurry_gen_width'] = '568';
	}

	if (empty($options['blurry_padding_top'])) {
		$options['blurry_padding_top'] = '50px';
	}

	if (empty($options['blurry_css'])) {
		$options['blurry_css'] = '';
	}

	if (empty($options['blurry_submenu_support'])) {
		$options['blurry_submenu_support'] = 'yes';
	}

	if (empty($options['blurry_submenu_classes'])) {
		$options['blurry_submenu_classes'] = 'sub-menu, children';
	}

	if (empty($options['blurry_togglers'])) {
		$options['blurry_togglers'] = '';
	}

	$blurry_cached_opts = $options;

	return $options;
}

function blurry_test_mode_str() {
	$options = blurry_get_options();
	$style = $options['blurry_test_mode'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='blurry_test_mode' name='blurry_options[blurry_test_mode]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='blurry_test_mode'>Visible only for logged-in admins</label></p>
	";
}

function blurry_active_menu_str() {
	$options = blurry_get_options();

        // Show all available to the menus
        echo "<select id='blurry_active_menu' name='blurry_options[blurry_active_menu]'>";
        //echo "<option value=''> None </option>";

        foreach(get_registered_nav_menus() as $location=>$menu ) {
            $selected = $options['blurry_active_menu'] == $location ? 'selected' : '';

            echo "<option ". $selected ." value='". $location ."'> ". $menu ."</option>";
        }

        echo "</select>";
}

function blurry_tab_style_str() {
    $options = blurry_get_options();
    $style = $options['blurry_tab_style'];
	  $anim = $options['blurry_menu_animation'];
		$logo = !empty($options['blurry_tab_logo']) ? '<img src="' . $options['blurry_tab_logo'] . '" class="blurry-tab-logo"/>' : '';

    echo "<select id='blurry_tab_style' name='blurry_options[blurry_tab_style]'>
    <option value='gradient' " . ($style === 'gradient' ? 'selected="selected"' : '') . ">Gradient</option>
    <option value='solid' " . ($style === 'solid' ? 'selected="selected"' : '') . ">Solid</option>
    <option value='semi' " . ($style === 'semi' ? 'selected="selected"' : '') . ">Semi-transparent</option>
    <option value='blur' " . ($style === 'blur' ? 'selected="selected"' : '') . ">Blur effect (experimental)</option>
    </select>
    <ul class='tab_styles'>
      <li class='gradient'><input id='blurry_tab_style_gradient_left' data-color-format='hex' data-pos='left' name='blurry_options[blurry_tab_style_gradient_left]' type='text' value='{$options['blurry_tab_style_gradient_left']}' style='' /> ➜ <input id='blurry_tab_style_gradient_right'  data-pos='right' data-color-format='hex' name='blurry_options[blurry_tab_style_gradient_right]' type='text' value='{$options['blurry_tab_style_gradient_right']}' style='' /></li>
      <li class='solid'><input id='blurry_tab_style_solid' data-color-format='hex' name='blurry_options[blurry_tab_style_solid]' type='text' value='{$options['blurry_tab_style_solid']}' style='' /></li>
      <li class='semi'><input id='blurry_tab_style_semi' data-color-format='rgba' name='blurry_options[blurry_tab_style_semi]' type='text' value='{$options['blurry_tab_style_semi']}' style='' /></li>
      <li class='blur'><input id='blurry_tab_style_blur' data-color-format='hex' name='blurry_options[blurry_tab_style_blur]' type='text' value='{$options['blurry_tab_style_blur']}' style='' /></li>
      <li class='blur'><input id='blurry_tab_style_blur_rgb' data-color-format='rgb' name='blurry_options[blurry_tab_style_blur_rgb]' type='text' value='{$options['blurry_tab_style_blur_rgb']}' style='display:none' /></li>
    </ul>
    <div id='blurry-preview'>
    <div id='blurry-tab' class='' style='display: block;'><div class='blurry-gradient'>{$logo}</div></div>
    <div class='blurry-left blurry-icon blurry-bars'><span></span></div>
    <div class='blurry-right blurry-icon blurry-magnifying'></div>
    <div id='blurry-menu' class=''>
    <nav class='blurry-nav dl-menuwrapper' style='height: 578px;'>
    <ul class='blurry-menu-level-0 dl-menu dl-menuopen blurry-scrollable'><li class='blurry-active-class'><a href='http://192.168.0.104:8888/'>Home</a></li>
<li><a href='http://192.168.0.104:8888/?page_id=2'>Sample Page</a></li>
<li class='blurry-has-child-menu'><a href='http://test'>Click Me!</a>
<ul class='blurry-child-menu blurry-scrollable dl-submenu blurry-menu-level-1'>
	<li><a href='http://google.com'>Level 2 Item</a></li>
	<li><a href='http://sd'>Cloth</a></li>
	<li class='blurry-has-child-menu'><a href='http://ww'>To Third Level</a>
	<ul class='blurry-child-menu blurry-scrollable dl-submenu blurry-menu-level-2'>
		<li><a href='http://d'>You</a></li>
		<li><a href='http://af'>Have</a></li>
		<li><a href='http://kkk'>Reached</a></li>
		<li><a href='http://cxzc'>Deepest</a></li>
		<li><a href='http://cxc'>Level</a></li>
		<li><a href='http://adf'>In</a></li>
		<li><a href='http://adf'>This</a></li>
		<li><a href='http://adf'>Menu</a></li>
	</ul>
</li>
</ul>
</li>
<li><a href='http://192.168.0.104:8888/?cat=1'>Uncategorized</a>

</li>
<li><a href='http://www'>More</a></li>
<li><a href='http://dsad'>Overflow Item</a></li>
<li><a href='http://dsad'>About me</a></li>
</ul>
    </nav>
    	<div id='blurry-menu-navbar'>Main menu</div>
    	<span id='blurry-menu-navbar-shadow-top'></span>
    	<span id='blurry-menu-navbar-shadow-bottom' style='display: inline;'></span>
    </div>
    </div>
        <div class='blurry-preview-disclaimer'>* Only WebKit browsers (like Chrome, Safari) have full support of Blurry features, so preview in these browsers are the closest to mobile devices</div>

    ";

	echo "<script>

	jQuery(function($){
			var defColor = {
				gradient: {
					left: '#51e9d9',
					right: '#28a9e5'
				},
				solid: '#800000',
				semi: 'rgba(146, 86, 226, 0.4)',
				blur: '#800080'
			}

	    var $ = jQuery;
	    var tabs = $('.tab_styles');
	    var tab = $('#blurry-tab');

		  $('.tab_styles input').each(function(i, el){

	      var style = $(this).closest('li').attr('class');
	      var pos = $(this).attr('data-pos') || '';
	//      var colorInput = $('input#base_color_' + slidertheme);
	      var opts = {
	          flat: false,
	          previewformat: 'hex',
	          color:  defColor[style][pos] ? defColor[style][pos] : defColor[style],
	//          connectedinput: colorInput,
	          order: {
	              hsl: 1,
	              preview: 2
	          },
	          swatches: [
              '#c0392b',
              'a3503c',
              '925873',
              '927758',
              '589272',
              '588c92',
              '2bb1c0',
              '2b8ac0',
              'e96701',
              'c02b74'
            ],
	          customswatches: 'swatches_' + style + pos,
	          onchange: onChange
	      };

	      if (style === 'semi') {
		      opts.previewformat = 'rgba';
		      opts.order = {
	          rgb: 1,
	          opacity: 2,
            preview: 3
		      }
	      }

	      $(this).ColorPickerSliders(opts);

	    });


      function setTabGradient(color1, color2) {
				tab.css('background-image', '-webkit-gradient(linear, left top, right top, color-stop(0%, ' + color1 + '), color-stop(100%, ' + color2 + '))');
				tab.css('background-image', '-webkit-linear-gradient(left, ' + color1 + ' 0%, ' + color2 + ' 100%)');
				tab.css('background-image', '-moz-linear-gradient(left, ' + color1 + ' 0%, ' + color2 + ' 100%)');
				tab.css('background-image', '-o-linear-gradient(left, ' + color1 + ' 0%, ' + color2 + ' 100%)');
				tab.css('background-image', 'linear-gradient(to right, ' + color1 + ' 0%, ' + color2 + ' 100%)');
      }

      function onChange(container, color) {
        if (container.is('[class*=blurry_tab_style_gradient]')) {
					setTabGradient($('#blurry_tab_style_gradient_left').val(), $('#blurry_tab_style_gradient_right').val())

				}
				else if (container.is('.blurry_tab_style_semi')) {
					tab.css({
						backgroundImage: 'none',
						backgroundColor: $('#blurry_tab_style_semi').val()
					})

				}
				else if (container.is('.blurry_tab_style_solid')) {
					tab.css({
						backgroundImage: 'none',
						backgroundColor: $('#blurry_tab_style_solid').val()
					})
				}
				else if (container.is('.blurry_tab_style_blur')) {
					tab.css({
						backgroundImage: 'none',
						backgroundColor: $('#blurry_tab_style_blur').val()
					});
					var color = tinycolor($('#blurry_tab_style_blur').val()).toRgb();

					$('#blurry_tab_style_blur_rgb').val('rgba(' + color.r + ',' + color.g + ',' + color.b + ',0.2)')
				}

      }

		  $('#blurry_tab_style').change(function(){
		    var val = jQuery(this).val();
		    var color;
				tabs.find('li').hide().end().find('.' + val).show();

				if (val === 'gradient') {
					setTabGradient($('#blurry_tab_style_gradient_left').val(), $('#blurry_tab_style_gradient_right').val())

				}
				else if (val === 'semi') {
					color = tinycolor($('#blurry_tab_style_semi').val()).toRgb();
					tab.css({
						backgroundImage: 'none',
						backgroundColor: 'rgba(' + color.r + ',' + color.g + ',' + color.b + ', 0.4)'
					})
				}
				else  {
					color = tinycolor($('#blurry_tab_style_' + val).val()).toRgb();

					tab.css({
						backgroundImage: 'none',
						backgroundColor: 'rgb(' + color.r + ',' + color.g + ',' + color.b + ')'
					})
				}

		  }).change();

		  $('.dl-menuwrapper').dlmenu({
				animationClasses:{ classin:'dl-animate-in-' + '{$anim}', classout:'dl-animate-out-' + '{$anim}' }
			});
	})

	 </script>";

}


function blurry_menu_color_str() {
		$options = blurry_get_options();
	$color = $options['blurry_menu_color'];

    echo "<input id='blurry_menu_color' data-color-format='rgba' name='blurry_options[blurry_menu_color]' type='text' value='{$options['blurry_menu_color']}' style='' />
		<script>
				var opts = {
          previewontriggerelement: true,
          previewformat: 'rgba',
          flat: false,
          color: '{$color}',
          customswatches: 'bg',
          swatches: [
            '#c0392b',
            'a3503c',
            '925873',
            '927758',
            '589272',
            '588c92',
            '2bb1c0',
            '2b8ac0',
            'e96701',
            'c02b74'
          ],
          order: {
              rgb: 1,
              opacity: 2,
              preview: 3
          },
          onchange: function(container, color) {

          		jQuery('#blurry-menu-navbar').css({backgroundColor: jQuery('#blurry_menu_color').val()})
          }
        };
				jQuery(function(){
					jQuery('#blurry_menu_color').ColorPickerSliders(opts)
				});

	</script>
	";
}



function blurry_menu_bg_str() {
    $options = blurry_get_options();
    $style = $options['blurry_menu_bg'];

    echo "<select id='blurry_menu_bg' name='blurry_options[blurry_menu_bg]'>
    <option value='dark' " . ($style === 'dark' ? 'selected="selected"' : '') . ">Dark</option>
    <option value='light' " . ($style === 'light' ? 'selected="selected"' : '') . ">Light</option>
    </select>
    ";

	echo "<script>
jQuery('#blurry-preview').addClass('blurry_menu_bg_' + jQuery('#blurry_menu_bg').val())
jQuery('#blurry_menu_bg').change(function(){
var val = jQuery(this).val();
jQuery('#blurry-preview').toggleClass('blurry_menu_bg_' + val + ' blurry_menu_bg_' + (val === 'dark' ? 'light' : 'dark'))

})
  </script>";
}

function blurry_menu_animation_str() {
    $options = blurry_get_options();
    $style = $options['blurry_menu_animation'];

    echo "<select id='blurry_menu_animation' name='blurry_options[blurry_menu_animation]'>
    <option value='1' " . ($style === '1' ? 'selected="selected"' : '') . ">Style 1</option>
    <option value='2' " . ($style === '2' ? 'selected="selected"' : '') . ">Style 2</option>
    <option value='3' " . ($style === '3' ? 'selected="selected"' : '') . ">Style 3</option>
    <option value='4' " . ($style === '4' ? 'selected="selected"' : '') . ">Style 4</option>
    <option value='5' " . ($style === '5' ? 'selected="selected"' : '') . ">Style 5</option>
    </select>
    ";

	echo "<script>
jQuery('#blurry_menu_animation').change(function(){
jQuery(this).closest('form').submit()
})
  </script>";
}

function blurry_uppercase_str() {
	$options = blurry_get_options();
	$style = $options['blurry_uppercase'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='blurry_uppercase' name='blurry_options[blurry_uppercase]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='blurry_uppercase'>Turn on uppercase</label></p>
	";

	echo "<script>
	jQuery('#blurry_uppercase').change(function() {
	var t = jQuery('#blurry-preview');
	    if(this.checked) {
	        t.addClass('blurry_uppercase');
	    } else {
	        t.removeClass('blurry_uppercase');
	    }
	}).change();
  </script>";
}

function blurry_menu_align_str() {
	$options = blurry_get_options();
	$style = $options['blurry_menu_align'];

	echo "<select id='blurry_menu_align' name='blurry_options[blurry_menu_align]'>
    <option value='center' " . ($style === 'center' ? 'selected="selected"' : '') . ">Center</option>
    <option value='left' " . ($style === 'left' ? 'selected="selected"' : '') . ">Left</option>
    </select>
    ";

	echo "<script>
jQuery('#blurry-preview').addClass('blurry_menu_align_' + jQuery('#blurry_menu_align').val())
jQuery('#blurry_menu_align').change(function(){
var val = jQuery(this).val();
jQuery('#blurry-preview').toggleClass('blurry_menu_align_' + val + ' blurry_menu_align_' + (val === 'center' ? 'left' : 'center'))

})
  </script>";
}

function blurry_menu_height_str() {
	$options = blurry_get_options();
	$style = $options['blurry_menu_height'];

	echo "<select id='blurry_menu_height' name='blurry_options[blurry_menu_height]'>
    <option value='show_overflow' " . ($style === 'show_overflow' ? 'selected="selected"' : '') . ">Show edge of overflow items</option>
    <option value='hide_overflow' " . ($style === 'hide_overflow' ? 'selected="selected"' : '') . ">Hide overflow items (scrolling is still active)</option>
    </select>
    ";

	echo "<script>
jQuery('#blurry-preview').addClass('blurry_menu_height_' + jQuery('#blurry_menu_height').val())
jQuery('#blurry_menu_height').change(function(){
var val = jQuery(this).val();
jQuery('#blurry-preview').toggleClass('blurry_menu_height_' + val + ' blurry_menu_height_' + (val === 'show_overflow' ? 'hide_overflow' : 'show_overflow'))

})
  </script>";
}

function blurry_gen_width_str() {
	$options = blurry_get_options();
	echo " <input id='blurry_gen_width' name='blurry_options[blurry_gen_width]' size='10' type='text' value='{$options['blurry_gen_width']}' style='' />";
}

function blurry_padding_top_str() {
	$options = blurry_get_options();
	echo " <input id='blurry_padding_top' name='blurry_options[blurry_padding_top]' size='10' type='text' value='{$options['blurry_padding_top']}' style='' />";
}

function blurry_hide_def_str() {
	$options = blurry_get_options();
	$style = $options['blurry_hide_def'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='blurry_hide_def' name='blurry_options[blurry_hide_def]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='blurry_hide_def'>Hide default menu when Blurry is generated (not always works when default menu is custom)</label></p>
	";
}

function blurry_add_main_str() {
    $options = blurry_get_options();
    $style = $options['blurry_add_main'];

    echo "<select id='blurry_add_main' name='blurry_options[blurry_add_main]'>
    <option value='no' " . ($style === 'no' ? 'selected="selected"' : '') . ">Don't add</option>
    <option value='yes' " . ($style === 'yes' ? 'selected="selected"' : '') . ">Add</option>
    </select>
    ";

	echo "<script>
jQuery(function(){
		jQuery('#blurry_add_main').change(function(){
		 if(jQuery(this).val() === 'yes') {
		 	jQuery('.settings-form-row.blurry_main_text').show()
		 } else {
		 	jQuery('.settings-form-row.blurry_main_text').hide()
		 }
		}).change()
})


  </script>";
}

function blurry_main_text_str () {
    $options = blurry_get_options();
    echo "<input id='blurry_main_text' name='blurry_options[blurry_main_text]' type='text' value='{$options['blurry_main_text']}' style='' />";
}


function blurry_content_scale_str() {
	$options = blurry_get_options();
	$style = $options['blurry_content_scale'];
	$first_checked = $style == 'yes' ? 'checked="checked"' : '';

	echo "
	<p><input id='blurry_content_scale' name='blurry_options[blurry_content_scale]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='blurry_content_scale'>Scale content behind menu on opening</label></p>
	";
}


function blurry_submenu_support_str() {
	$options = blurry_get_options();
	$style = $options['blurry_submenu_support'];


	echo "<select id='blurry_submenu_support' name='blurry_options[blurry_submenu_support]'>
	  <option value='yes' " . ($style === 'yes' ? 'selected="selected"' : '') . ">Multi-level</option>
    <option value='no' " . ($style === 'no' ? 'selected="selected"' : '') . ">Single-level</option>
    </select>
    ";
}

function blurry_submenu_classes_str()
{
  $options = blurry_get_options();
	echo "<input id='blurry_submenu_classes' name='blurry_options[blurry_submenu_classes]' type='text' value='{$options['blurry_submenu_classes']}' style='' />";
}

function blurry_togglers_str()
{
  $options = blurry_get_options();
	echo "<input id='blurry_togglers' name='blurry_options[blurry_togglers]' type='text' value='{$options['blurry_togglers']}' style='' />";
}

function blurry_css_str()
{
    $options = blurry_get_options();
    echo "<textarea cols='100' rows='10' id='blurry_css' name='blurry_options[blurry_css]' >" . $options['blurry_css'] . "</textarea>";
}


function blurry_tab_logo_str() {
    $options = blurry_get_options();
    if (empty($options['blurry_tab_logo'])) {
        echo "<input id='blurry_tab_logo_file' type='file' name='blurry_pic' value='{$options['blurry_tab_logo']}' /> <input name='Submit' type='submit' class='button-primary' value='Upload' />";
    } else {
        echo '<div class="blurry_tab_logo_holder"><img class="blurry-tab-logo" src="' . $options['blurry_tab_logo'] . '" alt=""/></div>';
        echo '<p><input  style="margin-top: 0;" type="submit" class="button-secondary" id="blurry_remove_pic" value="Remove this pic"/></p>
                   <script>
                   jQuery("#blurry_remove_pic").on("click keydown", function(){
                        jQuery("#blurry_tab_logo").val("");
                   })
                   </script>
               ';
        echo "<span>...or upload new one</span><br><input id='blurry_tab_logo_file' type='file' name='blurry_pic' value='{$options['blurry_tab_logo']}' /> <input name='Submit' type='submit' class='button-primary' value='Upload' />";
    }
    echo " <input id='blurry_tab_logo' name='blurry_options[blurry_tab_logo]' size='100' type='hidden' value='{$options['blurry_tab_logo']}' style='' />";
}


function blurry_options_validate($plugin_options) {
    $options = get_option('plugin_options');

		if (!empty($_POST['update'])) {
	     // Get the options array defined for the form
	     foreach ($plugin_options as $option) {
          $id = $option['id'];
          //  Set the check box to "0" by default
          if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
               $input[$id] = "no";
           }
	     }
		}

		if (isset($_FILES['blurry_pic']) && ($_FILES['blurry_pic']['size'] > 0)) {

	    // Get the type of the uploaded file. This is returned as "type/extension"
	    $arr_file_type = wp_check_filetype(basename($_FILES['blurry_pic']['name']));
	    $uploaded_file_type = $arr_file_type['type'];

	    // Set an array containing a list of acceptable formats
	    $allowed_file_types = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');

	    // If the uploaded file is the right format
	    if (in_array($uploaded_file_type, $allowed_file_types)) {

		    // Options array for the wp_handle_upload function. 'test_upload' => false
		    $upload_overrides = array('test_form' => false);

				//delete previous
		    //if (isset($plugin_options['blurry_pic'])) unlink($plugin_options['blurry_pic']);

		    $uploaded_file = wp_handle_upload($_FILES['blurry_pic'], $upload_overrides);

		    // If the wp_handle_upload call returned a local path for the image
		    if (isset($uploaded_file['file'])) {
			    // The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
			    $file_name_and_location = $uploaded_file['file'];
			    $wp_upload_dir = wp_upload_dir();
			    $plugin_options['blurry_tab_logo'] = $wp_upload_dir['url'] . '/' . basename($file_name_and_location);
		    } else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.
			    $upload_feedback = 'There was a problem with your upload.';
		    }

	    } else { // wrong file type
		    $upload_feedback = 'Please upload only image files (jpg, gif or png).';
	    }

    } else { // No file was passed
	    $upload_feedback = false;
    }
    return $plugin_options;
}

