<?php

/*
	Plugin Name: Author Box by Nocksoft
	Version: 1.0.4
	Author: Rafael Nockmann @ Nocksoft
	Author URI: https://nocksoft.de
	Plugin URI: https://github.com/Nocksoft/Author-Box-by-Nocksoft
	Description: Adds a modern customizable author info box at the end of your posts and implements support for local avatars.
	Text Domain: author-box-by-nocksoft
	License: GNU General Public License v2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
    Domain Path:  /languages
*/


/* --- Settings link in plugin overview --- */
add_filter("plugin_action_links_" . plugin_basename(__FILE__), "nstab_pluginsettingslink");
function nstab_pluginsettingslink($links) {
    $settingslink = "<a href='options-general.php?page=nstab'>" . __("Settings", "author-box-by-nocksoft") . "</a>";
    array_unshift($links, $settingslink);
    return $links;
}


/* --- Load scripts --- */
require_once plugin_dir_path(__FILE__) . "/php/setup.php";
require_once plugin_dir_path(__FILE__) . "/php/avatars.php";
require_once plugin_dir_path(__FILE__) . "/php/authorbox.php";
require_once plugin_dir_path(__FILE__) . "/php/settings.php";
require_once plugin_dir_path(__FILE__) . "/php/settings-global.php";
require_once plugin_dir_path(__FILE__) . "/php/settings-user.php";


/* --- Plugin setup --- */
register_activation_hook(__FILE__, "nstab_activate_plugin");
register_uninstall_hook(__FILE__, "nstab_uninstall_plugin");


/* --- Load styles --- */
wp_register_style("author-box-by-nocksoft-style", plugin_dir_url(__FILE__) . "assets/style.css");
wp_enqueue_style("author-box-by-nocksoft-style");

if ($nstab_setting_hidewordpressauthorbox == true) {
	wp_register_style("author-box-by-nocksoft-hidewordpressauthorbox", plugin_dir_url(__FILE__) . "assets/hidewordpressauthorbox.css");
	wp_enqueue_style("author-box-by-nocksoft-hidewordpressauthorbox");
}


/* --- Languages --- */
function nstab_load_plugin_textdomain() {
    load_plugin_textdomain("author-box-by-nocksoft", FALSE, basename(dirname(__FILE__)) . "/languages/");
}
add_action("plugins_loaded", "nstab_load_plugin_textdomain");


/* --- Admin area --- */
function nstab_loadcolorpicker() {
	wp_enqueue_style("wp-color-picker");
	wp_enqueue_script("custom-script-handle", plugin_dir_url(__FILE__) . "js/colorpicker.js", array("wp-color-picker"), false, true);
}
add_action("admin_enqueue_scripts", "nstab_loadcolorpicker");
?>