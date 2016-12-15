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
</div>
<?php get_footer() ?>