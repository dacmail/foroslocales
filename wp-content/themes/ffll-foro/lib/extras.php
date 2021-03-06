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
  return '...';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


function ungrynerd_svg($svg) {
  $output = '';
  if (empty($svg)) {
    return;
  }
  $svg_file_path = \get_template_directory() . "/dist/images/" . $svg . ".svg";
  return file_get_contents($svg_file_path);
}

/* DOCUMENTS POST TYPE */
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
    array("un_doc", "post", "event"),
    array(
        "hierarchical" => true,
        "label" => esc_html__( "Mesas", 'ungrynerd'),
        "singular_label" => esc_html__( "Mesa", 'ungrynerd'),
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
        "label" => esc_html__( "Temas", 'ungrynerd'),
        "singular_label" => esc_html__( "Tema", 'ungrynerd'),
        "rewrite" => array( 'slug' => 'tema', 'hierarchical' => false),
        'show_in_nav_menus' => false,
        )
    );
}
add_action( 'init', __NAMESPACE__ . '\ungrynerd_doc_taxonomies', 0);

/* ENTIDADES POST TYPE */
add_action('init',  __NAMESPACE__ . '\ugnrynerd_entidades_post_type');
function ugnrynerd_entidades_post_type()  {
  $labels = array(
    'name' => __('Entidades', 'ungrynerd'),
    'singular_name' => __('Entidad', 'ungrynerd'),
    'add_new' => __('Añadir entidad', 'ungrynerd'),
    'add_new_item' => __('Añadir entidad', 'ungrynerd'),
    'edit_item' => __('Editar entidad', 'ungrynerd'),
    'new_item' => __('Nuevo entidad', 'ungrynerd'),
    'view_item' => __('Ver Entidades', 'ungrynerd'),
    'search_items' => __('Buscar Entidades', 'ungrynerd'),
    'not_found' =>  __('No se han encontrado Entidades ', 'ungrynerd'),
    'not_found_in_trash' => __('No hay Entidades en la papelera', 'ungrynerd'),
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
    'rewrite' => array( 'slug' => 'entidades' ),
    'taxonomies' => array('un_global'),
    'has_archive' => true,
    'supports' => array('title')
  );
  register_post_type('un_entidad',$args);
}


/* FORM MAILS PIPES */
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
  // Si es búsqueda añaade todos los tipos de posts a la query
  if (is_search() && $query->is_main_query()) {
    $query->set('post_type', array('post', 'event', 'un_doc'));
  }

  if (is_post_type_archive('un_entidad') && $query->is_main_query()) {
    $query->set('posts_per_page', -1);
    $query->set('orderby', 'post_title');
    $query->set('order', 'ASC');
  }

  if ( $query->is_home() && $query->is_main_query() ) {
    $term = get_term_by('slug', 'logros', 'category');
    if ($term) {
      $query->set( 'category__not_in', array($term->term_id));
    }
  }



  // Filtra por tipo y categorización de documentos
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
  } elseif ($extension=='web') {
    $icon = 'icon-link';
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

function ungrynerd_og_schema( $output ) {
  return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
//add_filter('language_attributes', __NAMESPACE__ . '\ungrynerd_og_schema');

function ugnrynerd_og_tags() {
  global $post;
  if (is_singular() && !is_front_page()) {
    echo '<meta property="twitter:description" content="' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . '"/>';
    echo '<meta property="og:title" content="' . get_the_title() . ' - ' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
  } else {
    echo '<meta property="twitter:description" content="' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . '"/>';
    echo '<meta property="og:title" content="' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . '"/>';

  }

  echo '<meta name="twitter:card" content="summary_large_image">';
  echo '<meta property="og:site_name" content="' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . '"/>';

  if (!has_post_thumbnail()) {
    echo '<meta property="og:image" content="' . get_header_image() . '"/>';
    echo '<meta property="twitter:image:src" content="' . get_header_image() . '"/>';
  } else {
    $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
    echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
    echo '<meta property="twitter:image:src" content="' . esc_attr($thumbnail_src[0]) . '"/>';
  }
}
add_action( 'wp_head', __NAMESPACE__ . '\ugnrynerd_og_tags', 5 );




function ungrynerd_unregister_taxs() {
  unregister_taxonomy_for_object_type( 'post_tag', 'post' );
  unregister_taxonomy_for_object_type( 'event-tags', 'event' );
  unregister_taxonomy_for_object_type( 'event-categories', 'event' );
}
add_action( 'init', __NAMESPACE__ . '\ungrynerd_unregister_taxs' );



function ungrynerd_remove_menu_pages() {
  global $user_ID;
  if (!current_user_can('activate_plugins')) {
    remove_menu_page('edit-comments.php');
    //remove_menu_page('wpcf7');
    remove_menu_page('edit.php?post_type=page');
  }
}
add_action( 'admin_init', __NAMESPACE__ . '\ungrynerd_remove_menu_pages' );

function ungrynerd_prevent_terms($term, $taxonomy) {
  if ('un_global' === $taxonomy && !current_user_can( 'activate_plugins')) {
    return new WP_Error( 'term_addition_blocked', __( 'No puedes añadir temas' ) );
  }

  return $term;
}
add_action('pre_insert_term', __NAMESPACE__ . '\ungrynerd_prevent_terms', 1, 2);


function ungrynerd_disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\disable_emojicons_tinymce' );
}
add_action( 'init', __NAMESPACE__ . '\ungrynerd_disable_wp_emojicons');

function disable_emojicons_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}


function ungrynerd_custom_toolbar_link($wp_admin_bar) {
  $args = array(
    'id' => 'pdfmanual',
    'title' => 'Manual Usuario',
    'href' => get_template_directory_uri() . '/manual-foros_usuario.pdf',
  );
  $wp_admin_bar->add_node($args);
  $args = array(
    'id' => 'pdfmanualadmin',
    'title' => 'Manual Administrador',
    'href' => get_template_directory_uri() . '/manual-foros_admin.pdf',
  );
  $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', __NAMESPACE__ . '\\ungrynerd_custom_toolbar_link', 999);
