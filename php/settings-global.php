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
	register_setting("nstab_settings", "nstab_setting_avatarsize");
    register_setting("nstab_settings", "nstab_setting_fontsizeheader");
    register_setting("nstab_settings", "nstab_setting_dontdisplayauthorbox");
    register_setting("nstab_settings", "nstab_setting_circleavatar");
});



function nstab_globalsettings() {
    if (!current_user_can("manage_options")) return;

    require_once plugin_dir_path(__FILE__) . 'settings-defaults.php';
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
                <th scope="row"><?php echo __("Size of Avatar (Pixel)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_avatarsize" min="96" max="200" value="<?php echo esc_attr(get_option("nstab_setting_avatarsize")); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Fontsize of Header (em)", "author-box-by-nocksoft"); ?></th>
                <td><input type="number" name="nstab_setting_fontsizeheader" min="0.3" max="3" step="0.1" value="<?php echo $fontsizeheader; ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Do not show Author Box (useful if an Author Biography is displayed by a theme or another plugin)", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_dontdisplayauthorbox" <?php if (get_option("nstab_setting_dontdisplayauthorbox") == true) echo "checked"; ?> /></td>
                </tr>

                <tr valign="top">
                <th scope="row"><?php echo __("Use a circle avatar instead of a square", "author-box-by-nocksoft"); ?></th>
                <td><input type="checkbox" name="nstab_setting_circleavatar" <?php if (get_option("nstab_setting_circleavatar") == true) echo "checked"; ?> /></td>
                </tr>
            </table>


            <?php submit_button(__("Save Settings", "author-box-by-nocksoft")); ?>
        </form>
    </div>
    <?php
}

?>