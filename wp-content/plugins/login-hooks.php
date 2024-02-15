<?php
/*
Plugin Name: Login Hooks
Plugin URI: http://localhost/wordpress/plugins/
Description: Affiche un message de bienvenue dans la page d'authentification et une invite de saisie des informations d'authentification.
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function callback_login_message()
{
    return "<h1>Bienvenue sur ce site ! Veuillez vous connecter.</h1>";
}
add_filter('login_message', 'callback_login_message');



function login_extra_note()
{
    echo '<p>Veuillez saisir votre nom d\'utilisateur et votre mot de passe.</p>';
}
add_action('login_form', 'login_extra_note');

