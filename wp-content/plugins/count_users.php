<?php
/*
Plugin Name: Count Users
Plugin URI: http://localhost/wordpress/plugins/
Description: Compte le nombre d'utilisateurs
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function callback_count_users($content)
{
    global $wpdb;

    $count_users = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users");

    echo "<p>Le nombre d'utilisateurs WordPress est de " . $count_users . "</p>";
}

add_action('admin_notices', 'callback_count_users');


function list_articles()
{
    echo '<ul>';
    while (have_posts()) {
        the_post();
        // On rajoute le type de post en premier
        echo '<li>' . get_post_type() . ' - ' . get_the_title() . ' par ' . get_the_author() . '</li>';
    }
    echo '</ul>';
}

add_action('wp_footer', 'list_articles');