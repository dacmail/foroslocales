<?php use Roots\Sage\Extras; ?>

<?php $docs = new \WP_Query(array('post_type' => 'un_doc')); ?>
<?php if ($docs->have_posts()): ?>
  <section class="documents-home">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="section-title">Documentos. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
        <a href="" class="button">Ver más documentos</a>
      </div>
      <div class="doc-list">
        <?php while ($docs->have_posts()) : $docs->the_post(); ?>
          <?php get_template_part('templates/components/document', 'list') ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif ?>
