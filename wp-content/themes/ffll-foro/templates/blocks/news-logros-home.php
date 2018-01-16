<?php use Roots\Sage\Extras; ?>
<?php $logros = get_cat_ID('Logros'); ?>
<?php if ($logros): ?>
  <?php $news = new \WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'cat' => $logros)); ?>
  <?php if ($news->have_posts()): ?>
    <section class="sections news-home news-home--logros">
      <div class="container">
        <div class="title-wrapper">
          <h2 class="section-title">Logros. <?= Extras\ungrynerd_svg('icon-news'); ?></h2>
          <a href="<?= get_category_link($logros); ?>" class="button">ver más logros</a>
        </div>
        <div class="row">
          <?php while ($news->have_posts()) : $news->the_post(); ?>
            <div class="col-md-6 offset-md-3">
              <article class="post post--home">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('landscape-small'); ?></a>
                <h2 class="post__title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
              </article>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif ?>
