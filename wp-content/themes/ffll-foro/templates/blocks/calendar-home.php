<?php use Roots\Sage\Extras; ?>
<?php $events = EM_Events::get() ?>
<?php if (count($events)): ?>
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
            <a href="<?= get_post_type_archive_link('event') ?>" class="button">Ver calendario completo</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
