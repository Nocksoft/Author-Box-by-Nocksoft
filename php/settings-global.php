<?php

add_action("admin_menu", "nstab_settings_page");
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


add_action("admin_init", function() {
	register_setting("nstab_settings_general", "nstab_setting_displayauthorboxonposts");
    register_setting("nstab_settings_general", "nstab_setting_displayauthorboxonpages");
    register_setting("nstab_settings_general", "nstab_setting_hidewordpressauthorbox");
	
	register_setting("nstab_settings_layout", "nstab_setting_font");
	register_setting("nstab_settings_layout", "nstab_setting_showshadow");
    register_setting("nstab_settings_layout", "nstab_setting_showborder");
	register_setting("nstab_settings_layout", "nstab_setting_bordercolor");
	register_setting("nstab_settings_layout", "nstab_setting_bordersize");
    register_setting("nstab_settings_layout", "nstab_setting_avatarsize");
    register_setting("nstab_settings_layout", "nstab_setting_circleavatar");
    register_setting("nstab_settings_layout", "nstab_setting_headline");
    register_setting("nstab_settings_layout", "nstab_setting_fontsizeheadline");
    register_setting("nstab_settings_layout", "nstab_setting_fontsizeposition");
    register_setting("nstab_settings_layout", "nstab_setting_fontsizebio");
    register_setting("nstab_settings_layout", "nstab_setting_fontsizelinks");
    register_setting("nstab_settings_layout", "nstab_setting_displayauthorsarchive");
});



