=== Author Box by Nocksoft ===
Contributors: nocksoft
Tags: author box, author bio, author description, about author, about me, author profile, author
Stable tag: 1.1.0
Requires at least: 5.3
Tested up to: 6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a modern author info box at the end of your posts and implements local avatars as an alternative to Gravatar.


== Description ==
Adds a modern customizable author info box at the end of your posts and pages with a short description about the author. You can display a simple author bio box in your posts and pages to show your readers and followers who you are.
Your blog will become even more personal and authentic. This plugin is available in German and English language and is fully compatible with the plugin "Local Avatars by Nocksoft".

== Features ==
* Adds a simple lightweight Author Box at the end of your posts and/or pages with a short description about the author
* Option for displaying a link to an own "About Me Page" in Author Box for post authors
* Adds shortcode for Author Box so that you can insert a Author Box anywhere you want
* Allows to hide the author box of default WordPress theme
* Fully compatible with the plugin "Local Avatars by Nocksoft"

== Setup ==
* Install plugin.
* (optional) Go to "Settings" -> "Author Box" to setup global settings like font sizes or other settings like look of avatars.
* Go to user profiles to enter biographical info.
* (optional) Go to user profiles to enter some informations about the author.
* (optional) Go to Plugins and install the recommended plugin "Local Avatars by Nocksoft" to use local avatars.

== Shortcode ==
`[authorbox]`

== Frequently Asked Questions ==
 
= How can I change the avatar for my author box? =

You have two options. Either through Gravatar, or you can use a local image in your user profile settings. This setting can be made separately for each user. But for this, you need to install the additional plugin "Local Avatars by Nocksoft" first.

= How can I change the biography about me? =

You can do this in your user profile settings.

= Where can I make settings for this plugin? =

You can adjust settings in the user profile settings and in the global settings under "Settings" -> "Author Box".

= What if I want to automatically display Author Box on all pages, but not on a specific page? =

You can add the following code in your functions.php and replace SAMPLEPAGE with your desired page:
`
add_action("wp_head", "remove_authorbox");
function remove_authorbox() {
	global $pagename;
	if (is_page() && function_exists("nstab_add_authorbox") && $pagename == "SAMPLEPAGE") {
		remove_action("the_content", "nstab_add_authorbox");
	}
}
`

= What if my theme also shows an author box? =

You have to disable the author box of your theme. How to do this depends on your theme. But for the WordPress default themes you will find a suitable setting in this plugins settings.

== Installation ==

1. Download the plugin (.zip file) on your hard drive.
2. Unzip the zip file contents.
3. Upload the author-box-by-nocksoft folder to the /wp-content/plugins/ directory.
4. Activate the plugin in the "Plugins" menu in WordPress.
5. Make a few settings (see section "Setup" on this page).

== Changelog ==

= 1.1.0 =
* Fixed PHP warnings "wp_register_style was called incorrectly" and "wp_enqueue_style was called incorrectly"
* Fixed a bug that may caused font family do not work properly in some cases
* Moved local avatars feature to a separate plugin "Local Avatars by Nocksoft" (https://wordpress.org/plugins/local-avatars-by-nocksoft/)

= 1.0.5 =
* Fixed a bug that may caused local avatars do not work properly in some cases
* Fixed a PHP error while saving user specific settings
* General settings page separated in tabs
* Added option to inherit font from theme
* Added option to display shadow of Author Box
* Added option to to adjust border size and border color of Author Box

= 1.0.4 =
* Fixed PHP warnings for PHP 8
* Added shortcode for Author Box
* Optimized settings
* Added option to automatically display Author Box in pages

= 1.0.3 =
* Fixed a bug that caused global settings do not work

= 1.0.2 =
* Headline can now be adjusted
* Users can now add their custom URL including link text for the Author Box footer
* Improved descriptions and translations
* Font size of the biography and the links can now be adjusted
* Added option to show a link to author's archive
* Set Arial as default font
* Border of Author Box can now be hidden
* Authors can now specify their own position, which is displayed below their name

= 1.0.1 =
* Font size of the headline can now be adjusted
* Added option that allows just replace Gravatar through local avatars without displaying Author Box
* Positioning of the Author Box improved
* Positioning of the hyperlink improved
* Added new link "Settings" to plugin overview page
* Added setting for circle avatars
* Author Box from default WordPress theme can now be hidden

= 1.0.0 =
* First release

== Screenshots ==
1. Author Box in action
2. Global settings for Author Box
3. User specific settings for Author Box