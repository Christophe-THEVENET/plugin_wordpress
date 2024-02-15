<?php
/*
Plugin Name: Recettes de cuisine
Plugin URI: http://localhost/wordpress/plugins/
Description: Ajout d'un nouveau type de contenus pour publier des recettes de cuisine 
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

// Fonction callback
function create_posttype_cuisine()
{

    register_post_type(
        'cuisine',
        // Options
        array(
            'labels' => array(
                'name' => __('Recettes de cuisine'),
                'singular_name' => __('Recette de cuisine')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'cuisine'),
            'add_new' => __('Ajouter une recette'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-food',
            'menu_position' => 2,
        )
    );
}

// ajout Hook WordPress
add_action('init', 'create_posttype_cuisine');
