<?php
/**
 * ajax -> albums -> modal
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

// check user activated
if($system['email_send_activation'] && !$user->_data['user_activated']) {
	modal(MESSAGE, __("Not Activated"), __("Before you can interact with other users, you need to confirm your email address"));
}

// valid inputs
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	_error(400);
}

try {

	// initialize the return array
	$return = array();

	// get album
	$album = $user->get_album($_GET['id']);
	/* assign variables */
	$smarty->assign('album', $album);

	switch ($_GET['do']) {
		case 'edit_title':
			/* return */
			$return['edit_title'] = $smarty->fetch("ajax.album.edit_title.tpl");
			$return['callback'] = "$('#modal').modal('show'); $('.modal-content:last').html(response.edit_title);";
			break;

		case 'add_photos':
			/* return */
			$return['add_photos'] = $smarty->fetch("ajax.album.add_photos.tpl");
			$return['callback'] = "$('#modal').modal('show'); $('.modal-content:last').html(response.add_photos);";
			break;
		
		default:
			_error(400);
			break;
	}

	// return & exit
	return_json($return);

} catch (Exception $e) {
	modal(ERROR, __("Error"), $e->getMessage());
}


?>