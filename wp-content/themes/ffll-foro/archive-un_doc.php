<?php use Roots\Sage\Extras; ?>

<?php $docs = new \WP_Query(array('post_type' => 'un_doc')); ?>

  <section class="documents">
    <div class="container">
      <h2 class="section-title">Documentos. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
      <div class="filters">
        <form class="filters__form" action="<?= get_post_type_archive_link('un_doc'); ?>">
          <?php wp_dropdown_categories(array(
                                        'value_field' => 'slug',
                                        'show_option_all' => esc_html__('Todos', 'ungrynerd'),
                                        'taxonomy' => 'un_archive',
                                        'name' => 'por',
                                        'selected' => get_query_var('por')
                                      )); ?>
          <?php wp_dropdown_categories(array(
                                        'value_field' => 'slug',
                                        'show_option_all' => esc_html__('Todos', 'ungrynerd'),
                                        'taxonomy' => 'un_doc_type',
                                        'name' => 'tipo',
                                        'selected' => get_query_var('tipo')
                                      )); ?>
        </form>
        <div class="filters__by">
          Mesa alpha / Actas
        </div>
      </div>
      <?php if ($docs->have_posts()): ?>
        <div class="doc-list">
          <?php while ($docs->have_posts()) : $docs->the_post(); ?>
            <?php get_template_part('templates/components/document', 'list') ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php else : ?>
        <h3>No se han encontrado documentos con los filtros actuales</h3>
      <?php endif ?>
    </div>
  </section>


