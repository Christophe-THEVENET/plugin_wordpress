<?php
/*
Plugin Name: Filter spam comment
Plugin URI: http://localhost/wordpress/plugins/
Description: Filtrer les commentaires de bot.
Author: Christophe THEVENET
Version: 1.0.0
Author URI: https://christophethevenet.fr
*/

function filter_spam_comments($comments)
{
    $filteredComments = [];
    /** @var WP_Comment $comment */
    foreach ($comments as $comment) {
        if (substr($comment->comment_content, 0, 2) !== '**' && substr($comment->comment_content, 0, -2) !== '**') {
            $filteredComments[] = $comment;
        }
    }
    return $filteredComments;
}
add_filter('comments_array', 'filter_spam_comments');

