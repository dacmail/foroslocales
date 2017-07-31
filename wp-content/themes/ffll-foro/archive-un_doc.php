<?php use Roots\Sage\Extras; ?>

<?php $docs = new \WP_Query(array('post_type' => 'un_doc')); ?>

  <section class="documents">
    <div class="container">
      <h2 class="section-title">Documentos. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
      <?php get_template_part('templates/components/filters', 'documents') ?>
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
