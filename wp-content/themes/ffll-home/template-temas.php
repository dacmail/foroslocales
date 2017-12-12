<?php /* Template Name: Listado de Temas*/ ?>
<?php use Roots\Sage\Extras; ?>
<?php use Roots\Sage\Assets; ?>

<section class="claves" id="temas">
  <div class="container">
    <div class="col-sm-12">
      <h1 class="section-title">Temas. <?= Extras\ungrynerd_svg('icon-tag'); ?></h1>
      <?php $claves = get_terms('un_global', array('hide_empty' => 0)); ?>
      <ul class="claves__list">
      <?php foreach ($claves as $clave): ?>
        <li><a href="<?php echo get_term_link($clave); ?>"><?php echo $clave->name; ?></a></li>
      <?php endforeach ?>
      </ul>
    </div>
  </div>
</section>
