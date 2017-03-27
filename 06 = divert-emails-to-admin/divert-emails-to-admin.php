<?php

/**
 * DIVERTS ALL EMAILS TO ADMIN
 *
 * @param $content
 * @return mixed
 */

function admin_email($content){
	$content['to'] = get_bloginfo('admin_email');
	if(isset($content['html'])){
		$content['html'] = nl2br( $content['html'] );
	}
	return $content;
}

add_filter( 'wp_mail', 'admin_email', 999999 );
