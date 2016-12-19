<?php
	$bg = $options['blurry_tab_style'];
?>
<style>

<?php if(isset($bg)): ?>
	<?php if($bg == 'gradient'): ?>
		body #blurry-tab {
        background: <?php echo $options['blurry_tab_style_gradient_left']; ?>;
        background: -moz-linear-gradient(left,  <?php echo $options['blurry_tab_style_gradient_left']; ?> 0%, <?php echo $options['blurry_tab_style_gradient_right']; ?> 100%);
        background: -webkit-gradient(linear, left top, right top, color-stop(0%,<?php echo $options['blurry_tab_style_gradient_left']; ?>), color-stop(100%,<?php echo $options['blurry_tab_style_gradient_right']; ?>));
        background: -webkit-linear-gradient(left,  <?php echo $options['blurry_tab_style_gradient_left']; ?> 0%,<?php echo $options['blurry_tab_style_gradient_right']; ?> 100%);
        background: -o-linear-gradient(left,  <?php echo $options['blurry_tab_style_gradient_left']; ?> 0%,<?php echo $options['blurry_tab_style_gradient_right']; ?> 100%);
        background: -ms-linear-gradient(left,  <?php echo $options['blurry_tab_style_gradient_left']; ?> 0%,<?php echo $options['blurry_tab_style_gradient_right']; ?> 100%);
        background: linear-gradient(to right,  <?php echo $options['blurry_tab_style_gradient_left']; ?> 0%,<?php echo $options['blurry_tab_style_gradient_right']; ?> 100%);
		}
	<?php endif; ?>

	<?php if($bg == 'semi'): ?>
    body #blurry-tab {
		    background-color: <?php echo $options['blurry_tab_style_semi']; ?>;
        background-image: none;
    }
	<?php endif; ?>

		<?php if($bg == 'solid'): ?>
    body #blurry-tab {
		    background-color: <?php echo $options['blurry_tab_style_solid']; ?>;
        background-image: none;
    }
	 <?php endif; ?>

		<?php if($bg == 'blur'): ?>
    body #blurry-tab {
		    background-color: <?php echo $options['blurry_tab_style_blur']; ?>;
        background-image: none;
    }

    #blurry-tab .blurry-gradient {
        background-color: <?php echo $options['blurry_tab_style_blur_rgb']; ?>;

    }
	<?php endif; ?>
<?php endif; ?>

<?php if(isset($options['blurry_hide_def']) && $options['blurry_hide_def'] === 'yes'): ?>
	nav .menu {

  }
<?php endif; ?>

<?php if(isset($options['blurry_menu_color'])): ?>
	#blurry-menu-navbar {
      background-color: <?php echo $options['blurry_menu_color']; ?>;
  }
<?php endif; ?>
<?php if($options['blurry_menu_bg'] == 'light'): ?>
body ul.dl-menu,
body ul.dl-submenu {
    background: rgba(255, 255, 255, 0.35);
}

body .dl-menuwrapper li a{
    color: #333;
}

body #blurry-menu-navbar-shadow-top,
body #blurry-menu-navbar-shadow-bottom {
    opacity: 0.3;
}
<?php endif; ?>

<?php if(!empty($options['blurry_uppercase'])): ?>
body .dl-menuwrapper li a,
body #blurry-menu-navbar{
    text-transform: uppercase;
}
<?php endif; ?>

<?php if($options['blurry_menu_align'] == 'left'): ?>
body .dl-menuwrapper li a {
    text-align: left;
    padding: 15px 10px 15px 25px;
}
<?php endif; ?>

<?php if(isset($options['blurry_padding_top'])): ?>
body.blurry-on, #blurry-body-duplicate {
    padding-top:<?php echo $options['blurry_padding_top']; ?> !important
}
<?php endif; ?>
<?php if(isset($options['blurry_content_scale']) && $options['blurry_content_scale'] == 'yes' ): ?>
body.blurry-blurred > *
{
    -webkit-transform: scale(1.1, 1.1) !important;
    -moz-transform:  scale(1.1, 1.1) !important;
    -ms-transform:  scale(1.1, 1.1) !important;
    transform:  scale(1.1, 1.1) !important;
}
<?php endif; ?>

<?php if(isset($options['blurry_css'])): ?>
<?php echo $options['blurry_css']; ?>
<?php endif; ?>


</style>
<div id="blurry-tab" class=""><div class="blurry-gradient">
	<?php if(isset($options['blurry_tab_logo'])): ?>
	<img src="<?php echo $options['blurry_tab_logo']; ?>" class="blurry-tab-logo"/>
	<?php endif; ?>
</div></div>
<div class="blurry-left blurry-icon blurry-bars"><span></span></div>
<div class="blurry-right blurry-icon blurry-magnifying"></div>
<div class="blurry-search-holder"><form method="get" id="blurry-form" action="">
		<input type="text" class="field" name="s" id="s" placeholder="">
		<input type="submit" class="submit" name="submit" id="blurry-submit" value="Go">
	</form></div>
<div id="blurry-overlay"></div>
<div id="blurry-menu" class="">
	<div id="blurry-menu-navbar">Main menu</div>
	<span id="blurry-menu-navbar-shadow-top"></span>
	<span id="blurry-menu-navbar-shadow-bottom"></span>
</div>

