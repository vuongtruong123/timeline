<?php
/**
 * group
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// user access
if(!$system['system_public']) {
	user_access();
}

// check username
if(is_empty($_GET['username']) || !valid_username($_GET['username'])) {
	_error(404);
}

try {

	// [1] get main group info
	$get_group = $db->query(sprintf("SELECT * FROM groups WHERE group_name = %s", secure($_GET['username']))) or _error(SQL_ERROR_THROWEN);
	if($get_group->num_rows == 0) {
		_error(404);
	}
	$group = $get_group->fetch_assoc();
	/* check username case */
	if(strtolower($_GET['username']) == strtolower($group['group_name']) && $_GET['username'] != $group['group_name']) {
		_redirect('/groups/'.$group['group_name']);
	}
	/* get group picture */
	$group['group_picture_default'] = ($group['group_picture'])? false : true;
	$group['group_picture'] = User::get_picture($group['group_picture'], 'group');
	/* get the connection */
	$group['i_joined'] = false;
	if($user->_logged_in) {
		$check_membership = $db->query(sprintf("SELECT * FROM groups_members WHERE group_id = %s AND user_id = %s", secure($group['group_id'], 'int'), secure($user->_data['user_id'], 'int') )) or _error(SQL_ERROR);
		if($check_membership->num_rows > 0) {
			$group['i_joined'] = true;
		}
	}

	// [2] get view content
	switch ($_GET['view']) {
		case '':
			/* get photos */
			$group['photos'] = $user->get_photos($group['group_id'], 'group');

			/* get pinned post */
			$pinned_post = $user->get_post($group['group_pinned_post']);
			$smarty->assign('pinned_post', $pinned_post);

			/* get posts */
			$posts = $user->get_posts( array('get' => 'posts_group', 'id' => $group['group_id']) );
			/* assign variables */
			$smarty->assign('posts', $posts);
			break;

		case 'photos':
			/* get photos */
			$group['photos'] = $user->get_photos($group['group_id'], 'group');
			break;

		case 'albums':
			/* get albums */
			$group['albums'] = $user->get_albums($group['group_id'], 'group');
			break;

		case 'album':
			/* get album */
			$album = $user->get_album($_GET['id']);
			if(!$album || ($album['group_id'] != $group['group_id']) ) {
				_error(404);
			}
			/* assign variables */
			$smarty->assign('album', $album);
			break;

		case 'members':
			/* get members */
			if($group['group_members'] > 0) {
				$group['members'] = $user->get_members($group['group_id']);
			}
			break;

		case 'settings':
			/* check if the viewer is the admin */
			if($user->_data['user_id'] != $group['group_admin']) {
				_error(404);
			}
			break;
		
		default:
			_error(404);
			break;
	}

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page header
page_header($group['group_title']);

// assign variables
$smarty->assign('group', $group);
$smarty->assign('view', $_GET['view']);

// page footer
page_footer("group");

?>