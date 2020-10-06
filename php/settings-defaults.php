<?php

/* --- Default settings and fallbacks. Only needed, when setting was added after initial release. --- */

/* Headline Size */
if (esc_attr(get_option("nstab_setting_fontsizeheadline")) != false) $fontsizeheadline = esc_attr(get_option("nstab_setting_fontsizeheadline"));
else $fontsizeheadline = "1.1";

/* Position Size */
if (esc_attr(get_option("nstab_setting_fontsizeposition")) != false) $fontsizeposition = esc_attr(get_option("nstab_setting_fontsizeposition"));
else $fontsizeposition = "0.7";

/* Bio Size */
if (esc_attr(get_option("nstab_setting_fontsizebio")) != false) $fontsizebio = esc_attr(get_option("nstab_setting_fontsizebio"));
else $fontsizebio = "0.9";

/* Links Size */
if (esc_attr(get_option("nstab_setting_fontsizelinks")) != false) $fontsizelinks = esc_attr(get_option("nstab_setting_fontsizelinks"));
else $fontsizelinks = "0.8";

?>