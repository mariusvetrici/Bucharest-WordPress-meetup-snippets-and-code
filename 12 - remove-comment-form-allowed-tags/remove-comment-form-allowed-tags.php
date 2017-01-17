<?php
/**
* Remove the "allowed html tags" description from the default wordpress comment form
**/

add_filter( 'comment_form_defaults', 'remove_comment_form_allowed_tags' );

function remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}
