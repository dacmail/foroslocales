<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->add_section( 'ungrynerd_home_section' , array(
    'title'       => __( 'Home', 'ungrynerd' ),
    'priority'    => 60,
  ) );

  $wp_customize->add_setting( 'ungrynerd_hide_contact');
  $wp_customize->add_control( new \WP_Customize_Control( $wp_customize, 'ungrynerd_hide_contact_checkbox', array(
    'type' => 'checkbox',
    'label'    => __( 'Ocultar Formulario de contacto', 'ungrynerd' ),
    'section'  => 'ungrynerd_home_section',
    'settings' => 'ungrynerd_hide_contact',
  ) ) );

  $wp_customize->add_setting( 'ungrynerd_show_intro');
  $wp_customize->add_control( new \WP_Customize_Control( $wp_customize, 'ungrynerd_show_intro_checkbox', array(
    'type' => 'checkbox',
    'label'    => __( 'Mostrar texto introducción', 'ungrynerd' ),
    'description'    => __( 'El texto introductorio se puede cambiar editando el contenido de la página de inicio en el menú Páginas del panel de control.', 'ungrynerd' ),
    'section'  => 'ungrynerd_home_section',
    'settings' => 'ungrynerd_show_intro',
  ) ) );


  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
