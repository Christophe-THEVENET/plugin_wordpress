<?php



/* ************** START - ADMIN CSS ************* */
//  fonction qui lie le css personnalisé pour le back-office et la page login
function my_admin_theme_styles()
{
    wp_enqueue_style('my-admin-theme', plugins_url('reseaux-sociaux.css', __FILE__));
};

add_action('admin_enqueue_scripts', 'my_admin_theme_styles', 999);
add_action('login_enqueue_scripts', 'my_admin_theme_styles', 999);
/* ************** END - ADMIN CSS **************** */

/* ************** START - ADMIN SIDEBAR ************** */
// ajout du menu plugin Réseaux sociaux  dans la sidebar du back-office
function social_media_sidebar()
{
    // arguments: titre page, texte dans le menu, capability, slug du menu, callback = fonction qui affiche la page, icon, position
    add_menu_page('My first page', 'Réseaux sociaux', 'manage_options', 'social-media', 'social_media_page', 'dashicons-share', 3);
}

add_action('admin_menu', 'social_media_sidebar');
/* ************** END - ADMIN SIDEBAR ************** */

/* ************** START - ADMIN TOPBAR ************** */
// ajout du menu plugin Réseaux sociaux dans la topbar du back-office avec la classe WP_Admin_Bar et son objet $wp_admin_bar
function social_media_topbar($wp_admin_bar)
{
    $admin_topbar =
        [
            'id' => 'reseaux-sociaux',
            'title' => 'Réseaux sociaux',
            'href' => admin_url('admin.php?page=social-media'),
        ];

    $wp_admin_bar->add_node($admin_topbar);
}
// hook pour ajouter le plugin dans la topbar
add_action('admin_bar_menu', 'social_media_topbar', 999);
/* ************** END - ADMIN TOPBAR ************** */

//****************************************************************************************************
//****************************************************************************************************
//***************************************** SECTION BACK-OFFICE**************************************************
//****************************************************************************************************
//****************************************************************************************************

/* **************  START - Création de la page ADMIN - FONCTION **************  */
function social_media_section_settings()
{
    // Création d'une section
    add_settings_section("social_media_section", "", null, "social-media");

    // Création de champs
    add_settings_field("social-media-facebook", "Partager sur Facebook", "social_media_facebook_switch", "social-media", "social_media_section");
    add_settings_field("social-media-whatsapp", "Partager sur What's app", "social_media_whatsapp_switch", "social-media", "social_media_section");
    add_settings_field("social-media-linkedin", "Partager sur Linkedin", "social_media_linkedin_switch", "social-media", "social_media_section");
    add_settings_field("social-media-twitter", "Partager sur Twitter", "social_media_twitter_switch", "social-media", "social_media_section");

    // Enregistrement des champs
    register_setting("social_media_section", "social-media-facebook");
    register_setting("social_media_section", "social-media-whatsapp");
    register_setting("social_media_section", "social-media-linkedin");
    register_setting("social_media_section", "social-media-twitter");
}
/* **************  END - Création de la page ADMIN  FONCTION ************** */

/* **************  START - Création de la page ADMIN - HTML ************** */
function social_media_facebook_switch()
{ ?>
    <label class="switch">
        <!-- checked vérifie si la value est égale a activate pour afficher checked s en attribut sinon il affiche rien -->
        <input type="checkbox" name="social-media-facebook" value="activate" <?php checked('activate', get_option('social-media-facebook'), true); ?>>
        <span class="slider round"></span>
    </label>
<?php }
function social_media_whatsapp_switch()
{ ?>
    <label class="switch">
        <input type="checkbox" name="social-media-whatsapp" value="activate" <?php checked('activate', get_option('social-media-whatsapp'), true); ?>>
        <span class="slider round"></span>
    </label>
<?php }

function social_media_linkedin_switch()
{ ?>
    <label class="switch">
        <input type="checkbox" name="social-media-linkedin" value="activate" <?php checked('activate', get_option('social-media-linkedin'), true); ?>>
        <span class="slider round"></span>
    </label>
<?php }

function social_media_twitter_switch()
{ ?>
    <label class="switch">
        <input type="checkbox" name="social-media-twitter" value="activate" <?php checked('activate', get_option('social-media-twitter'), true); ?>>
        <span class="slider round"></span>
    </label>
<?php }
/* **************  END - Création de la page ADMIN - HTML **************  */

add_action("admin_init", "social_media_section_settings");

/* ************** START - Création de la page ADMIN - FORMULAIRE HTML ************** */
function social_media_page()
{ ?>
    <div class="container">
        <h1>Réseaux sociaux</h1>
        <!-- option.php est un fichier natif de wp -->
        <form method="post" action="options.php">
            <?php
            settings_fields("social_media_section");
            do_settings_sections("social-media");
            submit_button();
            ?>
        </form>
    </div>
<?php }
/* **************  END - Création de la page ADMIN - FORMULAIRE HTML **************  */


//****************************************************************************************************
//****************************************************************************************************
//***************************************** SECTION FRONT-END **************************************************
//****************************************************************************************************
//****************************************************************************************************


/*  START - Création de la section réseaux sociaux - HTML  */
function social_media_icons_front($social_media_icons)
{
    // Création et récupérations des variables
    global $post;
    $link = get_permalink($post->ID);
    $link = esc_url($link);

    // Création de la structure HTML
    $html = "<div class='container row'><div class='h3'>Partager sur : </div>";
    // affiche les réseaux seulement si ils sont activés
    if (get_option("social-media-facebook") == 'activate') {
        $html = $html . "
        <div class='col-1' style=margin: 5px>
            <a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=" . $link . "'>
                <i class='fab fa-facebook-square fa-2x'></i>
            </a>
        </div>";
    }
    if (get_option("social-media-twitter") == 'activate') {
        $html = $html . "
        <div class='col-1'>
            <a target='_blank' href='https://twitter.com/share?url=" . $link . "'>
                <i class='fab fa-twitter-square fa-2x'></i>
            </a>
        </div>";
    }
    if (get_option("social-media-linkedin") == 'activate') {
        $html = $html . "
        <div class='col-1'>
            <a target='_blank' href='http://www.linkedin.com/shareArticle?url=" . $link . "'>
                <i class='fab fa-linkedin fa-2x'></i>
            </a>
        </div>";
    }
    if (get_option("social-media-whatsapp") == 'activate') {
        $html = $html . "
        <div class='col-1'>
            <a target='_blank' href='tel:123-456-7890'>
                <i class='fab fa-whatsapp-square fa-2x'></i>
            </a>
        </div>";
    }
    // 
    $social_media_icons = $social_media_icons . $html;
    return $social_media_icons;
}
add_filter("the_content", "social_media_icons_front");
/*  END - Création de la section réseaux sociaux - HTML  */


function add_fontawesome() {
    echo'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
}

add_action('wp_head', 'add_fontawesome');