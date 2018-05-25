<?php
/**
 * ajax -> posts -> edit
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

// edit
try {

	// initialize the return array
	$return = array();

	switch ($_POST['handle']) {

		case 'comment':

			// valid inputs
			/* if id is set & not numeric */
			if(!isset($_POST['id']) || !is_numeric($_POST['id'])) {
				_error(400);
			}
			/* if message not set */
			if(!isset($_POST['message'])) {
				_error(400);
			}
			/* filter comment photo */
			if(isset($_POST['photo'])) {
				$_POST['photo'] = _json_decode($_POST['photo']);
			}

			// edit comment
			$comment = $user->edit_comment($_POST['id'], $_POST['message'], $_POST['photo']);
			/* assign variables */
			$smarty->assign('comment', $comment);
			/* return */
			$return['comment'] = $smarty->fetch("__feeds_post.comment.text.tpl");
			break;

		case 'post':
			// valid inputs
			/* if id is set & not numeric */
			if(!isset($_POST['id']) || !is_numeric($_POST['id'])) {
				_error(400);
			}
			/* if message not set */
			if(!isset($_POST['message'])) {
				_error(400);
			}
			
			// edit post
			$post = $user->edit_post($_POST['id'], $_POST['message']);
			/* assign variables */
			$smarty->assign('post', $post);
			/* return */
			$return['post'] = $smarty->fetch("__feeds_post.text.tpl");
			break;

		case 'privacy':
			// valid inputs
			/* if id is set & not numeric */
			if(!isset($_POST['id']) || !is_numeric($_POST['id'])) {
				_error(400);
			}
			/* if privacy set and not valid */
			$valid['privacy'] = array('me', 'friends', 'public');
			if(!isset($_POST['privacy']) || !in_array($_POST['privacy'], $valid['privacy'])) {
				_error(400);
			}
			
			// edit privacy
			$post = $user->edit_privacy($_POST['id'], $_POST['privacy']);
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