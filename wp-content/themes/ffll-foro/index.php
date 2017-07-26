<?php use Roots\Sage\Extras; ?>


<section class="calendar-home">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="section-title">Calendario. <?= Extras\ungrynerd_svg('icon-calendar'); ?></h2>
        <?php em_events(array('limit' => 3)); ?>
      </div>
      <div class="col-sm-6">
        <?php em_calendar(array('format_header' => '')); ?>
        <div class="button-wrapper">
          <a href="" class="button">Ver calendario completo</a>
        </div>
      </div>
    </div>
  </div>
</section>

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
          <?php $file = get_post_meta(get_the_ID(), '_ungrynerd_file', true); ?>
          <?php $ext = pathinfo($file, PATHINFO_EXTENSION); ?>
          <div class="doc-list__document">
            <div class="doc-list__document__format <?= $ext ?>">
              .<?= $ext; ?>
            </div>
            <div class="doc-list__document__name">
              <?php the_title(); ?>
            </div>
            <div class="doc-list__document__tags">
              <?php the_terms(get_the_ID(), 'un_archive'); ?>
            </div>
            <a target="_blank" href="<?= $file; ?>" class="doc-list__document__link" >
              <?= Extras\ungrynerd_svg('icon-download'); ?>
            </a>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif ?>

<section class="contact-home">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="section-title">Contacto. <?= Extras\ungrynerd_svg('icon-email'); ?></h2>
        <?= do_shortcode('[contact-form-7 id="32" title="Contacto"]'); ?>
      </div>
    </div>
  </div>
</section>

