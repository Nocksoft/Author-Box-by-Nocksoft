<?php

/* Returns the avatar URL */
function nstab_get_avatarurl() {
	if (get_the_author_meta("nstab_setting_localavatar") != "on") return get_avatar_url(get_user_meta("ID"));
    else return get_the_author_meta("nstab_setting_avatarurl");
}



/* Overrides the avatars */
/* https://codex.wordpress.org/Plugin_API/Filter_Reference/get_avatar */
add_filter("get_avatar", "nstab_get_avatar", 1 , 5);
function nstab_get_avatar($avatar, $id_or_email, $size, $default, $alt) {
    $user = false;

    if (is_numeric($id_or_email)) {
        $id = (int)$id_or_email;
        $user = get_user_by("id", $id);
    }
    elseif (is_object($id_or_email)) {
        if (!empty($id_or_email->user_id)) {
            $id = (int)$id_or_email->user_id;
            $user = get_user_by("id", $id);
        }
    }
    else {
        $user = get_user_by("email", $id_or_email);	
    }

    if ($user && is_object($user)
        && get_the_author_meta("nstab_setting_localavatar", $user->ID) == "on") {
            $avatar = get_the_author_meta("nstab_setting_avatarurl", $user->ID);
            $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
    }

    return $avatar;
}

/* Some themes like Blocksy may try to retrieve the avatar URL early */
/* https://developer.wordpress.org/reference/hooks/pre_get_avatar_data/ */
add_filter("pre_get_avatar_data", "nstab_pre_get_avatar_data", 10, 2);
function nstab_pre_get_avatar_data($args, $id_or_email) {
	$author_id = get_the_author_meta("ID");
	if ($id_or_email == $author_id) $args["url"] = nstab_get_avatarurl();
	
	return $args;
}

?>