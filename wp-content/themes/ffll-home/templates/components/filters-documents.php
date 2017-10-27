<?php use Roots\Sage\Extras; ?>

<div class="filters">
  <form class="filters__form" action="<?= get_post_type_archive_link('un_doc'); ?>">
    <div class="styled-select">
      <?php wp_dropdown_categories(array(
        'value_field' => 'slug',
        'show_option_all' => esc_html__('Todos los temas', 'ungrynerd'),
        'taxonomy' => 'un_global',
        'name' => 'por',
        'hide_empty' => false,
        'selected' => get_query_var('por')
      )); ?>
    </div>
    <div class="styled-select">
      <?php wp_dropdown_categories(array(
        'value_field' => 'slug',
        'show_option_all' => esc_html__('Todos los tipos', 'ungrynerd'),
        'taxonomy' => 'un_doc_type',
        'name' => 'tipo',
        'hide_empty' => false,
        'selected' => get_query_var('tipo')
      )); ?>
    </div>
  </form>
  <?= Extras\ungrynerd_svg('icon-filter'); ?>
</div>
