<?php
/*
Plugin Name: Ajout admin au display name des admin
Plugin URI: http://localhost/wordpress/plugins/
Description: ajout admin au display name des admin
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/
function check_admin()
{
    $user = wp_get_current_user();
    (is_super_admin($user->ID) && substr($user->display_name, 0, 5) !== 'admin') ? ($user->display_name = 'admin' . $user->display_name) : (wp_update_user($user));
}
add_action('init', 'check_admin');
