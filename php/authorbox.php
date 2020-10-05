<?php


/* Draw HTML */
add_filter("the_content", "nstab_add_authorbox");
function nstab_add_authorbox($content) {
    if (get_option("nstab_setting_dontdisplayauthorbox") == false && is_single()) {
        $avatarsize = esc_attr(get_option("nstab_setting_avatarsize"));
        $circleavatar = "";
        if (get_option("nstab_setting_circleavatar") == true) {
            $circleavatar = "class='nstab_circle'";
        }
        
        require_once plugin_dir_path(__FILE__) . "settings-defaults.php";

        $authorlinktext = get_the_author_meta("nstab_setting_homepage_linktext");
        $authorlinkurl = get_the_author_meta("nstab_setting_homepage_linkurl");
        if ($authorlinktext != null && $authorlinkurl != null) {
            $homepagehref = "<p id='nstab_homepage'><a href='".$authorlinkurl."'>".$authorlinktext."</a></p>";
        }
        else {
            $homepagehref = "";
        }

        $content .= "
            <div id='author-box-by-nocksoft'>
                <div id='nstab_wrapper'>
                    <div id='nstab_authoravatar' " . $circleavatar . " style='background-image: url(\"".nstab_get_avatarurl()."\"); height: ".$avatarsize."px; width: ".$avatarsize."px;'></div>
                    <div id='nstab_authorbio' style='height: ".$avatarsize."px;'>
                        <span style='font-size: " . $fontsizeheader . "em;'>" . get_option("nstab_setting_headline") . " " . get_the_author_meta('display_name') . "</span>
                        <p>".get_the_author_meta('description')."</p>
                        " . $homepagehref . "
                    </div>
                </div>
        ";

        $content .= "
                </div>
            ";
    }
    return $content;
}

?>