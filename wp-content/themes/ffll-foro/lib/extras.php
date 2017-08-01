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
    'exclude_from_search' => false,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'documentos' ),
    'taxonomies' => array('un_archive', 'un_doc_type', 'un_global'),
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
        "rewrite" => array( 'slug' => 'archivado', 'hierarchical' => true),
        'show_in_nav_menus' => false,
        )
    );

    register_taxonomy("un_doc_type",
    array("un_doc"),
    array(
        "hierarchical" => true,
        "label" => esc_html__( "Tipos", 'ungrynerd'),
        "singular_label" => esc_html__( "Tipo", 'ungrynerd'),
        "rewrite" => array( 'slug' => 'tipo', 'hierarchical' => true),
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

function ungrynerd_form_tag($scanned_tag) {
  $pipes = new \WPCF7_Pipes( $scanned_tag['raw_values'] );
  $scanned_tag['values'] = $pipes->collect_afters();
  return $scanned_tag;
}
add_filter('wpcf7_form_tag', __NAMESPACE__ . '\ungrynerd_form_tag',10,1);


function ungryner_add_query_vars( $vars ){
  $vars[] = "por";
  $vars[] = "tipo";
  return $vars;
}
add_filter( 'query_vars', __NAMESPACE__ . '\ungryner_add_query_vars' );


function ungrynerd_filter_documents($query) {
  if (is_post_type_archive('un_doc') && $query->is_main_query()) {
    if (get_query_var('por') && get_query_var('tipo')) {
      $tax_query['relation'] = 'AND';
    }
    if (get_query_var('por')) {
        $tax_query[] = array(
                        'taxonomy' => 'un_archive',
                        'field'    => 'slug',
                        'terms'    => get_query_var('por'),
                      );
    }

    if (get_query_var('tipo')) {
        $tax_query[] =  array(
                          'taxonomy' => 'un_doc_type',
                          'field'    => 'slug',
                          'terms'    => get_query_var('tipo'),
                        );
    }
    $query->set('page', get_query_var('paged'));
    if (!empty($tax_query)) {
      $query->set('tax_query', $tax_query);
    }
  }
}
add_filter('pre_get_posts', __NAMESPACE__ . '\ungrynerd_filter_documents');


function ungrynerd_doc_icon($extension = '') {
  $icon = 'icon-download';
  $preview_formats = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
  if (in_array($extension, $preview_formats)) {
    $icon = 'icon-preview';
  }
  return ungrynerd_svg($icon);
}


function ungrynerd_pagination($query=null) {
    global $wp_query;
    $query = $query ? $query : $wp_query;
    $big = 999999999;
    $args = array();
    if (get_query_var('por')) {
      $args['por'] = get_query_var('por');
    }
    if (get_query_var('tipo')) {
      $args['tipo'] = get_query_var('tipo');
    }
    $paginate = paginate_links( array(
      'base' => str_replace($big, '%#%', esc_url(remove_query_arg(array('tipo', 'por'), get_pagenum_link($big, false)))),
      'type' => 'array',
      'total' => $query->max_num_pages,
      'format' => '?paged=%#%',
      'mid_size' => 2,
      'end_size' => 1,
      'current' => max( 1, get_query_var('paged') ),
      'prev_text' => ungrynerd_svg('icon-left'),
      'next_text' => ungrynerd_svg('icon-right'),
      'add_args' => array($args)
      )
    );

    if ($query->max_num_pages > 1) : ?>
      <ul class="pagination">
      <?php foreach ( $paginate as $page ) {
        echo '<li>' . $page . '</li>';
      } ?>
    </ul>
    <style type="text/css">
      .pagination li .page-numbers.current { background-color: #<?php header_textcolor(); ?>;  }
    </style>
    <?php endif;
  }
