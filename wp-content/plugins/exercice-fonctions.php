<?php
/*
Plugin Name: Exercice Fonctions WordPress
Plugin URI: http://localhost/wordpress/plugins/
Description: Exercice d'application sur les fonctions WordPress.
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

add_action('admin_menu', 'mon_menu_admin');

function mon_menu_admin()
{
    add_menu_page('Exercice Fonctions WordPress', 'Mon extension', 'administrator', 'exercice_fonctions/ma-page-admin.php', 'ma_page_admin', 'dashicons-admin-customizer', 2);
}

function ma_page_admin()
{
    echo '<h1>Bienvenue sur la page d\'administration de mon extension !</h1>';
}

function ma_fonction_bonjour()
{
    return "<h1>Bonjour et bienvenue dans mon site WordPress !</h1>";
}
add_shortcode('bonjour', 'ma_fonction_bonjour');
