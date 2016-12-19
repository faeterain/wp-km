<table class="form-table">
    <tr valign="top">
        <th scope="row">Transition effect</th>
        <td>
            <select name="transition_effect">
                <option <?php echo ($values['transition_effect'] == 1) ? 'selected="selected" ' : ''; ?> value="1">fade<?php echo ($default_values['transition_effect'] == 1) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 2) ? 'selected="selected" ' : ''; ?> value="2">slideTop<?php echo ($default_values['transition_effect'] == 2) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 3) ? 'selected="selected" ' : ''; ?> value="3">slideRight<?php echo ($default_values['transition_effect'] == 3) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 4) ? 'selected="selected" ' : ''; ?> value="4">slideBottom<?php echo ($default_values['transition_effect'] == 4) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 5) ? 'selected="selected" ' : ''; ?> value="5">slideLeft<?php echo ($default_values['transition_effect'] == 5) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 6) ? 'selected="selected" ' : ''; ?> value="6">carouselRight<?php echo ($default_values['transition_effect'] == 6) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 7) ? 'selected="selected" ' : ''; ?> value="7">carouselLeft<?php echo ($default_values['transition_effect'] == 7) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['transition_effect'] == 0) ? 'selected="selected" ' : ''; ?> value="0">none<?php echo ($default_values['transition_effect'] == 0) ? ' (default)' : ''; ?></option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Transition speed</th>
        <td>
            <input type="text" name="transition_speed" value="<?php echo ($values['transition_speed'] == '') ? $default_values['transition_speed'] : $values['transition_speed']; ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Slide interval <span class="rdesc">(Time between slide changes in milliseconds.)</span></th>
        <td>
            <input type="text" name="slide_interval" value="<?php echo ($values['slide_interval'] == '') ? $default_values['slide_interval'] : $values['slide_interval']; ?>" />
        </td>
    </tr>
     <tr valign="top">
        <th scope="row">Controlls</th>
        <td>
            <select name="controlls">
                <option <?php echo ($values['controlls'] == 1) ? 'selected="selected" ' : ''; ?> value="1">Yes<?php echo ($default_values['controlls'] == 1) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['controlls'] == 0) ? 'selected="selected" ' : ''; ?> value="0">No<?php echo ($default_values['controlls'] == 0) ? ' (default)' : ''; ?></option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Autoplay</th>
        <td>
            <select name="autoplay">
                <option <?php echo ($values['autoplay'] == 1) ? 'selected="selected" ' : ''; ?> value="1">Yes<?php echo ($default_values['autoplay'] == 1) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['autoplay'] == 0) ? 'selected="selected" ' : ''; ?> value="0">No<?php echo ($default_values['autoplay'] == 0) ? ' (default)' : ''; ?></option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Disable</th>
        <td>
            <select name="disable">
                <option <?php echo ($values['disable'] == 1) ? 'selected="selected" ' : ''; ?> value="1">Yes<?php echo ($default_values['disable'] == 1) ? ' (default)' : ''; ?></option>
                <option <?php echo ($values['disable'] == 0) ? 'selected="selected" ' : ''; ?> value="0">No<?php echo ($default_values['disable'] == 0) ? ' (default)' : ''; ?></option>
            </select>
        </td>
    </tr>
    <tr valign="top">
       <th scope="row">Progress bar</th>
       <td>
           <select name="progress_bar">
               <option <?php echo ($values['progress_bar'] == 1) ? 'selected="selected" ' : ''; ?> value="1">Yes<?php echo ($default_values['progress_bar'] == 1) ? ' (default)' : ''; ?></option>
               <option <?php echo ($values['progress_bar'] == 0) ? 'selected="selected" ' : ''; ?> value="0">No<?php echo ($default_values['progress_bar'] == 0) ? ' (default)' : ''; ?></option>
           </select>
       </td>
    </tr>
    <tr valign="top">
       <th scope="row">Thumbnail navigation</th>
       <td>
           <select name="thumbnail_navigation">
               <option <?php echo ($values['thumbnail_navigation'] == 1) ? 'selected="selected" ' : ''; ?> value="1">Yes<?php echo ($default_values['thumbnail_navigation'] == 1) ? ' (default)' : ''; ?></option>
               <option <?php echo ($values['thumbnail_navigation'] == 0) ? 'selected="selected" ' : ''; ?> value="0">No<?php echo ($default_values['thumbnail_navigation'] == 0) ? ' (default)' : ''; ?></option>
           </select>
       </td>
    </tr>
    <tr valign="top">
       <th scope="row">Background pattern</th>
       <td>
           <input id="background_pattern" type="hidden" name="background_pattern" value="<?php echo $values['background_pattern']; ?>"/>
           <div class="bg_select">
               <div class="selected_option"><?php if($values['background_pattern'] != 'none'){ ?>
                   <div class="pattern_thumb"><img src="<?php echo $values['background_pattern']; ?>" alt="<?php echo $values['bg_pattern_filename']; ?>" /></div><span><?php echo $values['bg_pattern_filename']; ?></span></div>
                   <?php } else { ?>
                   <div class="pattern_thumb"></div><span>none</span></div>
                   <?php } ?>
                <ul class="bg_options">
                    <li><div class="pattern_thumb"></div><span>none</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/45degreee_fabric.png" alt="45degreee_fabric.png" /></div><span>45degreee_fabric.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/60degree_gray.png" alt="60degree_gray.png" /></div><span>60degree_gray.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/always_grey.png" alt="always_grey.png" /></div><span>always_grey.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/argyle.png" alt="argyle.png" /></div><span>argyle.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/batthern.png" alt="batthern.png" /></div><span>batthern.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/beige_paper.png" alt="beige_paper.png" /></div><span>beige_paper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/bgnoise_lg.png" alt="bgnoise_lg.png" /></div><span>bgnoise_lg.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/black_denim.png" alt="black_denim.png" /></div><span>black_denim.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/black-Linen.png" alt="black-Linen.png" /></div><span>black-Linen.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/black_linen_v2.png" alt="black_linen_v2.png" /></div><span>black_linen_v2.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/blackmamba.png" alt="blackmamba.png" /></div><span>blackmamba.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/black_paper.png" alt="black_paper.png" /></div><span>black_paper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/black_scales.png" alt="black_scales.png" /></div><span>black_scales.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/black_thread.png" alt="black_thread.png" /></div><span>black_thread.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/bright_squares.png" alt="bright_squares.png" /></div><span>bright_squares.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/broken_noise.png" alt="broken_noise.png" /></div><span>broken_noise.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/brushed_alu_dark.png" alt="brushed_alu_dark.png" /></div><span>brushed_alu_dark.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/brushed_alu.png" alt="brushed_alu.png" /></div><span>brushed_alu.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/candyhole.png" alt="candyhole.png" /></div><span>candyhole.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/carbon_fibre_big.png" alt="carbon_fibre_big.png" /></div><span>carbon_fibre_big.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/carbon_fibre.png" alt="carbon_fibre.png" /></div><span>carbon_fibre.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/carbon_fibre_v2.png" alt="carbon_fibre_v2.png" /></div><span>carbon_fibre_v2.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/cardboard.png" alt="cardboard.png" /></div><span>cardboard.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/checkered_pattern.png" alt="checkered_pattern.png" /></div><span>checkered_pattern.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/circles.png" alt="circles.png" /></div><span>circles.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/classy_fabric.png" alt="classy_fabric.png" /></div><span>classy_fabric.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/concrete_wall_2.png" alt="concrete_wall_2.png" /></div><span>concrete_wall_2.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/concrete_wall_3.png" alt="concrete_wall_3.png" /></div><span>concrete_wall_3.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/concrete_wall.png" alt="concrete_wall.png" /></div><span>concrete_wall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/connect.png" alt="connect.png" /></div><span>connect.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/cork_1.png" alt="cork_1.png" /></div><span>cork_1.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/crissXcross.png" alt="crissXcross.png" /></div><span>crissXcross.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/crossed_stripes.png" alt="crossed_stripes.png" /></div><span>crossed_stripes.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/crosses.png" alt="crosses.png" /></div><span>crosses.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/cubes.png" alt="cubes.png" /></div><span>cubes.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_brick_wall.png" alt="dark_brick_wall.png" /></div><span>dark_brick_wall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_circles.png" alt="dark_circles.png" /></div><span>dark_circles.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/darkdenim3.png" alt="darkdenim3.png" /></div><span>darkdenim3.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_leather.png" alt="dark_leather.png" /></div><span>dark_leather.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_matter.png" alt="dark_matter.png" /></div><span>dark_matter.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_mosaic.png" alt="dark_mosaic.png" /></div><span>dark_mosaic.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_stripes.png" alt="dark_stripes.png" /></div><span>dark_stripes.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dark_wood.png" alt="dark_wood.png" /></div><span>dark_wood.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/darth_stripe.png" alt="darth_stripe.png" /></div><span>darth_stripe.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/denim.png" alt="denim.png" /></div><span>denim.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/diagmonds.png" alt="diagmonds.png" /></div><span>diagmonds.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/diagonal-noise.png" alt="diagonal-noise.png" /></div><span>diagonal-noise.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/diagonal_striped_brick.png" alt="diagonal_striped_brick.png" /></div><span>diagonal_striped_brick.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/diamonds.png" alt="diamonds.png" /></div><span>diamonds.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/double_lined.png" alt="double_lined.png" /></div><span>double_lined.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/dvsup.png" alt="dvsup.png" /></div><span>dvsup.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/elastoplast.png" alt="elastoplast.png" /></div><span>elastoplast.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/elegant_grid.png" alt="elegant_grid.png" /></div><span>elegant_grid.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/exclusive_paper.png" alt="exclusive_paper.png" /></div><span>exclusive_paper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/fabric_1.png" alt="fabric_1.png" /></div><span>fabric_1.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/fabric_plaid.png" alt="fabric_plaid.png" /></div><span>fabric_plaid.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/fake_brick.png" alt="fake_brick.png" /></div><span>fake_brick.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/fancy_deboss.png" alt="fancy_deboss.png" /></div><span>fancy_deboss.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/felt.png" alt="felt.png" /></div><span>felt.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/flowers.png" alt="flowers.png" /></div><span>flowers.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/foggy_birds.png" alt="foggy_birds.png" /></div><span>foggy_birds.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/foil.png" alt="foil.png" /></div><span>foil.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/gold_scale.png" alt="gold_scale.png" /></div><span>gold_scale.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/graphy.png" alt="graphy.png" /></div><span>graphy.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/gray_sand.png" alt="gray_sand.png" /></div><span>gray_sand.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/green_dust_scratch.png" alt="green_dust_scratch.png" /></div><span>green_dust_scratch.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/green-fibers.png" alt="green-fibers.png" /></div><span>green-fibers.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/green_gobbler.png" alt="green_gobbler.png" /></div><span>green_gobbler.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/gridme.png" alt="gridme.png" /></div><span>gridme.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/grilled.png" alt="grilled.png" /></div><span>grilled.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/groovepaper.png" alt="groovepaper.png" /></div><span>groovepaper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/grunge_wall.png" alt="grunge_wall.png" /></div><span>grunge_wall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/gun_metal.png" alt="gun_metal.png" /></div><span>gun_metal.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/handmadepaper.png" alt="handmadepaper.png" /></div><span>handmadepaper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/hexellence.png" alt="hexellence.png" /></div><span>hexellence.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/hixs_pattern_evolution.png" alt="hixs_pattern_evolution.png" /></div><span>hixs_pattern_evolution.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/inflicted.png" alt="inflicted.png" /></div><span>inflicted.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/irongrip.png" alt="irongrip.png" /></div><span>irongrip.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/knitted-netting.png" alt="knitted-netting.png" /></div><span>knitted-netting.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/kuji.png" alt="kuji.png" /></div><span>kuji.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/leather_1.png" alt="leather_1.png" /></div><span>leather_1.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/lghtmesh.png" alt="lghtmesh.png" /></div><span>lghtmesh.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/light_alu.png" alt="light_alu.png" /></div><span>light_alu.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/light_checkered_tiles.png" alt="light_checkered_tiles.png" /></div><span>light_checkered_tiles.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/light_grey_floral_motif.png" alt="light_grey_floral_motif.png" /></div><span>light_grey_floral_motif.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/light_honeycomb.png" alt="light_honeycomb.png" /></div><span>light_honeycomb.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/lined_paper.png" alt="lined_paper.png" /></div><span>lined_paper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/littleknobs.png" alt="littleknobs.png" /></div><span>littleknobs.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/little_pluses.png" alt="little_pluses.png" /></div><span>little_pluses.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/merely_cubed.png" alt="merely_cubed.png" /></div><span>merely_cubed.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/micro_carbon.png" alt="micro_carbon.png" /></div><span>micro_carbon.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/mirrored_squares.png" alt="mirrored_squares.png" /></div><span>mirrored_squares.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/nami.png" alt="nami.png" /></div><span>nami.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/noise_pattern_with_crosslines.png" alt="noise_pattern_with_crosslines.png" /></div><span>noise_pattern_with_crosslines.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/noisy.png" alt="noisy.png" /></div><span>noisy.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/old_mathematics.png" alt="old_mathematics.png" /></div><span>old_mathematics.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/old_wall.png" alt="old_wall.png" /></div><span>old_wall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/padded.png" alt="padded.png" /></div><span>padded.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/paper_1.png" alt="paper_1.png" /></div><span>paper_1.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/paper_2.png" alt="paper_2.png" /></div><span>paper_2.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/paper_3.png" alt="paper_3.png" /></div><span>paper_3.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/paven.png" alt="paven.png" /></div><span>paven.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/pineapplecut.png" alt="pineapplecut.png" /></div><span>pineapplecut.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/pinstripe.png" alt="pinstripe.png" /></div><span>pinstripe.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/plaid.png" alt="plaid.png" /></div><span>plaid.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/polaroid.png" alt="polaroid.png" /></div><span>polaroid.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/pool_table.png" alt="pool_table.png" /></div><span>pool_table.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/project_papper.png" alt="project_papper.png" /></div><span>project_papper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/px_by_Gre3g.png" alt="px_by_Gre3g.png" /></div><span>px_by_Gre3g.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/random_grey_variations.png" alt="random_grey_variations.png" /></div><span>random_grey_variations.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/ravenna.png" alt="ravenna.png" /></div><span>ravenna.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/real_cf.png" alt="real_cf.png" /></div><span>real_cf.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/ricepaper2.png" alt="ricepaper2.png" /></div><span>ricepaper2.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/ricepaper.png" alt="ricepaper.png" /></div><span>ricepaper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/rockywall.png" alt="rockywall.png" /></div><span>rockywall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/roughcloth.png" alt="roughcloth.png" /></div><span>roughcloth.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/rubber_grip.png" alt="rubber_grip.png" /></div><span>rubber_grip.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/silver_scales.png" alt="silver_scales.png" /></div><span>silver_scales.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/small-crackle-bright.png" alt="small-crackle-bright.png" /></div><span>small-crackle-bright.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/small_tiles.png" alt="small_tiles.png" /></div><span>small_tiles.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/smooth_wall.png" alt="smooth_wall.png" /></div><span>smooth_wall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/soft_circle_scales.png" alt="soft_circle_scales.png" /></div><span>soft_circle_scales.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/soft_pad.png" alt="soft_pad.png" /></div><span>soft_pad.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/soft_wallpaper.png" alt="soft_wallpaper.png" /></div><span>soft_wallpaper.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/square_bg.png" alt="square_bg.png" /></div><span>square_bg.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/squares.png" alt="squares.png" /></div><span>squares.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/starring.png" alt="starring.png" /></div><span>starring.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/struckaxiom.png" alt="struckaxiom.png" /></div><span>struckaxiom.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/stucco.png" alt="stucco.png" /></div><span>stucco.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/subtle_freckles.png" alt="subtle_freckles.png" /></div><span>subtle_freckles.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/subtle_orange_emboss.png" alt="subtle_orange_emboss.png" /></div><span>subtle_orange_emboss.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/tactile_noise.png" alt="tactile_noise.png" /></div><span>tactile_noise.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/texturetastic_gray.png" alt="texturetastic_gray.png" /></div><span>texturetastic_gray.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/triangles.png" alt="triangles.png" /></div><span>triangles.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/type.png" alt="type.png" /></div><span>type.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/vertical_cloth.png" alt="vertical_cloth.png" /></div><span>vertical_cloth.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/vichy.png" alt="vichy.png" /></div><span>vichy.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/washi.png" alt="washi.png" /></div><span>washi.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/wavecut.png" alt="wavecut.png" /></div><span>wavecut.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/white_brick_wall.png" alt="white_brick_wall.png" /></div><span>white_brick_wall.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/white_carbon.png" alt="white_carbon.png" /></div><span>white_carbon.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/whitediamond.png" alt="whitediamond.png" /></div><span>whitediamond.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/white_paperboard.png" alt="white_paperboard.png" /></div><span>white_paperboard.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/white_plaster.png" alt="white_plaster.png" /></div><span>white_plaster.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/white_sand.png" alt="white_sand.png" /></div><span>white_sand.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/white_texture.png" alt="white_texture.png" /></div><span>white_texture.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/whitey.png" alt="whitey.png" /></div><span>whitey.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/wood_1.png" alt="wood_1.png" /></div><span>wood_1.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/wood_pattern.png" alt="wood_pattern.png" /></div><span>wood_pattern.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/wood_pattern_trans.png" alt="wood_pattern_trans.png" /></div><span>wood_pattern_trans.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/worn_dots.png" alt="worn_dots.png" /></div><span>worn_dots.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/woven.png" alt="woven.png" /></div><span>woven.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/xv.png" alt="xv.png" /></div><span>xv.png</span></li>
                    <li><div class="pattern_thumb"><img src="<?php echo $this->plugins_url; ?>/easy-fullscreen-slider/assets/img/bg_patterns/zigzag.png" alt="zigzag.png" /></div><span>zigzag.png</span></li>
               </ul>
           </div>
       </td>
    </tr>
    <tr valign="middle">
        <th scope="row" id="uploadbutton" style="vertical-align: middle;"><input id="upload_images" type="button" class="button" value="Upload Images"/></th>
        <td>
            <div id="slides">
                <?php
                $slides = $values['slides'];
                if($slides!=''){
                    $i = 0;
                    foreach($slides as $slide){
                        echo '<div id="img'.$i.'" class="slide">';
                        echo '<img src="'.$slide['image'].'" alt="" /><input type="hidden" name="efs-slides['.$i.'][image]" value="'.$slide['image'].'" />';
                        echo '<textarea name="efs-slides['.$i.'][title]" placeholder="Caption">'.$slide['title'].'</textarea>
                              <input type="text" name="efs-slides['.$i.'][url]" placeholder="Link" value="'.$slide['url'].'"/>';
                        echo '<div id="'.$i.'" class="dlink"></div>';
                        echo '</div>';
                        $i++;
                    }
                }
                ?>
            </div>
        </td>
    </tr>
</table>
