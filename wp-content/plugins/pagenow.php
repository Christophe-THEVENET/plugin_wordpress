<?php
/*
Plugin Name: Page courante
Plugin URI: http://localhost/wordpress/plugins/
Description: Affiche le nom de la page courante dans la zone de notification de l'administration
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function callback_current_page()
{
    global $pagenow;

    echo '<p>Vous êtes sur la page : ' . $pagenow . '</p>';
}

add_action('admin_notices', 'callback_current_page');
