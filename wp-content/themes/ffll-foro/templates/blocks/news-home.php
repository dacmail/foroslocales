<?php use Roots\Sage\Extras; ?>

<?php $news = new \WP_Query(array(
                      'post_type' => 'post',
                      'posts_per_page' => 3,
                      'category__not_in' => array(get_cat_ID('Logros')))); ?>
<?php if ($news->have_posts()): ?>
  <section class="sections news-home">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="section-title">Noticias. <?= Extras\ungrynerd_svg('icon-news'); ?></h2>
        <a href="<?= get_post_type_archive_link('post'); ?>" class="button">ver más noticias</a>
      </div>
      <div class="row">
        <?php while ($news->have_posts()) : $news->the_post(); ?>
          <div class="col-md-4">
            <article class="post post--home">
              <?php the_post_thumbnail('landscape-small'); ?>
              <h2 class="post__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <span class="post__date"><?php the_time(get_option('date_format')); ?></span>
              <?php the_excerpt(); ?>
              <div class="post__tags">
                <?= Extras\ungrynerd_svg('icon-tag'); ?>
                <?php the_terms(get_the_ID(), 'un_global', '', ', '); ?>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>
