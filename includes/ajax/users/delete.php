<?php
/**
 * ajax -> users -> delete
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// check user logged in
if(!$user->_logged_in) {
    modal(LOGIN);
}

// check if delete accounts enabled
if(!$system['delete_accounts_enabled']) {
	modal(ERROR, __("Error"), __("This feature has been disabled by the admin"));
}

// delete
try {

	// delete user
	$user->delete_user($user->_data['user_id']);

	// return & exit
	return_json();

}catch (Exception $e) {
	modal(ERROR, __("Error"), $e->getMessage());
}

?>