<?php
    /*
    Template Name: Contact
    */
?>
<?php get_header(  ) ?>
<div class="page content" class="page content">
    <div id="main-content">
        <div class="contant-info">
            <h4>Contact Address</h4>
            <p>Etown 1, Cong Hoa District, HCMC</p>
            <p>01656237827</p>
        
        </div>
        <div class="contant-info">
            <?php
                echo do_shortcode('[contact-form-7 id="1751" title="Contact form 1"]');
            ?>
        
        </div>
    </div>
    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer() ?>