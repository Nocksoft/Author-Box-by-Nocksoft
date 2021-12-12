<?php

function nstab_activate_plugin() {
    /* Setup default global settings */
	require plugin_dir_path(__FILE__) . "settings-defaults.php";
	
	add_option("nstab_setting_displayauthorboxonposts", $nstab_setting_default_displayauthorboxonposts);
    add_option("nstab_setting_displayauthorboxonpages", $nstab_setting_default_displayauthorboxonpages);
    add_option("nstab_setting_hidewordpressauthorbox", $nstab_setting_default_hidewordpressauthorbox);
	
	add_option("nstab_setting_font", $nstab_setting_default_font);
	add_option("nstab_setting_showshadow", $nstab_setting_default_showshadow);
    add_option("nstab_setting_showborder", $nstab_setting_default_showborder);
    add_option("nstab_setting_avatarsize", $nstab_setting_default_avatarsize);
    add_option("nstab_setting_circleavatar", $nstab_setting_default_circleavatar);
    add_option("nstab_setting_headline", $nstab_setting_default_headline);
    add_option("nstab_setting_fontsizeheadline", $nstab_setting_default_fontsizeheadline);
    add_option("nstab_setting_fontsizeposition", $nstab_setting_default_fontsizeposition);
    add_option("nstab_setting_fontsizebio", $nstab_setting_default_fontsizebio);
    add_option("nstab_setting_fontsizelinks", $nstab_setting_default_fontsizelinks);
    add_option("nstab_setting_displayauthorsarchive", $nstab_setting_default_displayauthorsarchive);
}

function nstab_uninstall_plugin() {
    /* Clear global settings */
	delete_option("nstab_setting_displayauthorboxonposts");
    delete_option("nstab_setting_displayauthorboxonpages");
    delete_option("nstab_setting_hidewordpressauthorbox");
	
	delete_option("nstab_setting_font");
	delete_option("nstab_setting_showshadow");
    delete_option("nstab_setting_showborder");
    delete_option("nstab_setting_avatarsize");
    delete_option("nstab_setting_circleavatar");
    delete_option("nstab_setting_headline");
    delete_option("nstab_setting_fontsizeheadline");
    delete_option("nstab_setting_fontsizeposition");
    delete_option("nstab_setting_fontsizebio");
    delete_option("nstab_setting_fontsizelinks");
    delete_option("nstab_setting_displayauthorsarchive");

    /* Clear user settings */
    $users = get_users();
    foreach ($users as $user) {
        $id = $user->ID;
        delete_user_meta($id, "nstab_setting_localavatar");
        delete_user_meta($id, "nstab_setting_avatarurl");
        delete_user_meta($id, "nstab_setting_authorposition");
        delete_user_meta($id, "nstab_setting_homepage_linktext");
        delete_user_meta($id, "nstab_setting_homepage_linkurl");
    }
}

?>