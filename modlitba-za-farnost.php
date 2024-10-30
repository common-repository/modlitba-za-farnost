<?php
/*
Plugin Name: Modlitba za farnosť
Plugin URI: https://thespirit.studio/wordpress-pluginy/
Description: Plugin generuje shortcode [modlitba_za_farnost]. Vložením na web zobrazíte dnešnú modlitbu za farnosť.
Version: 1.0.0
Author: TheSpirit.studio
Author URI: https://thespirit.studio/
Text Domain: modlitba-za-farnost
Domain Path: /languages
License: GPL2

Modlitba za farnosť is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version

Modlitba za farnosť is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define ('MPODMF_PLUGIN_PATH', plugin_dir_path( __FILE__));
define ('MPODMF_VERSION','1.0.0');

include (MPODMF_PLUGIN_PATH . 'includes/functions.php');

function mpodmf_activate() {

    // Upon activation, load the daily prayer for the very fist time
    mpodmf_get_today_modlitba();
}
register_activation_hook( __FILE__, 'mpodmf_activate' );

function mpodmf_deactivate() {

    // Deactivation code here...
}
register_deactivation_hook( __FILE__, 'mpodmf_deactivate' );

?>