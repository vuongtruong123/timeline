<?php
/**
 * ajax -> users -> started
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

// started
try {

	$args = array();
	$args['edit'] = 'started';
	$args['city'] = $_POST['city'];
	$args['hometown'] = $_POST['hometown'];
	$args['work_title'] = $_POST['work_title'];
	$args['work_place'] = $_POST['work_place'];
	$args['edu_major'] = $_POST['edu_major'];
	$args['edu_school'] = $_POST['edu_school'];
	$args['edu_class'] = $_POST['edu_class'];
	$user->settings($args);
	return_json( array('success' => true, 'message' => __("Done, Your info has been updated")) );

} catch (Exception $e) {
	return_json( array('error' => true, 'message' => $e->getMessage()) );
}

?>