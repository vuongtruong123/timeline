<?php
/**
 * ajax -> posts -> filter
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

// get filtered posts
try {

	// initialize the return array
	$return = array();

	// get data
	$posts = $user->get_posts( array('get' => $_POST['get'], 'filter' => $_POST['filter'], 'id' => $_POST['id']) );
	/* assign variables */
	$smarty->assign('posts', $posts);
	$smarty->assign('_get', $_POST['get']);
	$smarty->assign('_filter', $_POST['filter']);
	$smarty->assign('_id', $_POST['id']);
	/* return */
	$return['posts'] = $smarty->fetch("ajax.posts.tpl");

	// return & exit
	return_json($return);

} catch (Exception $e) {
	modal(ERROR, __("Error"), $e->getMessage());
}

?>