<?php


/* Show user settings */
add_action("show_user_profile", "nstab_usersettings");
add_action("edit_user_profile", "nstab_usersettings");
function nstab_usersettings($user) {
    ?>
    <h3>Author Box by Nocksoft</h3>

    <p><?php echo __("Here you can make further settings for your avatar or other personal settings. The WordPress administrator can adjust global settings under Settings -> Author Box.", "author-box-by-nocksoft"); ?></p>

    <table class="form-table">
        <tr>
            <th><label for="nstab_setting_localavatar"><?php echo __("Local Avatar", "author-box-by-nocksoft"); ?></label></th>
            <td>
                <p>
                    <input type="checkbox" id="nstab_setting_localavatar" name="nstab_setting_localavatar" <?php if (get_the_author_meta("nstab_setting_localavatar", $user->ID) == "on") echo "checked"; ?>>
                    <label for="nstab_setting_localavatar"><?php echo __("Use a local avatar instead of Gravatar (choose your avatar below)", "author-box-by-nocksoft"); ?></label>
                </p>
            
                <?php
                    $avatarurl = nstab_get_avatarurl($user->ID, true, true);
                    remove_filter("get_avatar_data", "nstab_get_avatar_data");
                    $gravatarurl = get_avatar_url($user->ID);
                    add_filter("get_avatar_data", "nstab_get_avatar_data", 10, 2);
                ?>
                <p><img id="nstab_avatar" loading="lazy" width="96" height="96" src="<?php echo $avatarurl; ?>"></p>
                <p><input type="text" id="nstab_setting_avatarurl" name="nstab_setting_avatarurl" class="regular-text" placeholder="<?php echo __("Avatar URL (e.g. https://yoursite.com/avatar.jpg) -> will be filled automatically", "author-box-by-nocksoft"); ?>" value="<?php echo $avatarurl; ?>" default="<?php echo $gravatarurl; ?>" /></p>
                <p style="display: none;"><input type="hidden" id="nstab_setting_avatarid" name="nstab_setting_avatarid" class="regular-text" value="<?php echo attachment_url_to_postid($avatarurl); ?>" /></p>
                <p class="description"><?php echo __("Please select an avatar using the button below (square avatars are recommended). Gravatar may be used as fallback.", "author-box-by-nocksoft"); ?></p>
                <p>
                    <input type="button" id="nstab_setavatar" class="button" value="<?php echo __("Choose Avatar"); ?>"/>
                    <input type="button" id="nstab_deleteavatar" class="button" value="<?php echo __("Remove Avatar"); ?>"/>
                </p>
            </td>
        </tr>

        <tr>
            <th><label for="nstab_setting_authorposition"><?php echo __("Your Position", "author-box-by-nocksoft"); ?></label></th>
            <td>
                <?php $authorposition = get_the_author_meta("nstab_setting_authorposition", $user->ID); ?>
                <input type="text" id="nstab_setting_authorposition" name="nstab_setting_authorposition" class="regular-text" placeholder="<?php echo __("Position (e.g. Founder or Author of YourSite)", "author-box-by-nocksoft"); ?>" value="<?php echo $authorposition; ?>" />
                <p class="description"><?php echo __("Here you can enter your position. The position is shown below your name in the Author Box.", "author-box-by-nocksoft"); ?></p>
            </td>
        </tr>

        <tr>
            <th><label for="nstab_setting_homepage_linkurl"><?php echo __("Homepage / About Me Page", "author-box-by-nocksoft"); ?></label></th>
            <td>
                <?php $linktext = get_the_author_meta("nstab_setting_homepage_linktext", $user->ID); ?>
                <?php $linkurl = get_the_author_meta("nstab_setting_homepage_linkurl", $user->ID); ?>
                <input type="text" id="nstab_setting_homepage_linktext" name="nstab_setting_homepage_linktext" class="regular-text" placeholder="<?php echo __("Link Text (e.g. Homepage or About Me)", "author-box-by-nocksoft"); ?>" value="<?php echo $linktext; ?>" />
                <input type="text" id="nstab_setting_homepage_linkurl" name="nstab_setting_homepage_linkurl" class="regular-text" placeholder="<?php echo __("Link URL (e.g. https://yoursite.com)", "author-box-by-nocksoft"); ?>" value="<?php echo $linkurl; ?>" />
                <p class="description"><?php echo __("This URL will be displayed below your biography in the Author Box.", "author-box-by-nocksoft"); ?></p>
            </td>
        </tr>
    </table>
    <?php
}


/* Save user settings */
add_action("personal_options_update", "nstab_save_usersettings");
add_action("edit_user_profile_update", "nstab_save_usersettings");
function nstab_save_usersettings($user_id) {
    if (!current_user_can("edit_user", $user_id)) {
        return false;
    }
    else {
		$nstab_setting_localavatar = isset($_POST["nstab_setting_localavatar"]) ? $_POST["nstab_setting_localavatar"] : false;
        update_usermeta($user_id, "nstab_setting_localavatar", $nstab_setting_localavatar);
        update_usermeta($user_id, "nstab_setting_avatarurl", trim($_POST["nstab_setting_avatarurl"]));
        update_usermeta($user_id, "nstab_setting_authorposition", trim($_POST["nstab_setting_authorposition"]));
        update_usermeta($user_id, "nstab_setting_homepage_linktext", trim($_POST["nstab_setting_homepage_linktext"]));
        update_usermeta($user_id, "nstab_setting_homepage_linkurl", trim($_POST["nstab_setting_homepage_linkurl"]));
    }
}

?>