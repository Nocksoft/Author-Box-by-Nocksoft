<?php

function nstab_activate_plugin() {
    /* Default settings */
    add_option("nstab_setting_avatarsize", "100");
}

function nstab_uninstall_plugin() {
    /* Clear global settings */
    delete_option("nstab_setting_avatarsize");

    /* Clear user settings */
    $users = get_users();
    foreach ($users as $user) {
        $id = $user->ID;
        delete_user_meta($id, "nstab_setting_localavatar");
        delete_user_meta($id, "nstab_setting_avatarurl");
    }
}

?>