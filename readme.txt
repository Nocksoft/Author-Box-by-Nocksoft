=== Author Box by Nocksoft ===
Contributors: nocksoft
Tags: author box, author bio, author description, local avatars, about author, about me, author profile, author
Stable tag: trunk
Requires at least: 4.9
Tested up to: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a modern author info box at the end of your posts and implements local avatars as an alternative to Gravatar.


== Description ==
Adds a modern customizable author info box at the end of your posts and implements support for local avatars. You can display a simple author bio box in your posts and pages to show your readers and followers who you are.
Your blog will become even more personal and authentic. This plugin is available in German and English language.

== Features ==
* Adds a simple lightweight Author Box at the end of your posts with a short description about the author
* Adds support for local avatars for authors so that you dont need to use an Gravatar account
* Option for displaying a link to an own "About Me Page" in Author Box for post authors
* Adds shortcode for Author Box so that you can insert a Author Box anywhere you want
* Allows to hide the author box of default WordPress theme

== Setup ==
* Install plugin.
* (optional) Go to "Settings" -> "Author Box" to setup global settings like font sizes or other settings like look of avatars.
* Go to user profiles to enter biographical info.
* (optional) Go to user profiles to tick local avatars and enter a URL to you personal avatar.
* (optional) Go to user profiles to enter other informations about the author.

== Shortcode ==
`[authorbox]`

== Frequently Asked Questions ==
 
= How can I change the avatar for my user? =

You have two options. Either through Gravatar, or you can specify a URL to a previously uploaded local image in your user profile settings. This setting can be made separately for each user.

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

You have two options. Either you choose the setting that this plugins author box is hidden (you can still take advantage of the local avatars) or you choose the setting that the author box of your theme is no longer displayed. For the WordPress default themes you will find a suitable setting in this plugins settings.

== Installation ==

1. Download the plugin (.zip file) on your hard drive.
2. Unzip the zip file contents.
3. Upload the author-box-by-nocksoft folder to the /wp-content/plugins/ directory.
4. Activate the plugin in the "Plugins" menu in WordPress.
5. Make a few settings (see section "Setup" on this page).

== Changelog ==

= 1.x.x =
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