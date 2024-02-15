<?php
/*
Plugin Name: Préfixe id a titre article
Plugin URI: http://localhost/wordpress/plugins/
Description: Ajoute l'identifiant de l'article à son titre
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function addIdToTitle($title, $id)
{
    return $id . ' - ' . $title;
}

add_filter('the_title', 'addIdToTitle', 10, 2);