function nstab_globalsettings() {
    if (!current_user_can("manage_options")) return;

	global $nstab_setting_displayauthorboxonposts;
	global $nstab_setting_displayauthorboxonpages;
	global $nstab_setting_hidewordpressauthorbox;

	global $nstab_setting_font;
	global $nstab_setting_showshadow;
	global $nstab_setting_showborder;
	global $nstab_setting_default_bordercolor;
	global $nstab_setting_bordercolor;
	global $nstab_setting_bordersize;
	global $nstab_setting_avatarsize;
	global $nstab_setting_circleavatar;
	global $nstab_setting_headline;
	global $nstab_setting_fontsizeheadline;
	global $nstab_setting_fontsizeposition;
	global $nstab_setting_fontsizebio;
	global $nstab_setting_fontsizelinks;
	global $nstab_setting_displayauthorsarchive;
	
	$tab = isset($_GET["tab"]) ? $_GET["tab"] : null;
    ?>
    <div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
		
		<p><?php echo __("User-specific settings are made in your user profile in WordPress (Users -> Your Profile -> Edit). General settings can be made here.", "author-box-by-nocksoft"); ?></p>
		
		<nav class="nav-tab-wrapper">
			<a href="?page=nstab" class="nav-tab<?php if ($tab == "general" || $tab == null) echo " nav-tab-active"; ?>"><?php echo __("General", "author-box-by-nocksoft"); ?></a>
			<a href="?page=nstab&tab=layout" class="nav-tab<?php if ($tab == "layout") echo " nav-tab-active"; ?>"><?php echo __("Layout", "author-box-by-nocksoft"); ?></a>
		</nav>
		
        <form action="options.php" method="post">
            <?php
			$option_group = null;
			if ($tab == "general" || $tab == null) $option_group = "nstab_settings_general";
			else if ($tab == "layout") $option_group = "nstab_settings_layout";
			else return;
            settings_fields($option_group);
            do_settings_sections("nstab");
            ?>

			<div class="tab-content">
				<?php
				if ($tab == "general" || $tab == null) {
					?>
					<table class="form-table">
						<tr valign="top">
						<th scope="row"><?php echo __("Author Box display options", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="checkbox" id="nstab_setting_displayauthorboxonposts" name="nstab_setting_displayauthorboxonposts" <?php if ($nstab_setting_displayauthorboxonposts == true) echo "checked"; ?> />
							<label for="nstab_setting_displayauthorboxonposts"><?php echo __("Display Author Box at the end of each post automatically", "author-box-by-nocksoft"); ?></label>
							<br>
							<input type="checkbox" id="nstab_setting_displayauthorboxonpages" name="nstab_setting_displayauthorboxonpages" <?php if ($nstab_setting_displayauthorboxonpages == true) echo "checked"; ?> />
							<label for="nstab_setting_displayauthorboxonpages"><?php echo __("Display Author Box at the end of each page automatically (not on front page, blog homepage and privacy policy)", "author-box-by-nocksoft"); ?></label>
						</td>
						</tr>

						<tr valign="top">
						<th scope="row"><?php echo __("Other options", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="checkbox" id="nstab_setting_hidewordpressauthorbox" name="nstab_setting_hidewordpressauthorbox" <?php if ($nstab_setting_hidewordpressauthorbox == true) echo "checked"; ?> />
							<label for="nstab_setting_hidewordpressauthorbox"><?php echo __("Hide the author box of default WordPress theme (tested from Twenty Nineteen up to Twenty Twenty-One)", "author-box-by-nocksoft"); ?></label>
							<p class="description"><?php echo __("If your theme offers you an option to hide the author box of your theme, you should use your theme's setting for this.", "author-box-by-nocksoft"); ?></p>
						</td>
						</tr>
					</table>
					<?php
				}
				else if ($tab == "layout") {
					?>
					<table class="form-table">
						<tr valign="top">
						<th scope="row"><?php echo __("Basic", "author-box-by-nocksoft"); ?></th>
						<td>
							<select id="nstab_setting_font" name="nstab_setting_font">
								<option value="arial" <?php if ($nstab_setting_font == "arial") echo "selected"; ?>><?php echo __("Arial", "author-box-by-nocksoft"); ?></option>
								<option value="inherit" <?php if ($nstab_setting_font == "inherit") echo "selected"; ?>><?php echo __("Inherit from website", "author-box-by-nocksoft"); ?></option>
							</select>
							<label for="nstab_setting_font"><?php echo __("Font of Author Box", "author-box-by-nocksoft"); ?></label>
							<p class="description"><?php echo __("Inherit from website means that the fonts of the WordPress theme are used.", "author-box-by-nocksoft"); ?></p>
							<p>
							<input type="checkbox" id="nstab_setting_showshadow" name="nstab_setting_showshadow" <?php if ($nstab_setting_showshadow == true) echo "checked"; ?> />
							<label for="nstab_setting_showshadow"><?php echo __("Show Shadow of Author Box", "author-box-by-nocksoft"); ?></label>
							</p>
						</td>
						</tr>
						
						<tr valign="top">
						<th scope="row"><?php echo __("Border", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="checkbox" id="nstab_setting_showborder" name="nstab_setting_showborder" <?php if ($nstab_setting_showborder == true) echo "checked"; ?> />
							<label for="nstab_setting_showborder"><?php echo __("Show Border of Author Box", "author-box-by-nocksoft"); ?></label>
							<p>
							<input type="text" id="nstab_setting_bordercolor" name="nstab_setting_bordercolor" class="nstab_colorpicker" value="<?php echo $nstab_setting_bordercolor; ?>" data-default-color="<?php echo $nstab_setting_default_bordercolor; ?>" />
							<label for="nstab_setting_bordercolor"><?php echo __("Color of border", "author-box-by-nocksoft"); ?></label>
							</p>
							<input type="number" id="nstab_setting_bordersize" name="nstab_setting_bordersize" min="1" max="5" step="1" value="<?php echo $nstab_setting_bordersize; ?>" />
							<label for="nstab_setting_bordersize"><?php echo __("Size of border", "author-box-by-nocksoft"); ?></label>
						</td>
						</tr>

						<tr valign="top">
						<th scope="row"><?php echo __("Avatar", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="number" id="nstab_setting_avatarsize" name="nstab_setting_avatarsize" min="96" max="200" value="<?php echo $nstab_setting_avatarsize; ?>" />
							<label for="nstab_setting_avatarsize"><?php echo __("Size of Avatar (Pixel)", "author-box-by-nocksoft"); ?></label>
							<p>
							<input type="checkbox" id="nstab_setting_circleavatar" name="nstab_setting_circleavatar" <?php if ($nstab_setting_circleavatar == true) echo "checked"; ?> />
							<label for="nstab_setting_circleavatar"><?php echo __("Use a circle avatar instead of a square", "author-box-by-nocksoft"); ?></label>
							</p>
						</td>
						</tr>

						<tr valign="top">
						<th scope="row"><?php echo __("Header", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="text" id="nstab_setting_headline" name="nstab_setting_headline" placeholder="<?php echo __("e.g. A Post by", "author-box-by-nocksoft"); ?>" value="<?php echo $nstab_setting_headline; ?>" />
							<label for="nstab_setting_headline"><?php echo __("Headline", "author-box-by-nocksoft"); ?></label>
							<p>
							<input type="number" id="nstab_setting_fontsizeheadline" name="nstab_setting_fontsizeheadline" min="0.5" max="2" step="0.1" value="<?php echo $nstab_setting_fontsizeheadline; ?>" />
							<label for="nstab_setting_fontsizeheadline"><?php echo __("Fontsize of Headline (em)", "author-box-by-nocksoft"); ?></label>
							</p>
							<p>
							<input type="number" id="nstab_setting_fontsizeposition" name="nstab_setting_fontsizeposition" min="0.4" max="0.9" step="0.1" value="<?php echo $nstab_setting_fontsizeposition; ?>" />
							<label for="nstab_setting_fontsizeposition"><?php echo __("Fontsize of author's Position (em)", "author-box-by-nocksoft"); ?></label>
							</p>
						</td>
						</tr>

						<tr valign="top">
						<th scope="row"><?php echo __("Biography", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="number" id="nstab_setting_fontsizebio" name="nstab_setting_fontsizebio" min="0.4" max="1.5" step="0.1" value="<?php echo $nstab_setting_fontsizebio; ?>" />
							<label for="nstab_setting_fontsizebio"><?php echo __("Fontsize of Biography (em)", "author-box-by-nocksoft"); ?></label>
						</td>
						</tr>

						<tr valign="top">
						<th scope="row"><?php echo __("Footer", "author-box-by-nocksoft"); ?></th>
						<td>
							<input type="number" id="nstab_setting_fontsizelinks" name="nstab_setting_fontsizelinks" min="0.3" max="1" step="0.1" value="<?php echo $nstab_setting_fontsizelinks; ?>" />
							<label for="nstab_setting_fontsizelinks"><?php echo __("Fontsize of Links (em)", "author-box-by-nocksoft"); ?></label>
							<p>
							<input type="checkbox" id="nstab_setting_displayauthorsarchive" name="nstab_setting_displayauthorsarchive" <?php if ($nstab_setting_displayauthorsarchive == true) echo "checked"; ?> />
							<label for="nstab_setting_displayauthorsarchive"><?php echo __("Display a link to the author's archive", "author-box-by-nocksoft"); ?></label>
							</p>
						</td>
						</tr>
					</table>
					<?php
				}
			?>
			</div>


            <?php submit_button(__("Save Settings", "author-box-by-nocksoft")); ?>
        </form>
    </div>
    <?php
}

?>