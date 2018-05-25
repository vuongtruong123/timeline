<<<<<<< HEAD
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

=======
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

>>>>>>> 10f37be402c1e1193f283cb08b8b9c37a45d0d81
?>