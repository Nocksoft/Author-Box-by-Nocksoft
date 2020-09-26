<?php


/* Draw HTML */
add_filter("the_content", "nstab_add_authorbox");
function nstab_add_authorbox($content) {
    if (get_option("nstab_setting_dontdisplayauthorbox") == false && is_single()) {
        $avatarsize = esc_attr(get_option('nstab_setting_avatarsize'));
        
        require_once plugin_dir_path(__FILE__) . 'settings-defaults.php';

        $authorurl = get_the_author_meta('user_url');
        if ($authorurl != null && $authorurl != "") {
            $authorurl = "<p id='nstab_homepage'><a href='".$authorurl."'>".$authorurl."</a></p>";
        }
        else {
            $authorurl = "";
        }

        $content .= "
            <div id='author-box-by-nocksoft'>
                <div id='nstab_wrapper'>
                    <div id='nstab_authoravatar' style='background-image: url(\"".nstab_get_avatarurl()."\"); height: ".$avatarsize."px; width: ".$avatarsize."px;'></div>
                    <div id='nstab_authorbio' style='height: ".$avatarsize."px;'>
                        <span style='font-size: ".$fontsizeheader."em;'>".__("About", "author-box-by-nocksoft")." ".get_the_author_meta('display_name')."</span>
                        <p>".get_the_author_meta('description')."</p>
                        ".$authorurl."
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