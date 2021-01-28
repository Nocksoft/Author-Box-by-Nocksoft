<?php

function nstab_settings_page() {
    add_submenu_page(
        "options-general.php",
        "Author Box by Nocksoft",
        "Author Box",
        "manage_options",
        "nstab",
        "nstab_globalsettings"
    );
}
add_action("admin_menu", "nstab_settings_page");


add_action("admin_init", function() {
    register_setting("nstab_settings", "nstab_setting_showborder");
    register_setting("nstab_settings", "nstab_setting_avatarsize");
    register_setting("nstab_settings", "nstab_setting_circleavatar");
    register_setting("nstab_settings", "nstab_setting_headline");
    register_setting("nstab_settings", "nstab_setting_fontsizeheadline");
    register_setting("nstab_settings", "nstab_setting_fontsizeposition");
    register_setting("nstab_settings", "nstab_setting_fontsizebio");
    register_setting("nstab_settings", "nstab_setting_fontsizelinks");
    register_setting("nstab_settings", "nstab_setting_displayauthorsarchive");
    register_setting("nstab_settings", "nstab_setting_displayauthorboxonposts");
    register_setting("nstab_settings", "nstab_setting_displayauthorboxonpages");
    register_setting("nstab_settings", "nstab_setting_hidewordpressauthorbox");
});



function nstab_globalsettings() {
    if (!current_user_can("manage_options")) return;

    require plugin_dir_path(__FILE__) . "settings-defaults.php";
    ?>
    <div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields("nstab_settings");
            do_settings_sections("nstab");
            ?>

            <p><?php echo __("User-specific settings are made in your author profile in WordPress (Users -> Your Profile). General settings can be made here.", "author-box-by-nocksoft"); ?></p>

            <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php echo __("Show Border of Author Box", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_showborder" <?php if (get_option("nstab_setting_showborder", true) == true) echo "checked"; ?> /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Size of Avatar (Pixel)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_avatarsize" min="96" max="200" value="<?php echo esc_attr(get_option("nstab_setting_avatarsize")); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Use a circle avatar instead of a square", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_circleavatar" <?php if (get_option("nstab_setting_circleavatar") == true) echo "checked"; ?> /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Headline", "author-box-by-nocksoft"); ?></th>
                <td><input type="text" name="nstab_setting_headline" placeholder="<?php echo __("e.g. A Post by", "author-box-by-nocksoft"); ?>" value="<?php echo get_option("nstab_setting_headline"); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Fontsize of Headline (em)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_fontsizeheadline" min="0.5" max="2" step="0.1" value="<?php echo $fontsizeheadline; ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Fontsize of author's Position (em)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_fontsizeposition" min="0.4" max="0.9" step="0.1" value="<?php echo $fontsizeposition; ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Fontsize of Biography (em)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_fontsizebio" min="0.4" max="1.5" step="0.1" value="<?php echo $fontsizebio; ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Fontsize of Links (em)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_fontsizelinks" min="0.3" max="1" step="0.1" value="<?php echo $fontsizelinks; ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Display a link to the author's archive", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_displayauthorsarchive" <?php if (get_option("nstab_setting_displayauthorsarchive") == true) echo "checked"; ?> /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Display Author Box at the end of each post automatically", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_displayauthorboxonposts" <?php if (get_option("nstab_setting_displayauthorboxonposts", true) == true) echo "checked"; ?> /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Display Author Box at the end of each page automatically (not on front page, blog homepage and privacy policy)", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_displayauthorboxonpages" <?php if (get_option("nstab_setting_displayauthorboxonpages") == true) echo "checked"; ?> /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Hide the author box of default WordPress theme (tested from Twenty Nineteen up to Twenty Twenty-One)", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_hidewordpressauthorbox" <?php if (get_option("nstab_setting_hidewordpressauthorbox") == true) echo "checked"; ?> /></td>
                </tr>
            </table>


            <?php submit_button(__("Save Settings", "author-box-by-nocksoft")); ?>
        </form>
    </div>
    <?php
}

?>