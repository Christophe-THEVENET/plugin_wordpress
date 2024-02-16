<?php
/*
Plugin Name: Afficher des infos de l'utilisateur dans l'admin notice
Plugin URI: http://localhost/wordpress/plugins/
Description: Afficher des infos de l'utilisateur dans l'admin notice
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/
setlocale(LC_TIME, 'fr_FR.utf8');


/**
 * affiche le nom de l'utilisateur dans le back-office.
 *
 * Si le user est admin alors ce sera affiché.
 *
 * @since 3.0.0
 *
 * @param type  Optional. $var Description.
 * @param array $args {
 *     Short description about this hash.
 *
 *     @type type $var Description.
 *     @type type $var Description.
 * }
 * @param type  $var Description.
 * 
 * @return string retourne un message de l'utilisateur connecté dans le back-office
 */
function callback_super_admin_notices()
{
    $current_user = wp_get_current_user();
    $message = '';
    $message .= "<br />Bonjour <strong>" . strtoupper($current_user->display_name) . "</strong><br />";
    if (is_super_admin($current_user->ID)) {
        $message .= "Vous êtes administrateur du site<br />";
    }
    $lastpostdate = wp_date('j F Y à H:i', strtotime(get_lastpostdate()));
    $message .= "La dernière publication sur ce site date du " . $lastpostdate . "<br />";
    echo $message;
}
add_action('admin_notices', 'callback_super_admin_notices');
