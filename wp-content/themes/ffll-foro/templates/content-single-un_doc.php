<?php use Roots\Sage\Extras; ?>

<section class="documents">
  <div class="container">
    <h2 class="section-title">Documentos. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
    <?php if (have_posts()): ?>
      <div class="doc-list doc-list--extend">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/components/document-extend', 'list') ?>
        <?php endwhile; ?>
      </div>
      <?= Extras\ungrynerd_pagination(); ?>
    <?php else : ?>
      <h3>No se han encontrado documentos con los filtros actuales</h3>
    <?php endif ?>
  </div>
</section>
