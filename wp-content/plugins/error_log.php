<?php
/*
Plugin Name: Logger le résultat des test de jours ouvrables
Plugin URI: http://localhost/wordpress/plugins/
Description: Logger le résultat des test de jours ouvrables
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

/**
 * test si le jour en parametre est un jour ouvrable.
 *
 * test si le jour en parametre est un jour ouvrable.
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
 * @return string retourne un fichier de log avec les résultats du test dedans
 */
function is_jour_ouvrable($aujourdhui)
{
    $resultat = in_array($aujourdhui, ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi']);
    $message = $resultat ? 'est un jour ouvrable.' : 'n\'est pas un jour ouvrable.';
    error_log($aujourdhui . " " . $message . "\n", 3, "debug.log");
}
// appels de la fonction
is_jour_ouvrable('samedi');
is_jour_ouvrable('lundi');
is_jour_ouvrable('jeudi');
is_jour_ouvrable('dimanche');


// extentions pour débugger

// Debug bar     Query Monitor 