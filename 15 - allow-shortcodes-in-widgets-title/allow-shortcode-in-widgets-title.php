<?php
/**
* Allow shortcode in widget title
*/

add_filter('widget_title',  'allow_shortcode_in_widget_title');

function allow_shortcode_in_widget_title($title){
    return do_shortcode(htmlspecialchars_decode($title));
}
