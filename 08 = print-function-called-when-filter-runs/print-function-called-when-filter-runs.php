<?php

/**
 * FILTER PRINT
 *
 * prints functions in order of priorities for called filter / action.
 * used only to debug, test and hook tinkering ;)
 */
function filter_print() {
	global $wp_filter;
	echo "<pre>";
	print_r( $wp_filter['woocommerce_after_single_product_summary'] );
	die();
}
add_action( 'woocommerce_after_single_product_summary', 'filter_print', 999999 );

