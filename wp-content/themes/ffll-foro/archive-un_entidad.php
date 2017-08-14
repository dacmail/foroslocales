<?php use Roots\Sage\Extras; ?>

<section class="posts-list">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 class="section-title">Entidades. </h2>
      </div>
      <div class="col-md-8">
        <ul class="entidades">
          <?php while (have_posts()) : the_post(); ?>
            <li class="entidades__item"><?php the_title(); ?></li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
