<?php

require plugin_dir_path(__FILE__) . "settings-defaults.php";

/* Global settings: general */
$nstab_setting_displayauthorboxonposts = get_option("nstab_setting_displayauthorboxonposts", $nstab_setting_default_displayauthorboxonposts);
$nstab_setting_displayauthorboxonpages = get_option("nstab_setting_displayauthorboxonpages", $nstab_setting_default_displayauthorboxonpages);
$nstab_setting_hidewordpressauthorbox = get_option("nstab_setting_hidewordpressauthorbox", $nstab_setting_default_hidewordpressauthorbox);

/* Global settings: layout */
$nstab_setting_font = get_option("nstab_setting_font", $nstab_setting_default_font);
$nstab_setting_showshadow = get_option("nstab_setting_showshadow", $nstab_setting_default_showshadow);
$nstab_setting_showborder = get_option("nstab_setting_showborder", $nstab_setting_default_showborder);
$nstab_setting_avatarsize = get_option("nstab_setting_avatarsize", $nstab_setting_default_avatarsize);
$nstab_setting_circleavatar = get_option("nstab_setting_circleavatar", $nstab_setting_default_circleavatar);
$nstab_setting_headline = get_option("nstab_setting_headline", $nstab_setting_default_headline);
$nstab_setting_fontsizeheadline = get_option("nstab_setting_fontsizeheadline", $nstab_setting_default_fontsizeheadline);
$nstab_setting_fontsizeposition = get_option("nstab_setting_fontsizeposition", $nstab_setting_default_fontsizeposition);
$nstab_setting_fontsizebio = get_option("nstab_setting_fontsizebio", $nstab_setting_default_fontsizebio);
$nstab_setting_fontsizelinks = get_option("nstab_setting_fontsizelinks", $nstab_setting_default_fontsizelinks);
$nstab_setting_displayauthorsarchive = get_option("nstab_setting_displayauthorsarchive", $nstab_setting_default_displayauthorsarchive);

?>