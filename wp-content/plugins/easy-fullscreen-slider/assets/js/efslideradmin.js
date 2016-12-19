jQuery('#upload_images').click(function(e){
    e.preventDefault();
    

    var efsuploader = wp.media({
        title: 'Sarven Fullscreen Slider - Upload Images',
        button: {
            text: 'Insert into gallery'
        },
        multiple: true
    })
    .on('select', function() {
        //jQuery('#slides').empty();
        var selection = efsuploader.state().get('selection');
        var i = jQuery('.slide').length;
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            jQuery('<div id="img'+i+'" class="slide"><img src=' +attachment.url+' alt=""><input type="hidden" name="efs-slides['+i+'][image]" value="'+attachment.url+'" /><textarea name="efs-slides['+i+'][title]" placeholder="Caption"></textarea><input type="text" name="efs-slides['+i+'][url]" placeholder="Link" value=""/><div id="'+i+'" class="dlink"></div></div>').appendTo("#slides");
            i++;
        });
    })
    .open();
}); 
jQuery('#slides').on('click', '.dlink', function(){
    jQuery('#img'+this.id).remove();
});
jQuery(function(){
    jQuery('#slides').sortable({
            placeholder: 'ui-state-highlight'
        });
        jQuery('#slides').disableSelection();
});

//bg patterns select
jQuery('.selected_option').click(function(e){
    e.stopPropagation();
    if (jQuery('.bg_options').is(':hidden'))
        jQuery('.bg_options').slideDown();
    else
        jQuery('.bg_options').slideUp();
});
jQuery(document).click( function() {
    jQuery('.bg_options').slideUp();
});
jQuery('.bg_options li').click( function(e) {
    e.stopPropagation();
    if(jQuery(this).children('span').text() != 'none')
        jQuery('#background_pattern').val(jQuery(this).children('.pattern_thumb').children('img').attr('src'));
    else
        jQuery('#background_pattern').val('none');
    jQuery('.selected_option').html(jQuery(this).html());
    jQuery('.bg_options').slideUp();
});