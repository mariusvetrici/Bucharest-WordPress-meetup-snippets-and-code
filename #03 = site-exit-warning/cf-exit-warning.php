<?php
/*
Plugin Name: Exit Warning
Version: 1.0.0
Description: Automatically warn visitors that they are leaving the site when they click any external link. Add the class "no-warning" to any link that should not have a warning.
Author: Crowd Favorite
Author URI: http://crowdfavorite.com
Plugin URI: http://crowdfavorite.com
Text Domain: cf-exit-warning
Domain Path: /languages
*/

function cf_exit_warning_enqueue() {
	wp_enqueue_script( 'cf-exit-warning', plugin_dir_url( __FILE__ ) . 'cf-exit-warning.js', null, '1.0.0', true );
	wp_localize_script( 'cf-exit-warning', 'cfExit', array(
		'siteUrl' => home_url( '/' ),
		'warningText' => sprintf(
			esc_html__ ( 'Please be advised that you are leaving %1$s website. This link is provided as a courtesy. %1$s does not endorse nor control the content of third party websites. Do you wish to continue?', 'cf-exit-warning' ),
			get_bloginfo()
		),
	) );
}
add_action( 'wp_enqueue_scripts', 'cf_exit_warning_enqueue' );
