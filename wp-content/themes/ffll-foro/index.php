<?php use Roots\Sage\Extras; ?>

<section class="posts-list">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 class="section-title">Noticias. <?= Extras\ungrynerd_svg('icon-news'); ?></h2>
      </div>
      <div class="col-md-8">
        <?php if (have_posts()): ?>
          <?php while (have_posts()) : the_post(); ?>
            <article class="post post--listing">
              <h2 class="post__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <p class="post__date"><?php the_time(get_option('date_format')); ?></p>
              <?php the_excerpt(); ?>
              <div class="post__tags">
                <?= Extras\ungrynerd_svg('icon-tag'); ?>
                <?php the_tags('', ', '); ?>
              </div>
            </article>
          <?php endwhile; ?>
          <?= Extras\ungrynerd_pagination(); ?>
        <?php else : ?>
          <h3>No se han encontrado noticias</h3>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>
