<<<<<<< HEAD
<?php
/**
 * notifications
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// user access
user_access();

// page header
page_header(__("Notifications"));


// notifications
try {

	// reset live counters
	$user->live_counters_reset('notifications');

	// get ads
	$ads = $user->ads('notifications');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widget
	$widget = $user->widget('notifications');
	/* assign variables */
	$smarty->assign('widget', $widget);


} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("notifications");

=======
<?php
/**
 * notifications
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// user access
user_access();

// page header
page_header(__("Notifications"));


// notifications
try {

	// reset live counters
	$user->live_counters_reset('notifications');

	// get ads
	$ads = $user->ads('notifications');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widget
	$widget = $user->widget('notifications');
	/* assign variables */
	$smarty->assign('widget', $widget);


} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("notifications");

>>>>>>> 10f37be402c1e1193f283cb08b8b9c37a45d0d81
?>