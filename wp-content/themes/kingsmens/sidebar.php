<?php
    if( is_active_sidebar('main-sidebar') ):
        dynamic_sidebar('main-sidebar');
    else:
        _e('This is sidebar, you should add some widgets', 'kingsmen');
    endif;
?>