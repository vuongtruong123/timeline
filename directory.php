<?php
/**
 * directory
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

try {

	// get view content
	switch ($_GET['view']) {
		case '':
			// page header
			page_header($system['system_title'].' - '.__("Directory"));
			break;

		case 'posts':
			// page header
			page_header($system['system_title'].' - '.__("Posts Directory"));

			// pager config
			require('includes/class-pager.php');
			$params['selected_page'] = ( (int) $_GET['page'] == 0) ? 1 : $_GET['page'];
			$total = $db->query("SELECT * FROM posts") or _error(SQL_ERROR_THROWEN);
			$params['total_items'] = $total->num_rows;
			$params['items_per_page'] = $system['max_results'];
			$params['url'] = $system['system_url'].'/directory/'.'posts'.'/%s';
			$pager = new Pager($params);
			$limit_query = $pager->getLimitSql();

			// get posts
			$users = array();
			$get_rows = $db->query("SELECT post_id FROM posts ".$limit_query) or _error(SQL_ERROR_THROWEN);
			while($row = $get_rows->fetch_assoc()) {
				$row = $user->get_post($row['post_id']);
				if($row) {
					$rows[] = $row;
				}
			}
			$smarty->assign('rows', $rows);
			$smarty->assign('pager', $pager->getPager());
			break;

		case 'users':
			// page header
			page_header($system['system_title'].' - '.__("Users Directory"));

			// pager config
			require('includes/class-pager.php');
			$params['selected_page'] = ( (int) $_GET['page'] == 0) ? 1 : $_GET['page'];
			$total = $db->query("SELECT * FROM users") or _error(SQL_ERROR_THROWEN);
			$params['total_items'] = $total->num_rows;
			$params['items_per_page'] = $system['max_results'];
			$params['url'] = $system['system_url'].'/directory/'.'users'.'/%s';
			$pager = new Pager($params);
			$limit_query = $pager->getLimitSql();

			// get users
			$users = array();
			$get_rows = $db->query("SELECT * FROM users ".$limit_query) or _error(SQL_ERROR_THROWEN);
			while($row = $get_rows->fetch_assoc()) {
				$row['user_picture'] = User::get_picture($row['user_picture'], $row['user_gender']);
                /* get the connection between the viewer & the target */
                $row['connection'] = $user->connection($row['user_id']);
                $rows[] = $row;
			}
			$smarty->assign('rows', $rows);
			$smarty->assign('pager', $pager->getPager());
			break;

		case 'pages':
			// page header
			page_header($system['system_title'].' - '.__("Pages Directory"));

			// pager config
			require('includes/class-pager.php');
			$params['selected_page'] = ( (int) $_GET['page'] == 0) ? 1 : $_GET['page'];
			$total = $db->query("SELECT * FROM pages") or _error(SQL_ERROR_THROWEN);
			$params['total_items'] = $total->num_rows;
			$params['items_per_page'] = $system['max_results'];
			$params['url'] = $system['system_url'].'/directory/'.'pages'.'/%s';
			$pager = new Pager($params);
			$limit_query = $pager->getLimitSql();

			// get pages
			$users = array();
			$get_rows = $db->query("SELECT * FROM pages ".$limit_query) or _error(SQL_ERROR_THROWEN);
			while($row = $get_rows->fetch_assoc()) {
				$row['page_picture'] = User::get_picture($row['page_picture'], 'page');
                /* check if the viewer liked the page */
                $row['i_like'] = false;
                if($user->_logged_in) {
                    $get_likes = $db->query(sprintf("SELECT * FROM pages_likes WHERE page_id = %s AND user_id = %s", secure($row['page_id'], 'int'), secure($user->_data['user_id'], 'int') )) or _error(SQL_ERROR_THROWEN);
                    if($get_likes->num_rows > 0) {
                        $row['i_like'] = true;
                    }
                }
                $rows[] = $row;
			}
			$smarty->assign('rows', $rows);
			$smarty->assign('pager', $pager->getPager());
			break;

		case 'groups':
			// page header
			page_header($system['system_title'].' - '.__("Pages Directory"));

			// pager config
			require('includes/class-pager.php');
			$params['selected_page'] = ( (int) $_GET['page'] == 0) ? 1 : $_GET['page'];
			$total = $db->query("SELECT * FROM groups") or _error(SQL_ERROR_THROWEN);
			$params['total_items'] = $total->num_rows;
			$params['items_per_page'] = $system['max_results'];
			$params['url'] = $system['system_url'].'/directory/'.'groups'.'/%s';
			$pager = new Pager($params);
			$limit_query = $pager->getLimitSql();

			// get groups
			$users = array();
			$get_rows = $db->query("SELECT * FROM groups ".$limit_query) or _error(SQL_ERROR_THROWEN);
			while($row = $get_rows->fetch_assoc()) {
				$row['group_picture'] = $user->get_picture($row['group_picture'], 'group');
                /* check if the viewer joined the group */
                $row['i_joined'] = false;
                if($user->_logged_in) {
                    $check_membership = $db->query(sprintf("SELECT * FROM groups_members WHERE group_id = %s AND user_id = %s", secure($row['group_id'], 'int'), secure($user->_data['user_id'], 'int') )) or _error(SQL_ERROR_THROWEN);
                    if($check_membership->num_rows > 0) {
                        $row['i_joined'] = true;
                    }
                }
                $rows[] = $row;
			}
			$smarty->assign('rows', $rows);
			$smarty->assign('pager', $pager->getPager());
			break;

		case 'games':
			// page header
			page_header($system['system_title'].' - '.__("Pages Directory"));

			// pager config
			require('includes/class-pager.php');
			$params['selected_page'] = ( (int) $_GET['page'] == 0) ? 1 : $_GET['page'];
			$total = $db->query("SELECT * FROM games") or _error(SQL_ERROR_THROWEN);
			$params['total_items'] = $total->num_rows;
			$params['items_per_page'] = $system['max_results'];
			$params['url'] = $system['system_url'].'/directory/'.'games'.'/%s';
			$pager = new Pager($params);
			$limit_query = $pager->getLimitSql();

			// get games
			$users = array();
			$get_rows = $db->query("SELECT * FROM games ".$limit_query) or _error(SQL_ERROR_THROWEN);
			while($row = $get_rows->fetch_assoc()) {
				$row['thumbnail'] = User::get_picture($row['thumbnail'], 'game');
				$rows[] = $row;
			}
			$smarty->assign('rows', $rows);
			$smarty->assign('pager', $pager->getPager());
			break;
		
		default:
			_error(404);
			break;
	}
	/* assign variables */
	$smarty->assign('view', $_GET['view']);

	// get ads
	$ads = $user->ads('directory');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widget
	$widget = $user->widget('directory');
	/* assign variables */
	$smarty->assign('widget', $widget);

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("directory");

?>