<?php

/**
 * @package WP_Version
 * @version 1.0.0
 */
/*
Plugin Name: WP_Version
Plugin URI: http://localhost/wordpress
Description: Affiche la version de Wordpress
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function add_version()
{
    global $wp_version;

    echo 'Version de wordpress : ' . $wp_version;
}

add_action('admin_notices', 'add_version');
