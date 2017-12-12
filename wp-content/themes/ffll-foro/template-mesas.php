<?php /* Template Name: Listado de mesas */ ?>
<?php use Roots\Sage\Extras; ?>

<section class="posts-list">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 class="section-title">Mesas. </h2>
      </div>
      <div class="col-md-8">
        <ul class="entidades">
          <?php $mesas = get_terms('un_archive') ?>
          <?php foreach ($mesas as $mesa) : ?>
            <li class="entidades__item">
              <?php echo $mesa->name; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
