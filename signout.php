<?php
/**
 * signout
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// check user logged in
if(!$user->_logged_in) {
	_redirect();
}

// sign out
$user->sign_out();
_redirect();

?>