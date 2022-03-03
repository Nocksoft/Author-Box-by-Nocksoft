<?php

/* Author Box Shortcode. */
add_shortcode("authorbox", "nstab_shortcode_authorbox");
function nstab_shortcode_authorbox() {
    return nstab_get_authorbox();
}


/* Adds Author Box at end of posts and pages automatically. */
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


/* Get Author Box HTML. */
function nstab_get_authorbox() {
	global $nstab_setting_font;
	global $nstab_setting_showshadow;
	global $nstab_setting_showborder;
	global $nstab_setting_bordercolor;
	global $nstab_setting_bordersize;
	global $nstab_setting_avatarsize;
	global $nstab_setting_circleavatar;
	global $nstab_setting_headline;
	global $nstab_setting_fontsizeheadline;
	global $nstab_setting_fontsizeposition;
	global $nstab_setting_fontsizebio;
	global $nstab_setting_fontsizelinks;
	global $nstab_setting_displayauthorsarchive;
	
	$author_id = get_the_author_meta("ID");
	
    $circleavatar = "";
    if ($nstab_setting_circleavatar == true) {
        $circleavatar = "class='nstab_circle'";
    }

    $authorlinktext = get_the_author_meta("nstab_setting_homepage_linktext");
    $authorlinkurl = get_the_author_meta("nstab_setting_homepage_linkurl");
    if ($authorlinktext != null && $authorlinkurl != null) {
        $homepagehref = "<a href='" . $authorlinkurl . "'>" . $authorlinktext . "</a>";
        if ($nstab_setting_displayauthorsarchive == true) {
            $homepagehref .= " | <a href='" . get_author_posts_url($author_id) . "'>" . __("View Archive", "author-box-by-nocksoft") . "</a>";
        }
    }
    else {
        $homepagehref = "";
        if ($nstab_setting_displayauthorsarchive == true) {
            $homepagehref .= "<a href='" . get_author_posts_url($author_id) . "'>" . __("View Archive", "author-box-by-nocksoft") . "</a>";
        }
    }

    $font = $nstab_setting_font == "arial" ? "font-family: Arial;" : null;
	$shadow = $nstab_setting_showshadow == true ? "padding: 0.75em; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" : null;
    $border = $nstab_setting_showborder == true ? "padding: 0.75em; border: ".$nstab_setting_bordersize."px solid ".$nstab_setting_bordercolor.";" : null;
	
	$url = nstab_get_local_avatarurl($author_id);
	if (empty($url)) $url = get_avatar_url($author_id);
	
    $authorbox = "
		<div id='author-box-by-nocksoft' style='".$font.$shadow.$border."'>
            <div id='nstab_wrapper'>
                <div id='nstab_authoravatar' " . $circleavatar . " style='background-image: url(\"".$url."\"); height: ".$nstab_setting_avatarsize."px; width: ".$nstab_setting_avatarsize."px;'></div>
                <div id='nstab_authorbio' style='height: ".$nstab_setting_avatarsize."px;'>
					<div id='header'>
						<span id='headline' style='font-size: " . $nstab_setting_fontsizeheadline . "em;'>" . $nstab_setting_headline . " " . get_the_author_meta("display_name") . "</span>
						<span id='position' style='font-size: " . $nstab_setting_fontsizeposition . "em;'>" . get_the_author_meta("nstab_setting_authorposition") . "</span>
					</div>
					<div id='nstab_description' style='font-size: " . $nstab_setting_fontsizebio . "em;'>" . get_the_author_meta("description") . "</div>
					<div id='nstab_links' style='font-size: " . $nstab_setting_fontsizelinks . "em;'>" . $homepagehref . "</div>
				</div>
            </div>
        </div>
    ";

    return $authorbox;
}

?>