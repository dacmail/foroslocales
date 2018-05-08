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

function ungryner_add_query_vars($vars ){
  $vars[] = "por";
  $vars[] = "tipo";
  return $vars;
}
add_filter('query_vars', __NAMESPACE__ . '\ungryner_add_query_vars');

function ungrynerd_filter_posts($query) {
  if (!is_tax('un_doc_type')
  && !is_post_type_archive('un_doc')
  && $query->is_main_query()
  && !is_admin()
  && !is_page()) {
    $query->set('post_type', array('post', 'event', 'un_doc'));
    $query->set('multisite', 1);
    $query->set('sites__not_in', array(1));
  } elseif (is_post_type_archive('un_doc') && $query->is_main_query() && !is_admin()) {
    if (get_query_var('por') && get_query_var('tipo')) {
      $tax_query['relation'] = 'AND';
    }
    if (get_query_var('por')) {
        $tax_query[] = array(
                        'taxonomy' => 'un_global',
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
add_filter('pre_get_posts', __NAMESPACE__ . '\ungrynerd_filter_posts');

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
    'rewrite' => array('slug' => 'documentacion'),
    'taxonomies' => array('un_doc_type', 'un_global'),
    'has_archive' => true,
    'supports' => array('title')
  );
  register_post_type('un_doc',$args);
}

function ungrynerd_doc_taxonomies() {
  register_taxonomy("un_archive",
    array(),
    array(
        "hierarchical" => true,
        "label" => esc_html__("Categorización", 'ungrynerd'),
        "singular_label" => esc_html__("Categoría", 'ungrynerd'),
        "rewrite" => array('slug' => 'archivado', 'hierarchical' => true),
        'show_in_nav_menus' => false,
        )
    );

    register_taxonomy("un_global",
    array("un_doc"),
    array(
        "hierarchical" => true,
        "label" => esc_html__("Temas", 'ungrynerd'),
        "singular_label" => esc_html__("Tema", 'ungrynerd'),
        "rewrite" => array('slug' => 'tema', 'hierarchical' => false),
        'show_in_nav_menus' => false,
        )
    );

    register_taxonomy("un_doc_type",
    array("un_doc"),
    array(
        "hierarchical" => true,
        "label" => esc_html__("Tipos", 'ungrynerd'),
        "singular_label" => esc_html__("Tipo", 'ungrynerd'),
        "rewrite" => array('slug' => 'tipo', 'hierarchical' => true),
        'show_in_nav_menus' => false,
        )
    );
}
add_action('init', __NAMESPACE__ . '\ungrynerd_doc_taxonomies', 0);

function ungrynerd_svg($svg) {
  $output = '';
  if (empty($svg)) {
    return;
  }
  $svg_file_path = \get_template_directory() . "/dist/images/" . $svg . ".svg";
  return file_get_contents($svg_file_path);
}


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
  $paginate = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(remove_query_arg(array('tipo', 'por'), get_pagenum_link($big, false)))),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'mid_size' => 2,
    'end_size' => 1,
    'current' => max(1, get_query_var('paged') ),
    'prev_text' => ungrynerd_svg('icon-left'),
    'next_text' => ungrynerd_svg('icon-right'),
    'add_args' => array($args)
    )
  );

  if ($query->max_num_pages > 1) : ?>
    <ul class="pagination">
    <?php foreach ($paginate as $page ) {
      echo '<li>' . $page . '</li>';
    } ?>
    </ul>
  <?php endif;
}


function ungrynerd_site_link() {
  global $blog_id;
  $site = get_blog_details($blog_id);
  return '<h2 class="results__site-name"><a href="'.  $site->siteurl . '">'.  $site->blogname . '</a></h2>';
}



function ungrynerd_disable_wp_emojicons() {
  // all actions related to emojis
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'print_emoji_detection_script', 7 );
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');

  // filter to remove TinyMCE emojis
  add_filter('tiny_mce_plugins', __NAMESPACE__ . '\disable_emojicons_tinymce');
}
add_action('init', __NAMESPACE__ . '\ungrynerd_disable_wp_emojicons');

function disable_emojicons_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

//Añade el term_id como campo oculto al formulario
function ungrynerd_add_term_id_to_form($tag, $unused) {
  if ($tag['name'] == 'tema') {
    $tag['values'] = isset(get_queried_object()->term_id) ?array(get_queried_object()->term_id) : array();
    $tag['options'] = array('readonly');
  } elseif ($tag['name'] == 'tema_slug') {
    $tag['values'] = isset(get_queried_object()->name) ? array(get_queried_object()->name) : array();
    $tag['options'] = array('readonly');
  }

  return $tag;
}
add_filter( 'wpcf7_form_tag', __NAMESPACE__ . '\ungrynerd_add_term_id_to_form', 10, 2);

//Añade emails del custom field de la taxonomía segun corresponde
function ungrynerd_prepare_form($wpcf7) {

  $submission = \WPCF7_Submission::get_instance();
  $posted_data = $submission->get_posted_data() ;

  $mailProp = $wpcf7->get_properties('mail');

  if (!empty($posted_data['tema'])) {
    $emails = get_term_meta($posted_data['tema'], 'form_emails', true);

    $mailProp['mail']['additional_headers'] = "Bcc: " . $emails;

    $wpcf7->set_properties(array('mail' => $mailProp['mail']));
  }

  update_option('___debugforms', serialize($submission));

  return $wpcf7;
}
add_action('wpcf7_before_send_mail', __NAMESPACE__ . '\ungrynerd_prepare_form');



function pippin_taxonomy_add_new_meta_field() {
  ?>
  <div class="form-field">
    <label for="form_emails"><?php _e('Correos electrónicos', 'ungrynerd'); ?></label>
    <textarea rows="5" cols="50" type="text" name="form_emails" id="form_emails"></textarea>
    <p class="description"><?php _e('Lista de correos separados por comas','ungrynerd'); ?></p>
  </div>
<?php
}
add_action('un_global_add_form_fields', __NAMESPACE__ . '\pippin_taxonomy_add_new_meta_field', 10, 2 );

function pippin_taxonomy_edit_meta_field($term) {
  $form_emails = get_term_meta($term->term_id, 'form_emails', true);?>
  <tr class="form-field">
  <th scope="row" valign="top"><label for="form_emails"><?php _e('Correos electrónicos', 'ungrynerd'); ?></label></th>
    <td>
      <textarea rows="5" cols="50" type="text" name="form_emails" id="form_emails"><?php echo esc_attr($form_emails) ? esc_attr($form_emails) : ''; ?></textarea>
      <p class="description"><?php _e('Lista de correos separados por comas','ungrynerd'); ?></p>
    </td>
  </tr>
<?php
}
add_action('un_global_edit_form_fields', __NAMESPACE__ . '\pippin_taxonomy_edit_meta_field', 10, 2 );

function save_taxonomy_custom_meta($term_id) {
  if (isset($_POST['form_emails'])) {
    update_term_meta($term_id, 'form_emails', $_POST['form_emails']);
  }
}
add_action('edited_un_global', __NAMESPACE__ . '\save_taxonomy_custom_meta', 10, 2 );
add_action('create_un_global', __NAMESPACE__ . '\save_taxonomy_custom_meta', 10, 2 );


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
