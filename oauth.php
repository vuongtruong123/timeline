<?php
/**
 * oauth
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// fetch hybridauth
require_once( "includes/libs/hybridauth/Hybrid/Auth.php" );
require_once( "includes/libs/hybridauth/Hybrid/Endpoint.php" );

// process
try {

	Hybrid_Endpoint::process();

} catch (Exception $e) {
	_error('System Message', $e->getMessage());
}