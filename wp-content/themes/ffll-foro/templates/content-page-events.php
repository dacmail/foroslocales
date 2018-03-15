<?php use Roots\Sage\Extras; ?>

<section class="calendar-home">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="section-title">Agenda. <?= Extras\ungrynerd_svg('icon-calendar'); ?></h2>
        <?php the_content(); ?>
      </div>
      <div class="col-sm-6">
        <?php em_calendar(array('format_header' => '', 'long_events' => 1)); ?>
      </div>
    </div>
  </div>
</section>
