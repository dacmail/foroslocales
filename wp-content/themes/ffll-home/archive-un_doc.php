<?php use Roots\Sage\Extras; ?>

<section class="documents">
  <div class="supertitle">
    <h2 class="title-search">Documentación municipal. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
  </div>
  <div class="container">
    <aside class="info">
      <?= Extras\ungrynerd_svg('icon-info'); ?>
      <div class="info__content">
        <p>La documentación que estás viendo aquí es municipal y general: hemos recopilado planes, bases de datos e información variada sobre la gestión del ayuntamiento de Madrid para facilitar tu actividad en los Foros Locales, sabemos que a veces no es fácil encontrar lo que necesitáis.</p>
        <p>Recuerda que puedes buscar información concreta de tu distrito u otros <a href="<?= home_url('#distritos') ?>">aquí</a> o sobre los temas que trabajáis en los Foros de forma transversal, en todos ellos <a href="<?= home_url('#temas') ?>">aquí</a>.</p>
      </div>
    </aside>
    <?php get_template_part('templates/components/filters', 'documents') ?>
    <?php if (have_posts()): ?>
      <div class="doc-list">
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
