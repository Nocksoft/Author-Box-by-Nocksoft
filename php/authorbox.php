<?php

/* Author Box Shortcode. */
function nstab_shortcode_authorbox() {
    return nstab_get_authorbox();
}
add_shortcode("authorbox", "nstab_shortcode_authorbox");


/* Adds Author Box at end of posts */
add_filter("the_content", "nstab_add_authorbox");
function nstab_add_authorbox($content) {
	global $nstab_setting_displayauthorboxonposts;
	global $nstab_setting_displayauthorboxonpages;
	
    if (is_single() && $nstab_setting_displayauthorboxonposts == true) {
        $content .= nstab_get_authorbox();
    }
    else if (is_page() && $nstab_setting_displayauthorboxonpages == true
        && !is_front_page() && !is_home() && !is_privacy_policy()) {
        $content .= nstab_get_authorbox();
    }
    return $content;
}


/* --- Drawing of the Author Box --- */

/* Adds Author Box */
function nstab_get_authorbox() {
	global $nstab_setting_font;
	global $nstab_setting_showborder;
	global $nstab_setting_avatarsize;
	global $nstab_setting_circleavatar;
	global $nstab_setting_headline;
	global $nstab_setting_fontsizeheadline;
	global $nstab_setting_fontsizeposition;
	global $nstab_setting_fontsizebio;
	global $nstab_setting_fontsizelinks;
	global $nstab_setting_displayauthorsarchive;
	
    $circleavatar = "";
    if ($nstab_setting_circleavatar == true) {
        $circleavatar = "class='nstab_circle'";
    }

    $authorlinktext = get_the_author_meta("nstab_setting_homepage_linktext");
    $authorlinkurl = get_the_author_meta("nstab_setting_homepage_linkurl");
    if ($authorlinktext != null && $authorlinkurl != null) {
        $homepagehref = "<p id='nstab_links' style='font-size: " . $nstab_setting_fontsizelinks . "em;'><a href='" . $authorlinkurl . "'>" . $authorlinktext . "</a>";
        if ($nstab_setting_displayauthorsarchive == true) {
            $homepagehref .= " | <a href='" . get_author_posts_url(get_the_author_meta("ID")) . "'>" . __("View Archive", "author-box-by-nocksoft") . "</a>";
        }
        $homepagehref .= "</p>";
    }
    else {
        $homepagehref = "";
        if ($nstab_setting_displayauthorsarchive == true) {
            $homepagehref .= "<p id='nstab_links' style='font-size: " . $nstab_setting_fontsizelinks . "em;'><a href='" . get_author_posts_url(get_the_author_meta("ID")) . "'>" . __("View Archive", "author-box-by-nocksoft") . "</a></p>";
        }
    }

    $font = $nstab_setting_font == "arial" ? "font-family: Arial;" : null;
    $border = $nstab_setting_showborder == true ? "padding: 0.75em; border: 1px solid #EEEEEE;" : null;
	$authorboxcontainer = "<div id='author-box-by-nocksoft' style='".$font.$border."'>";
	
    $authorbox = $authorboxcontainer .= "
            <div id='nstab_wrapper'>
                <div id='nstab_authoravatar' " . $circleavatar . " style='background-image: url(\"".nstab_get_avatarurl()."\"); height: ".$nstab_setting_avatarsize."px; width: ".$nstab_setting_avatarsize."px;'></div>
                <div id='nstab_authorbio' style='height: ".$nstab_setting_avatarsize."px;'>
                <div id='header'>
                    <span id='headline' style='font-size: " . $nstab_setting_fontsizeheadline . "em;'>" . $nstab_setting_headline . " " . get_the_author_meta("display_name") . "</span>
                    <span id='position' style='font-size: " . $nstab_setting_fontsizeposition . "em;'>" . get_the_author_meta("nstab_setting_authorposition") . "</span>
                </div>
                    <p id='nstab_description' style='font-size: " . $nstab_setting_fontsizebio . "em;'>" . get_the_author_meta("description") . "</p>
                    " . $homepagehref . "
                </div>
            </div>
        </div>
    ";

    return $authorbox;
}

?>