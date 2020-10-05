<?php

/* --- Default settings and fallbacks. Only needed, when setting was added after initial release. --- */

/* Header Size */
if (esc_attr(get_option("nstab_setting_fontsizeheader")) != false) $fontsizeheader = esc_attr(get_option("nstab_setting_fontsizeheader"));
else $fontsizeheader = "1.1";

/* Bio Size */
if (esc_attr(get_option("nstab_setting_fontsizebio")) != false) $fontsizebio = esc_attr(get_option("nstab_setting_fontsizebio"));
else $fontsizebio = "0.9";

/* Links Size */
if (esc_attr(get_option("nstab_setting_fontsizelinks")) != false) $fontsizelinks = esc_attr(get_option("nstab_setting_fontsizelinks"));
else $fontsizelinks = "0.8";

?>