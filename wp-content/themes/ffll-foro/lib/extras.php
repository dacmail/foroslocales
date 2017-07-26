<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;
use Roots\Sage\Assets;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


function ungrynerd_svg($svg) {
  $output = '';
  if (empty($svg)) {
    return;
  }
  $svg_file_path = \get_template_directory() . "/dist/images/" . $svg . ".svg";
  ob_start();
  include($svg_file_path);
  $output .= ob_get_clean();
  return $output;
}

/* ARTICLES POST TYPE */
add_action('init',  __NAMESPACE__ . '\ugnrynerd_doc_post_type');
function ugnrynerd_doc_post_type()  {
  $labels = array(
    'name' => __('Documentos', 'ungrynerd'),
    'singular_name' => __('Documento', 'ungrynerd'),
    'add_new' => __('Añadir documento', 'ungrynerd'),
    'add_new_item' => __('Añadir documento', 'ungrynerd'),
    'edit_item' => __('Editar documento', 'ungrynerd'),
    'new_item' => __('Nuevo documento', 'ungrynerd'),
    'view_item' => __('Ver documentos', 'ungrynerd'),
    'search_items' => __('Buscar documentos', 'ungrynerd'),
    'not_found' =>  __('No se han encontrado documentos ', 'ungrynerd'),
    'not_found_in_trash' => __('No hay documentos en la papelera', 'ungrynerd'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'documentos' ),
    'taxonomies' => array('un_archive'),
    'has_archive' => true,
    'supports' => array('title')
  );
  register_post_type('un_doc',$args);
}

function ungrynerd_doc_taxonomies() {
    register_taxonomy("un_archive",
    array("un_doc"),
    array(
        "hierarchical" => true,
        "label" => esc_html__( "Categorización", 'ungrynerd'),
        "singular_label" => esc_html__( "Categoría", 'ungrynerd'),
        "rewrite" => array( 'slug' => 'archivo', 'hierarchical' => true),
        'show_in_nav_menus' => false,
        )
    );

    register_taxonomy("un_global",
    array("un_doc", "post", "event"),
    array(
        "hierarchical" => true,
        "label" => esc_html__( "Tag globales", 'ungrynerd'),
        "singular_label" => esc_html__( "Etiqueta global", 'ungrynerd'),
        "rewrite" => array( 'slug' => 'gtag', 'hierarchical' => false),
        'show_in_nav_menus' => false,
        )
    );
}

add_action( 'init', __NAMESPACE__ . '\ungrynerd_doc_taxonomies', 0);
