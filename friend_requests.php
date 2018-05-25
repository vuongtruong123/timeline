<?php
/**
 * friend_requests
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
			page_header(__("Friend Requests"));
			break;

		case 'sent':
			// page header
			page_header(__("Friend Requests Sent"));
			break;

		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get ads
	$ads = $user->ads('requests');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widget
	$widget = $user->widget('requests');
	/* assign variables */
	$smarty->assign('widget', $widget);
	
} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("friend_requests");

?>