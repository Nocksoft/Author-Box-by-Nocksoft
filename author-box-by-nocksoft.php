<?php

/*
	Plugin Name: Author Box by Nocksoft
	Version: 1.0.0
	Author: Rafael Nockmann @ Nocksoft
	Author URI: http://nocksoft.de
	Description: Adds a modern author info box at the end of your posts and implements local avatars as an alternative to Gravatar.
	Text Domain: author-box-by-nocksoft
	License: GNU General Public License v2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
    Domain Path:  /languages
*/


/* --- Load scripts --- */
require_once plugin_dir_path(__FILE__) . '/php/setup.php';
require_once plugin_dir_path(__FILE__) . '/php/avatars.php';
require_once plugin_dir_path(__FILE__) . '/php/authorbox.php';
require_once plugin_dir_path(__FILE__) . '/php/settings-global.php';
require_once plugin_dir_path(__FILE__) . '/php/settings-user.php';


/* --- Plugin setup --- */
register_activation_hook(__FILE__, 'nstab_activate_plugin');
register_uninstall_hook(__FILE__, 'nstab_uninstall_plugin');


/* --- Load styles --- */
wp_register_style('author-box-by-nocksoft-style', plugin_dir_url(__FILE__) . 'assets/style.css');
wp_enqueue_style('author-box-by-nocksoft-style');


/* --- Languages --- */
function nstab_load_plugin_textdomain() {
    load_plugin_textdomain('author-box-by-nocksoft', FALSE, basename(dirname(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'nstab_load_plugin_textdomain');


?>