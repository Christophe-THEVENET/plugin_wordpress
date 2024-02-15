<?php
/*
Plugin Name: Upper case titles & signature under post contents
Plugin URI: http://localhost/wordpress/plugins/
Description: Affiche les titres d'articles en majuscule et le nom de l'auteur sous le contenu des articles
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/


// Définition du filtre personnalisé
add_filter('filter_strtoupper', 'callback_filter_strtoupper');

// Fonction callback
function callback_filter_strtoupper($title)
{
    return strtoupper($title);
}

// Déclaration du filtre WordPress
add_filter('the_title', 'callback_title');


// Fonction callback
function callback_title($title)
{
    return apply_filters('filter_strtoupper', $title);
}

// Fonction callback
function callback_post_signature($content)
{
    global $post;
    $author_id = $post->post_author;
    $author = get_userdata($author_id);
    $name = '' . $author->display_name . '';
    return $content . '<p>Rédigé par ' . $name . '</p>';
}

// Déclaration du filtre WordPress
add_filter('the_content', 'callback_post_signature');
