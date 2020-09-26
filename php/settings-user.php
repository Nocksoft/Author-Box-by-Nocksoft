<?php


/* Show user settings */
add_action("show_user_profile", "nstab_usersettings");
add_action("edit_user_profile", "nstab_usersettings");

function nstab_usersettings($user) {
    ?>
    <h3>Author Box by Nocksoft</h3>

    <p><?php echo __("Here you can make further settings for your avatar. However, you will get the best results if your profile picture has the same width and height dimensions.", "author-box-by-nocksoft"); ?></p>

    <table class="form-table">
        <tr>
            <th><label for="nstab_setting_localavatar"><?php echo __("Local avatars", "author-box-by-nocksoft"); ?></label></th>
            <td>
                <input type="checkbox" id="nstab_setting_localavatar" name="nstab_setting_localavatar" <?php if (get_the_author_meta("nstab_setting_localavatar", $user->ID) == "on") echo "checked"; ?>>
                <label for="nstab_setting_localavatar"><?php echo __("Use local avatars instead of Gravatar", "author-box-by-nocksoft"); ?></label>
            </td>
        </tr>

        <tr>
            <th><label for="nstab_setting_avatarurl">Avatar (URL)</label></th>
            <td>
                <?php $avatarurl = get_the_author_meta("nstab_setting_avatarurl", $user->ID); ?>
                <input type="text" id="nstab_setting_avatarurl" name="nstab_setting_avatarurl" class="regular-text" value="<?php echo $avatarurl; ?>" />
                <span class="description"><?php echo __("Please enter a valid URL to your avatar.", "author-box-by-nocksoft"); ?></span>
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
        update_usermeta($user_id, "nstab_setting_localavatar", $_POST["nstab_setting_localavatar"]);
        update_usermeta($user_id, "nstab_setting_avatarurl", trim($_POST["nstab_setting_avatarurl"]));
    }
}

?>