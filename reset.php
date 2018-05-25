<?php
/**
 * reset
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// check user logged in
if($user->_logged_in) {
    _redirect();
}

// page header
page_header($system['system_title']." &rsaquo; ".__("Forgot your password?"));

// page footer
page_footer("reset");

?>