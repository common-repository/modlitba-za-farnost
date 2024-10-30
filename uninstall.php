<?php
/*
 * Fired when the plugin is uninstalled.
*/

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit; }

// Uninstallation code here...
delete_option('mod_za_far_text');
delete_option('mod_za_far_date');