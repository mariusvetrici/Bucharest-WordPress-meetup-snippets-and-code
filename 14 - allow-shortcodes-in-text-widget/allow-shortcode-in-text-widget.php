<?php
/**
 * 
 * Allow shortcode in Wordpress default text widget 
 */
 
add_filter( 'widget_text', 'do_shortcode' );
