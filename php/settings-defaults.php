<?php

/* --- Default settings and fallbacks. Only needed, when setting was added after initial release. --- */

/* Header Size */
if (esc_attr(get_option('nstab_setting_fontsizeheader')) != false) $fontsizeheader = esc_attr(get_option('nstab_setting_fontsizeheader'));
else $fontsizeheader = "1.1";

?>