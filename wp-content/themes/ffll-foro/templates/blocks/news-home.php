<?php use Roots\Sage\Extras; ?>

<?php $news = new \WP_Query(array(
                      'post_type' => 'post',
                      'posts_per_page' => 3)); ?>
<?php if ($news->have_posts()): ?>
  <section class="news-home">
    <div class="container">
        <div class="title-wrapper">
          <h2 class="section-title">Noticias. <?= Extras\ungrynerd_svg('icon-news'); ?></h2>
          <a href="<?= get_post_type_archive_link('post'); ?>" class="button">ir a las noticias de <?= bloginfo('blogname') ?></a>
        </div>
        <div class="row">
          <?php while ($news->have_posts()) : $news->the_post(); ?>
            <div class="col-md-4">
              <article class="post post--home">
                <h2 class="post__title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <time class="post__date"><?php the_time(get_option('date_format')); ?></time>
                <?php the_excerpt(); ?>
                <div class="post__tags">
                  <?= Extras\ungrynerd_svg('icon-tag'); ?>
                  <?php the_tags('', ', '); ?>
                </div>
              </article>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
