<?php
/**
 * ajax -> admin -> settings
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();


// check admin logged in
if(!$user->_logged_in || !$user->_is_admin) {
	modal(MESSAGE, __("System Message"), __("You don't have the right permission to access this"));
}

// valid inputs
if(!isset($_GET['edit'])) {
	_error(400);
}

// admin settings
try {

	switch ($_GET['edit']) {
		case 'system':
			$_POST['system_live'] = (isset($_POST['system_live']))? '1' : '0';
			$_POST['system_public'] = (isset($_POST['system_public']))? '1' : '0';
			$_POST['wall_posts_enabled'] = (isset($_POST['wall_posts_enabled']))? '1' : '0';
			$_POST['pages_enabled'] = (isset($_POST['pages_enabled']))? '1' : '0';
			$_POST['groups_enabled'] = (isset($_POST['groups_enabled']))? '1' : '0';
			$_POST['profile_notification_enabled'] = (isset($_POST['profile_notification_enabled']))? '1' : '0';
			$_POST['games_enabled'] = (isset($_POST['games_enabled']))? '1' : '0';
			$_POST['geolocation_enabled'] = (isset($_POST['geolocation_enabled']))? '1' : '0';
			$db->query(sprintf("UPDATE system_options SET 
						system_live = %s, 
						system_message = %s, 
						system_public = %s, 
						system_title = %s, 
						system_description = %s, 
						system_keywords = %s, 
						system_url = %s, 
						system_uploads_directory = %s, 
						wall_posts_enabled = %s, 
						pages_enabled = %s, 
						groups_enabled = %s, 
						profile_notification_enabled = %s, 
						games_enabled = %s, 
						geolocation_enabled = %s, 
						geolocation_key = %s ", secure($_POST['system_live']), secure($_POST['system_message']), secure($_POST['system_public']), secure($_POST['system_title']), secure($_POST['system_description']), secure($_POST['system_keywords']), secure($_POST['system_url']), secure($_POST['system_uploads_directory']), secure($_POST['wall_posts_enabled']), secure($_POST['pages_enabled']), secure($_POST['groups_enabled']), secure($_POST['profile_notification_enabled']), secure($_POST['games_enabled']), secure($_POST['geolocation_enabled']), secure($_POST['geolocation_key']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'registration':
			$_POST['registration_enabled'] = (isset($_POST['registration_enabled']))? '1' : '0';
			$_POST['email_send_activation'] = (isset($_POST['email_send_activation']))? '1' : '0';
			$_POST['getting_started'] = (isset($_POST['getting_started']))? '1' : '0';
			$_POST['delete_accounts_enabled'] = (isset($_POST['delete_accounts_enabled']))? '1' : '0';
			$_POST['social_login_enabled'] = (isset($_POST['social_login_enabled']))? '1' : '0';
			$_POST['facebook_login_enabled'] = (isset($_POST['facebook_login_enabled']))? '1' : '0';
			$_POST['twitter_login_enabled'] = (isset($_POST['twitter_login_enabled']))? '1' : '0';
			$_POST['google_login_enabled'] = (isset($_POST['google_login_enabled']))? '1' : '0';
			$_POST['linkedin_login_enabled'] = (isset($_POST['linkedin_login_enabled']))? '1' : '0';
			$_POST['vkontakte_login_enabled'] = (isset($_POST['vkontakte_login_enabled']))? '1' : '0';
			$db->query(sprintf("UPDATE system_options SET 
						registration_enabled = %s, 
						email_send_activation = %s, 
						getting_started = %s, 
						delete_accounts_enabled = %s, 
						max_accounts = %s, 
						social_login_enabled = %s, 
						facebook_login_enabled = %s, 
						facebook_appid = %s, 
						facebook_secret = %s, 
						twitter_login_enabled = %s, 
						twitter_appid = %s, 
						twitter_secret = %s, 
						google_login_enabled = %s, 
						google_appid = %s, 
						google_secret = %s, 
						linkedin_login_enabled = %s, 
						linkedin_appid = %s, 
						linkedin_secret = %s, 
						vkontakte_login_enabled = %s, 
						vkontakte_appid = %s, 
						vkontakte_secret = %s ", secure($_POST['registration_enabled']), secure($_POST['email_send_activation']), secure($_POST['getting_started']), secure($_POST['delete_accounts_enabled']), secure($_POST['max_accounts']), secure($_POST['social_login_enabled']), secure($_POST['facebook_login_enabled']), secure($_POST['facebook_appid']), secure($_POST['facebook_secret']), secure($_POST['twitter_login_enabled']), secure($_POST['twitter_appid']), secure($_POST['twitter_secret']), secure($_POST['google_login_enabled']), secure($_POST['google_appid']), secure($_POST['google_secret']), secure($_POST['linkedin_login_enabled']), secure($_POST['linkedin_appid']), secure($_POST['linkedin_secret']), secure($_POST['vkontakte_login_enabled']), secure($_POST['vkontakte_appid']), secure($_POST['vkontakte_secret']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'emails':
			$_POST['email_smtp_enabled'] = (isset($_POST['email_smtp_enabled']))? '1' : '0';
			$_POST['email_smtp_authentication'] = (isset($_POST['email_smtp_authentication']))? '1' : '0';
			$db->query(sprintf("UPDATE system_options SET 
						email_smtp_enabled = %s, 
						email_smtp_authentication = %s, 
						email_smtp_server = %s, 
						email_smtp_port = %s, 
						email_smtp_username = %s, 
						email_smtp_password = %s ", secure($_POST['email_smtp_enabled']), secure($_POST['email_smtp_authentication']), secure($_POST['email_smtp_server']), secure($_POST['email_smtp_port']), secure($_POST['email_smtp_username']), secure($_POST['email_smtp_password']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'chat':
			$_POST['chat_enabled'] = (isset($_POST['chat_enabled']))? '1' : '0';
			$_POST['chat_status_enabled'] = (isset($_POST['chat_status_enabled']))? '1' : '0';
			$db->query(sprintf("UPDATE system_options SET 
						chat_enabled = %s, 
						chat_status_enabled = %s ", secure($_POST['chat_enabled']), secure($_POST['chat_status_enabled']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'uploads':
			$_POST['photos_enabled'] = (isset($_POST['photos_enabled']))? '1' : '0';
			$_POST['videos_enabled'] = (isset($_POST['videos_enabled']))? '1' : '0';
			$_POST['audio_enabled'] = (isset($_POST['audio_enabled']))? '1' : '0';
			$_POST['file_enabled'] = (isset($_POST['file_enabled']))? '1' : '0';
			$db->query(sprintf("UPDATE system_options SET 
						uploads_prefix = %s, 
						max_avatar_size = %s, 
						max_cover_size = %s, 
						photos_enabled = %s, 
						max_photo_size = %s, 
						videos_enabled = %s, 
						max_video_size = %s, 
						video_extensions = %s, 
						audio_enabled = %s, 
						max_audio_size = %s, 
						audio_extensions = %s,
						file_enabled = %s, 
						max_file_size = %s, 
						file_extensions = %s ", secure($_POST['uploads_prefix']), secure($_POST['max_avatar_size']), secure($_POST['max_cover_size']), secure($_POST['photos_enabled']), secure($_POST['max_photo_size']), secure($_POST['videos_enabled']), secure($_POST['max_video_size']), secure($_POST['video_extensions']), secure($_POST['audio_enabled']), secure($_POST['max_audio_size']), secure($_POST['audio_extensions']), secure($_POST['file_enabled']), secure($_POST['max_file_size']), secure($_POST['file_extensions']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'security':
			$_POST['censored_words_enabled'] = (isset($_POST['censored_words_enabled']))? '1' : '0';
			$_POST['reCAPTCHA_enabled'] = (isset($_POST['reCAPTCHA_enabled']))? '1' : '0';
			$db->query(sprintf("UPDATE system_options SET 
						censored_words_enabled = %s, 
						censored_words = %s, 
						reCAPTCHA_enabled = %s, 
						reCAPTCHA_site_key = %s, 
						reCAPTCHA_secret_key = %s", secure($_POST['censored_words_enabled']), secure($_POST['censored_words']), secure($_POST['reCAPTCHA_enabled']), secure($_POST['reCAPTCHA_site_key']), secure($_POST['reCAPTCHA_secret_key']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'limits':
			$db->query(sprintf("UPDATE system_options SET 
						data_heartbeat = %s, 
						chat_heartbeat = %s, 
						offline_time = %s, 
						min_results = %s, 
						max_results = %s, 
						min_results_even = %s, 
						max_results_even = %s", secure($_POST['data_heartbeat']), secure($_POST['chat_heartbeat']), secure($_POST['offline_time']), secure($_POST['min_results']), secure($_POST['max_results']), secure($_POST['min_results_even']), secure($_POST['max_results_even']) )) or _error(SQL_ERROR_THROWEN);
			break;

		case 'analytics':
			$db->query(sprintf("UPDATE system_options SET 
						analytics_code = %s ", secure($_POST['analytics_code']) )) or _error(SQL_ERROR_THROWEN);
			break;

		default:
			_error(400);
			break;
	}
	return_json( array('callback' => 'window.location.reload();') );

}catch (Exception $e) {
	return_json( array('error' => true, 'message' => $e->getMessage()) );
}

?>