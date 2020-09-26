<?php

function nstab_activate_plugin() {
    /* Default settings */
    add_option("nstab_setting_avatarsize", "100");
    add_option("nstab_setting_fontsizeheader", "1.1");
    add_option("nstab_setting_dontdisplayauthorbox", "");
    add_option("nstab_setting_circleavatar", "");
}

function nstab_uninstall_plugin() {
    /* Clear global settings */
    delete_option("nstab_setting_avatarsize");
    delete_option("nstab_setting_fontsizeheader");
    delete_option("nstab_setting_dontdisplayauthorbox");
    delete_option("nstab_setting_circleavatar");

    /* Clear user settings */
    $users = get_users();
    foreach ($users as $user) {
        $id = $user->ID;
        delete_user_meta($id, "nstab_setting_localavatar");
        delete_user_meta($id, "nstab_setting_avatarurl");
    }
}

?>