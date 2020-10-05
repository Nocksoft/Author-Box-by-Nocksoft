<?php

function nstab_activate_plugin() {
    /* Default settings */
    add_option("nstab_setting_avatarsize", "100");
    add_option("nstab_setting_circleavatar", "");
    add_option("nstab_setting_headline", __("A Post by", "author-box-by-nocksoft"));
    add_option("nstab_setting_fontsizeheader", "1.1");
    add_option("nstab_setting_fontsizebio", "0.9");
    add_option("nstab_setting_fontsizelinks", "0.8");
    add_option("nstab_setting_dontdisplayauthorbox", "");
    add_option("nstab_setting_hidewordpressauthorbox", "");
}

function nstab_uninstall_plugin() {
    /* Clear global settings */
    delete_option("nstab_setting_avatarsize");
    delete_option("nstab_setting_circleavatar");
    delete_option("nstab_setting_headline");
    delete_option("nstab_setting_fontsizeheader");
    delete_option("nstab_setting_fontsizebio");
    delete_option("nstab_setting_fontsizelinks");
    delete_option("nstab_setting_dontdisplayauthorbox");
    delete_option("nstab_setting_hidewordpressauthorbox");

    /* Clear user settings */
    $users = get_users();
    foreach ($users as $user) {
        $id = $user->ID;
        delete_user_meta($id, "nstab_setting_localavatar");
        delete_user_meta($id, "nstab_setting_avatarurl");
        delete_user_meta($id, "nstab_setting_homepage_linktext");
        delete_user_meta($id, "nstab_setting_homepage_linkurl");
    }
}

?>