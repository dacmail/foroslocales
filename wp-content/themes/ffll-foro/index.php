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


<section class="documents-home">
  <div class="container">
    <div class="title-wrapper">
      <h2 class="section-title">Calendario. <?= Extras\ungrynerd_svg('icon-folder'); ?></h2>
      <a href="" class="button">Ver más documentos</a>
    </div>
    <div class="doc-list">
      <div class="doc-list__document">
        <div class="doc-list__document__format">
          .DOC
        </div>
        <div class="doc-list__document__name">
          Lorem Ipsum es simplemente el texto de relleno
        </div>
        <div class="doc-list__document__tags">
          <a href="#">Comisión permanete</a>
        </div>
        <a href="#" class="doc-list__document__link" >
          <?= Extras\ungrynerd_svg('icon-download'); ?>
        </a>
      </div>
      <div class="doc-list__document">
        <div class="doc-list__document__format">
          .DOC
        </div>
        <div class="doc-list__document__name">
          Lorem Ipsum es simplemente el texto de relleno
        </div>
        <div class="doc-list__document__tags">
          <a href="#">Comisión permanete</a>
        </div>
        <a href="#" class="doc-list__document__link" >
          <?= Extras\ungrynerd_svg('icon-download'); ?>
        </a>
      </div>
    </div>
  </div>
</section>
