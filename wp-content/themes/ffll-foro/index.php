<?php use Roots\Sage\Extras; ?>


<section class="calendar">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="section-title">Calendario. <?= Extras\ungrynerd_svg('icon-calendar'); ?></h2>
        <?php em_events(array('limit' => 3)); ?>
      </div>
      <div class="col-sm-6">
        <?php em_calendar(array('format_header' => '')); ?>
      </div>
    </div>
  </div>
</section>
