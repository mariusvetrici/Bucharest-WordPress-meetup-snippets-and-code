<?php
/**
 * Custom Order by Modified Date
 * @param $query
 */
function my_custom_ordering( $query ) {
	if($query->is_main_query() AND !is_admin() ) {
		if ( $query->is_home() ||  $query->is_category() ||  $query->is_tag() ){
			$query->set( 'orderby', 'modified' );
		}
	}
}
add_action( 'pre_get_posts', 'my_custom_ordering' );