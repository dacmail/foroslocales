<?php
/*
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


$prefix = '_ungrynerd_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
        'id'         => 'general_options',
        'title'      =>  __('Opciones de post', 'ungrynerd'),
        'pages'      => array('un_doc' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'id' => $prefix . 'file',
                'type' => 'file_input',
                'name' => esc_html__( 'Archivo', 'ungrynerd' ),
            ),
            array(
                    'name' =>  __('Descripción del documento', 'ungrynerd'),
                    'id' => $prefix . 'desc',
                    'type' => 'wysiwyg',
                )
        ),
    );

function ungrynerd_register_meta_boxes()
{
  if ( !class_exists( 'RW_Meta_Box' ) )
    return;

  global $meta_boxes;
  foreach ( $meta_boxes as $meta_box )
  {
    new RW_Meta_Box( $meta_box );
  }
}
add_action( 'admin_init', 'ungrynerd_register_meta_boxes' );
