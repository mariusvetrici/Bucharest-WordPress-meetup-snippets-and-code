<?php
/**
* Disable the url field from Wordpress default comment form
*/

add_filter('comment_form_default_fields','unset_url_field_in_comment');

function unset_url_field_in_comment( $fields ){
	if ( isset( $fields['url'] ) ) { unset( $fields['url'] ); }
	return $fields;
}
