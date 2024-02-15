<?php
/*
Plugin Name: Stopper tous les filtres
Plugin URI: http://localhost/wordpress/plugins/
Description: Suppression de tous les filtres sur le contenu et le titre des articles
Author: Chritophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function removeAll()
{
    remove_all_filters('the_title');
    remove_all_filters('the_content');
}
add_action('wp_loaded', 'removeAll');
