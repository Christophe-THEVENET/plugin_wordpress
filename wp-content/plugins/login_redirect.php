<?php
/*
Plugin Name: Redirection près authentification
Plugin URI: http://localhost/wordpress/plugins/
Description: Redirection après authentification
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function callback_login_redirect($url, $request, $user)
{// verif user valide donc connecté
    if ($user && is_object($user) && is_a($user, 'WP_User')) {
        //verif role user
        if ($user->has_cap('administrator')) {
            $url = admin_url();
        } else {
            $url = home_url();
        }
    }
    return $url;
}

add_filter('login_redirect', 'callback_login_redirect', 10, 3);
