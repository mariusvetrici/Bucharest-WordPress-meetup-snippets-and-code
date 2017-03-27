<?php
/**
 * Pass php to javascript.
 */
function custom_scripts() {
	$firstname = "John";
	$lastname = "Doe";
	$website = "johndoe.com";

	wp_register_script( 'custom-actions', get_stylesheet_directory_uri() . '/js/actions.js', array(), '20160920', true );
	$translation_array = array(
		'firstname'  => $firstname,
		'lastname' => $lastname,
		'website' => $website,
		'ajaxurl' => admin_url('admin-ajax.php')
	);
	wp_localize_script( 'custom-actions', 'settings', $translation_array );
	wp_enqueue_script( 'custom-actions' );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );
