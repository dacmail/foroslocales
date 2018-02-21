<?php /* Template Name: Listado de mesas */ ?>
<?php use Roots\Sage\Extras; ?>

<section class="posts-list">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 class="section-title">Mesas. </h2>
      </div>
      <div class="col-md-8">
        <p>Si lo necesitas, puedes contactar con cada mesa usando el <a href="<?php echo home_url('/#contacto') ?>">formulario de contacto</a></p>
        <ul class="entidades">
          <?php $mesas = get_terms('un_archive', array('hide_empty' => 0)) ?>
          <?php foreach ($mesas as $mesa) : ?>
            <li class="entidades__item">
              <a href="<?= get_term_link($mesa, 'un_archive')?>">
                <?php echo $mesa->name; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
