<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

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
  return '...';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



function ungrynerd_filter_posts($query) {
  if ($query->is_main_query()) {
    $query->set('post_type', array('post', 'event', 'un_doc'));
    $query->set('multisite', 1);
  }
}
add_filter('pre_get_posts', __NAMESPACE__ . '\ungrynerd_filter_posts');


function ungrynerd_doc_taxonomies() {
    register_taxonomy("un_global",
    array("un_doc", "post", "event"),
    array(
        "hierarchical" => true,
        "label" => esc_html__( "Claves", 'ungrynerd'),
        "singular_label" => esc_html__( "Clave", 'ungrynerd'),
        "rewrite" => array( 'slug' => 'clave', 'hierarchical' => false),
        'show_in_nav_menus' => false,
        )
    );
}
add_action( 'init', __NAMESPACE__ . '\ungrynerd_doc_taxonomies', 0);

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
