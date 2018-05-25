<?php
/**
 * settings
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// user access
user_access();

try {

	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header(__("Settings")." &rsaquo; ".__("Account Settings"));
			break;

		case 'profile':
			// page header
			page_header(__("Settings")." &rsaquo; ".__("Edit Profile"));
			// parse birthdate
			$user->_data['user_birthdate_parsed'] = date_parse($user->_data['user_birthdate']);
			break;

		case 'privacy':
			// page header
			page_header(__("Settings")." &rsaquo; ".__("Privacy Settings"));
			break;

		case 'linked':
			if(!$system['social_login_enabled']) {
				_error(404);
			}
			// page header
			page_header(__("Settings")." &rsaquo; ".__("Linked Accounts"));
			break;

		case 'blocking':
			// page header
			page_header(__("Settings")." &rsaquo; ".__("Blocking"));

			// get blocks
			$blocks = $user->get_blocked();
			// assign variables
			$smarty->assign('blocks', $blocks);
			break;

		case 'delete':
			if(!$system['delete_accounts_enabled']) {
				_error(404);
			}
			// page header
			page_header(__("Settings")." &rsaquo; ".__("Delete Account"));
			break;

		default:
		_error(404);
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("settings");

?>