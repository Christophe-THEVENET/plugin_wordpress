<?php
/*
Plugin Name: Admin PhpInfo
Plugin URI: http://localhost/wordpress/plugins/
Description: Affiche les informations PHP dans l'administration WordPress.
Author: John Doe
Version: 1.0.0
Author URI: http://localhost/wordpress/
*/

add_action('admin_menu', 'callback_admin_phpinfo');

function callback_admin_phpinfo()
{
    add_submenu_page('tools.php', 'Informations PHP', 'PhpInfo', 'administrator', 'admin-phpinfo-page.php', 'admin_phpinfo_page', 99);
}

function admin_phpinfo_page()
{
    // Affichage de phpinfo en désactivant le style
    ob_start();
    phpinfo();
    $pinfo = ob_get_contents();
    ob_end_clean();

    $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
    echo $pinfo;
}
