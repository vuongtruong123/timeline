<?php
/**
 * index
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

try {

	// check user logged in
	if(!$user->_logged_in) {

		// page header
		page_header(__("Welcome to").' '.$system['system_title']);

		// get random users
		$random_users = array();
		$get_random_users = $db->query("SELECT user_name, user_fullname, user_gender, user_picture FROM users ORDER BY RAND() LIMIT 4") or _error(SQL_ERROR_THROWEN);
		if($get_random_users->num_rows > 0) {
			while($random_user = $get_random_users->fetch_assoc()) {
				$random_user['user_picture'] = User::get_picture($random_user['user_picture'], $random_user['user_gender']);
				$random_users[] = $random_user;
			}
		}
		/* assign variables */
		$smarty->assign('random_users', $random_users);

	} else {

		// user access
		user_access();

		// get view content
		switch ($_GET['view']) {
			case '':
				// page header
				page_header($system['system_title']);

				// get posts (newsfeed)
				$posts = $user->get_posts();
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'saved':
				// page header
				page_header(__("Saved Posts"));

				// get posts (saved)
				$posts = $user->get_posts( array('get' => 'saved') );
				/* assign variables */
				$smarty->assign('posts', $posts);
				break;

			case 'pages':
				// page header
				page_header(__("Pages"));
				break;

			case 'groups':
				// page header
				page_header(__("Groups"));
				break;

			case 'create_page':
				// page header
				page_header($system['system_title']." &rsaquo; ".__("Create Page"));

				// get pages categories
				$categories = $user->get_pages_categories();
				/* assign variables */
				$smarty->assign('categories', $categories);
				break;

			case 'create_group':
				// page header
				page_header($system['system_title']." &rsaquo; ".__("Create Group"));
				break;

			case 'games':
				// games enabled
				if(!$system['games_enabled']) {
					_error(404);
				}

				// page header
				page_header($system['system_title']." &rsaquo; ".__("Games"));

				// get games
				$games = $user->get_games();
				/* assign variables */
				$smarty->assign('games', $games);
				break;

			default:
				_error(404);
				break;
		}
		/* assign variables */
		$smarty->assign('view', $_GET['view']);

		// get pages
		$pages = $user->get_pages();
		/* assign variables */
		$smarty->assign('pages', $pages);

		// get groups
		$groups = $user->get_groups();
		/* assign variables */
		$smarty->assign('groups', $groups);

		// get new people
		$new_people = $user->get_new_people(0, true);
		/* assign variables */
		$smarty->assign('new_people', $new_people);

		// get new pages
		$new_pages = $user->get_pages( array('suggested' => true));
		/* assign variables */
		$smarty->assign('new_pages', $new_pages);

		// get new groups
		$new_groups = $user->get_groups( array('suggested' => true));
		/* assign variables */
		$smarty->assign('new_groups', $new_groups);

		// get announcements
		$announcements = $user->announcements();
		/* assign variables */
		$smarty->assign('announcements', $announcements);

		// get ads
		$ads = $user->ads('home');
		/* assign variables */
		$smarty->assign('ads', $ads);

		// get widget
		$widget = $user->widget('home');
		/* assign variables */
		$smarty->assign('widget', $widget);

	}

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("index");


?>