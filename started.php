<?php
/**
 * started
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// user access
if(!$user->_logged_in) {
	get_login();
}

try {

	/* check if getted started */
	if(!$system['getting_started'] || $user->_data['user_started']) {
		_redirect();
	}

	/* get finished */
	if(isset($_GET['finished'])) {
		/* update user */
        $db->query(sprintf("UPDATE users SET user_started = '1' WHERE user_id = %s", secure($user->_data['user_id'], 'int') )) or _error(SQL_ERROR_THROWEN);
		_redirect();
	}

	// get new people
	$new_people = $user->get_new_people(0, true);
	/* assign variables */
	$smarty->assign('new_people', $new_people);

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page header
page_header($system['system_title']." &rsaquo; ".__("Getting Started"));

// page footer
page_footer("started");

?>