<?php use Roots\Sage\Extras; ?>
<?php $events = EM_Events::get() ?>
<?php if (count($events)): ?>
  <section class="sections calendar-home">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h2 class="section-title">Agenda. <?= Extras\ungrynerd_svg('icon-calendar'); ?></h2>
          <?php em_events(array('limit' => 3)); ?>
        </div>
        <div class="col-sm-6">
          <?php em_calendar(array('format_header' => '', 'long_events' => 1)); ?>
          <div class="button-wrapper">
            <a href="<?= get_post_type_archive_link('event') ?>" class="button">Ver agenda completa</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
