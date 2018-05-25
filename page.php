<?php
/**
 * page
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

	// [1] get main page info
	$get_page = $db->query(sprintf("SELECT pages.*, pages_categories.category_name FROM pages LEFT JOIN pages_categories ON pages.page_category = pages_categories.category_id WHERE page_name = %s", secure($_GET['username']))) or _error(SQL_ERROR_THROWEN);
	if($get_page->num_rows == 0) {
		_error(404);
	}
	$spage = $get_page->fetch_assoc();
	/* check username case */
	if(strtolower($_GET['username']) == strtolower($spage['page_name']) && $_GET['username'] != $spage['page_name']) {
		_redirect('/pages/'.$spage['page_name']);
	}
	/* get page picture */
	$spage['page_picture_default'] = ($spage['page_picture'])? false : true;
	$spage['page_picture'] = User::get_picture($spage['page_picture'], 'page');
	/* check page category */
	$spage['category_name'] = (!$spage['category_name'])? __('N/A'): $spage['category_name']; /* in case deleted by admin */
	/* get the connection */
	$spage['i_like'] = false;
	if($user->_logged_in) {
		$get_likes = $db->query(sprintf("SELECT * FROM pages_likes WHERE page_id = %s AND user_id = %s", secure($spage['page_id'], 'int'), secure($user->_data['user_id'], 'int') )) or _error(SQL_ERROR_THROWEN);
		if($get_likes->num_rows > 0) {
			$spage['i_like'] = true;
		}
	}

	// [2] get view content
	switch ($_GET['view']) {
		case '':
			/* get photos */
			$spage['photos'] = $user->get_photos($spage['page_id'], 'page');

			/* get pinned post */
			$pinned_post = $user->get_post($spage['page_pinned_post']);
			$smarty->assign('pinned_post', $pinned_post);

			/* get posts */
			$posts = $user->get_posts( array('get' => 'posts_page', 'id' => $spage['page_id']) );
			/* assign variables */
			$smarty->assign('posts', $posts);
			break;

		case 'photos':
			/* get photos */
			$spage['photos'] = $user->get_photos($spage['page_id'], 'page');
			break;

		case 'albums':
			/* get albums */
			$spage['albums'] = $user->get_albums($spage['page_id'], 'page');
			break;

		case 'album':
			/* get album */
			$album = $user->get_album($_GET['id']);
			if(!$album || $album['in_group'] || $album['user_type'] == "user" || ($album['user_type'] == "page" && $album['page_id'] != $spage['page_id'])) {
				_error(404);
			}
			/* assign variables */
			$smarty->assign('album', $album);
			break;
		
		case 'settings':
			/* check if the viewer is the admin */
			if($user->_data['user_id'] != $spage['page_admin']) {
				_error(404);
			}

			/* get pages categories */
			$categories = $user->get_pages_categories();
			/* assign variables */
			$smarty->assign('categories', $categories);
			break;

		default:
			_error(404);
			break;
	}

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page header
page_header($spage['page_title']);

// assign variables
$smarty->assign('spage', $spage);
$smarty->assign('view', $_GET['view']);

// page footer
page_footer("page");

?>