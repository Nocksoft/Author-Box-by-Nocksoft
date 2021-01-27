<?php

/* Author Box Shortcode. */
function nstab_shortcode_authorbox() {
    return nstab_get_authorbox();
}
add_shortcode("authorbox", "nstab_shortcode_authorbox");


/* Adds Author Box at end of posts */
add_filter("the_content", "nstab_add_authorbox");
function nstab_add_authorbox($content) {
    if (get_option("nstab_setting_dontdisplayauthorbox") == false && is_single()) {
        $content .= nstab_get_authorbox();
    }
    return $content;
}


/* --- Drawing of the Author Box --- */

/* Adds Author Box */
function nstab_get_authorbox() {
    $avatarsize = esc_attr(get_option("nstab_setting_avatarsize"));
    $circleavatar = "";
    if (get_option("nstab_setting_circleavatar") == true) {
        $circleavatar = "class='nstab_circle'";
    }
    
    require plugin_dir_path(__FILE__) . "settings-defaults.php";

    $authorlinktext = get_the_author_meta("nstab_setting_homepage_linktext");
    $authorlinkurl = get_the_author_meta("nstab_setting_homepage_linkurl");
    if ($authorlinktext != null && $authorlinkurl != null) {
        $homepagehref = "<p id='nstab_links' style='font-size: " . $fontsizelinks . "em;'><a href='" . $authorlinkurl . "'>" . $authorlinktext . "</a>";
        if (get_option("nstab_setting_displayauthorsarchive") == true) {
            $homepagehref .= " | <a href='" . get_author_posts_url(get_the_author_meta("ID")) . "'>" . __("View Archive", "author-box-by-nocksoft") . "</a>";
        }
        $homepagehref .= "</p>";
    }
    else {
        $homepagehref = "";
        if (get_option("nstab_setting_displayauthorsarchive") == true) {
            $homepagehref .= "<p id='nstab_links' style='font-size: " . $fontsizelinks . "em;'><a href='" . get_author_posts_url(get_the_author_meta("ID")) . "'>" . __("View Archive", "author-box-by-nocksoft") . "</a></p>";
        }
    }

    $authorboxcontainer = "<div id='author-box-by-nocksoft'>";
    if (get_option("nstab_setting_showborder", true) == true) {
        $authorboxcontainer = "<div id='author-box-by-nocksoft' style='padding: 0.75em; border: 1px solid #EEEEEE;'>";
    }
    $authorbox = $authorboxcontainer .= "
            <div id='nstab_wrapper'>
                <div id='nstab_authoravatar' " . $circleavatar . " style='background-image: url(\"".nstab_get_avatarurl()."\"); height: ".$avatarsize."px; width: ".$avatarsize."px;'></div>
                <div id='nstab_authorbio' style='height: ".$avatarsize."px;'>
                <div id='header'>
                    <span id='headline' style='font-size: " . $fontsizeheadline . "em;'>" . get_option("nstab_setting_headline") . " " . get_the_author_meta("display_name") . "</span>
                    <span id='position' style='font-size: " . $fontsizeposition . "em;'>" . get_the_author_meta("nstab_setting_authorposition") . "</span>
                </div>
                    <p id='nstab_description' style='font-size: " . $fontsizebio . "em;'>" . get_the_author_meta("description") . "</p>
                    " . $homepagehref . "
                </div>
            </div>
        </div>
    ";

    return $authorbox;
}

?>