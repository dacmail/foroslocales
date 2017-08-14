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
            <?php $link = get_post_meta(get_the_ID(), '_ungrynerd_link', true); ?>
            <li class="entidades__item">
              <?php if (!empty($link)): ?>
                <a href="<?= $link ?>" target="_blank">
              <?php endif ?>
              <?php the_title(); ?>
              <?php if (!empty($link)): ?>
                </a>
              <?php endif ?>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
