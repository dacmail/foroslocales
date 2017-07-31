<?php use Roots\Sage\Extras; ?>


  <section class="documents">
    <div class="container">
      <h2 class="section-title">Documentos. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
      <?php get_template_part('templates/components/filters', 'documents') ?>
      <?php if (have_posts()): ?>
        <div class="doc-list doc-list--extend">
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/components/document-extend', 'list') ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <?= Extras\ungrynerd_pagination(); ?>
        <style type="text/css">
          .pagination li .page-numbers.current { background-color: #<?php header_textcolor(); ?>;  }
        </style>
      <?php else : ?>
        <h3>No se han encontrado documentos con los filtros actuales</h3>
      <?php endif ?>
    </div>
  </section>
