<?php
/*
Plugin Name: Voir les articles dans le footer
Plugin URI: http://localhost/wordpress/plugins/
Description: Compte le nombre d'utilisateurs
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/


function author_count()
{
    $authors = [];
    while (have_posts()) {
        the_post();
        if (get_post_type() === 'post') {
            $currentAuthorName = get_the_author();
            if (!isset($authors[$currentAuthorName])) {
                $authors[$currentAuthorName] = 0;
            }
            $authors[$currentAuthorName]++;
        }
    }
    echo '<ul>';
    foreach ($authors as $name => $count) {
        echo '<li>' . $name . ' a écrit ' . $count . ' articles';
    }
    echo '</ul>';
}

add_action('wp_footer', 'author_count');
