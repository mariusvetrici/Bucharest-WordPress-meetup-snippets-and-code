<?php
/**
* Allow shortcode in widget title
*/

add_filter( 'widget_title', 'do_shortcode' );
