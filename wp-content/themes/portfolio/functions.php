<?php

// Charger les champs ACF exportés :
include_once('fields.php');

// Vérifier si la session est active ("started") ?
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

/**
 * Charge le domaine de traduction du thème.
 *
 * Cette fonction permet de charger les fichiers de traduction situés
 * dans le dossier `locales` du thème actif. Elle utilise la fonction
 * `load_theme_textdomain()` pour associer le domaine de traduction `hepl-trad`
 * aux fichiers de langue présents dans le répertoire spécifié.
 *
 * @return void
 */
function hepl_trad_load_textdomain(): void
{
  load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

// Exécute la fonction lors de l'initialisation du thème.
add_action('after_setup_theme', 'hepl_trad_load_textdomain');

function __hepl(string $translation, array $replacements = []): array|string|null
{
// 1. Récupérer la traduction de la phrase présente dans $translation
  $base = __($translation, 'hepl-trad');

// 2. Remplacer toutes les occurrences des variables par leur valeur
  foreach ($replacements as $key => $value) {
    $variable = ':' . $key;
    $base = str_replace($variable, $value, $base);
  }

// 3. Retourner la traduction complète.
  return $base;
}

/**
 * Récupère la valeur d'un champ ACF d'une page d'option pour la langue courante.
 *
 * Cette fonction utilise Advanced Custom Fields PRO (ACF) et Polylang
 * pour récupérer la valeur d'un champ d'option spécifique en fonction
 * de la langue active sur le site.
 *
 * @param string $field Le nom du champ ACF à récupérer.
 * @return mixed La valeur du champ, ou `false` si le champ n'existe pas.
 *
 *
 */
function get__option($field): mixed
{
  return get_field($field, pll_current_language('slug'));
}

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');

// Disable default front-end styles.
add_action('wp_enqueue_scripts', function () {
  // Remove CSS on the front end.
  wp_dequeue_style('wp-block-library');
  // Remove Gutenberg theme.
  wp_dequeue_style('wp-block-library-theme');
  // Remove inline global CSS on the front end.
  wp_dequeue_style('global-styles');
}, 20);

add_action('init', 'init_remove_support', 100);

function init_remove_support(): void
{
  remove_post_type_support('post', 'editor');
  remove_post_type_support('page', 'editor');
  remove_post_type_support('product', 'editor');
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');

function enqueue_assets_from_vite_manifest(): void
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Vérifier et ajouter le fichier JavaScript
        if (isset($manifest['wp-content/themes/dw/resources/js/main.js'])) {
            wp_enqueue_script('dw', get_theme_file_uri('public/' . $manifest['wp-content/themes/dw/resources/js/main.js']['file']), [], null, true);
        }

        // Vérifier et ajouter le fichier CSS
        if (isset($manifest['wp-content/themes/dw/resources/css/styles.scss'])) {
            wp_enqueue_style('dw', get_theme_file_uri('public/' . $manifest['wp-content/themes/dw/resources/css/styles.scss']['file']));
        }
    }
}
//enqueue_assets_from_vite_manifest();

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function dw_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/resources/css/styles.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/styles.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}
add_action('wp_enqueue_scripts', 'enqueue_assets_from_vite_manifest');


// Permet d'ajouter la possibilité d'uploader des extensions de fichiers non compatibles de base.
// Exemple : ici nous ajoutons le format SVG en tant que type d'image compatible pour l'upload.
function my_own_mime_types($mimes)
{
  // Ajout du mime type pour les fichiers SVG
  $mimes['svg'] = 'image/svg+xml';

  // Retourne le tableau des types MIME mis à jour
  return $mimes;
}

// Ajoute notre fonction de filtrage à l'action 'upload_mimes' pour permettre l'upload des fichiers SVG.
add_filter('upload_mimes', 'my_own_mime_types');

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['recipe', 'travel']);

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":

register_post_type('work', [
  'label' => 'Works',
  'description' => 'My works',
  'menu_position' => 7,
  'menu_icon' => 'dashicons-welcome-learn-more',
  'public' => true,
  'has_archive' => true,
  'rewrite' => [
    'slug' => 'works',
  ],
  'supports' => ['title', 'excerpt', 'editor', 'thumbnail'],
]);



register_taxonomy('type_work', ['work'], [
  'labels' => [
    'name' => 'Work type',
    'singular_name' => 'Work type'
  ],
  'description' => 'Project type',
  'public' => true,
  'hierarchical' => true,
  'show_tagcloud' => false,
]);


// Paramétrer des tailles d'images pour le générateur de thumbnails de Wordpress :

// Sans recadrage :
add_image_size('travel-side', 420, 420);
// Avec recadrage :
add_image_size('travel-header', 1920, 400, true);

// Enregistrer les menus de navigation en fonction de l'endroit où ils sont exploités :

register_nav_menu('header', 'Le menu de navigation principal en haut de la page.');
register_nav_menu('footer', 'Le menu de navigation de fin de page.');

// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le template.

function dw_get_navigation_links(string $location): array
{
  // Récupérer l'objet WP pour le menu à la location $location
  $locations = get_nav_menu_locations();

  if (!isset($locations[$location])) {
    return [];
  }

  $nav_id = $locations[$location];
  $nav = wp_get_nav_menu_items($nav_id);

  // Transformer le menu en un tableau de liens, chaque lien étant un objet personnalisé

  $links = [];

  foreach ($nav as $post) {
    $link = new stdClass();
    $link->href = $post->url;
    $link->label = $post->title;
    $link->icon = get_field('icon', $post);

    $links[] = $link;
  }

  // Retourner ce tableau d'objets (liens).
  return $links;
}

// Ajouter la fonctionnalité "POST" pour un formulaire de contact personnalisé :
add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');


// Créer une fonction qui permet de créer des pages d'options ACF pour le thème :
function create_site_options_page(): void
{
  if (function_exists('acf_add_options_page')) {
    // Page principale
    acf_add_options_page([
      'page_title' => 'Site Options',
      'menu_title' => 'Site Settings',
      'menu_slug' => 'site-options',
      'capability' => 'edit_posts',
      'redirect' => false
    ]);

    foreach (['fr', 'en'] as $lang) {
      acf_add_options_sub_page([
        'page_title' => sprintf(__('Options du site %s', 'hepl-trad'), strtoupper($lang)),
        'menu_title' => sprintf(__('Options du site %s', 'hepl-trad'), strtoupper($lang)),
        'menu_slug' => 'site-options-' . $lang,
        'post_id' => $lang,
        'parent' => 'site-options',
      ]);
    }
  }
}

add_action('acf/init', 'create_site_options_page');