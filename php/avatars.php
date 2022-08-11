<?php

/* Returns the avatar URL for local avatar, if exists. */
function nstab_get_local_avatarurl($user_id) {
	if (!get_user_meta($user_id, "nstab_setting_localavatar", true)) return null;
	
	$url = get_user_meta($user_id, "nstab_setting_avatarurl", true);
	return $url;
}


/**
 * Overrides the avatar data.
 * https://developer.wordpress.org/reference/functions/get_avatar_data/
 * https://developer.wordpress.org/reference/hooks/get_avatar_data/
 */
add_filter("get_avatar_data", "nstab_get_avatar_data", 10, 2);
function nstab_get_avatar_data($args, $id_or_email) {
	if (!empty($args["force_default"])) {
		return $args;
	}
	
	$url = nstab_get_local_avatarurl(nstab_get_user_id($id_or_email));
	if (!empty($url)) $args["url"] = $url;
	
	return $args;
}


function nstab_get_user_id($id_or_email) {
	$user_id = null;
	
	if (is_numeric($id_or_email)) {
		$user_id = (int)$id_or_email;
	}
	else if (is_string($id_or_email) && ($user = get_user_by("email", $id_or_email))) {
		$user_id = $user->ID;
	}
	else if (is_object($id_or_email) && !empty($id_or_email->user_id)) {
		$user_id = (int)$id_or_email->user_id;
	}

	return $user_id;
}

?>