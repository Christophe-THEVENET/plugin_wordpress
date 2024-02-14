<?php
/*
Plugin Name: Display Admin User Welcome
Plugin URI: http://localhost/wordpress/plugins/
Description: Affiche un message de bienvenue avec le nom et le mail de l'utilisateur connecté dans les notifications de l'administration WordPress
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

// Définition de l'action et de ses fonctionnalités
function display_user_welcome()
{
    do_action('display_user_welcome');
}

// Déclaration de l'action personnalisée.
add_action('display_user_welcome', 'callback_display_user_welcome');

function callback_display_user_welcome()
{
    $current_user = wp_get_current_user();
    echo '<p>Bienvenue ' . $current_user->display_name . '! Votre adresse email est : ' . $current_user->user_email . '.</p>';
}

// Déclaration de l'action WordPress
add_action('admin_notices', 'callback_admin_notices');

// Fonction callback
function callback_admin_notices()
{
    display_user_welcome();
}
