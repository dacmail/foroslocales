<?php use Roots\Sage\Extras; ?>

<?php get_template_part('templates/blocks/calendar', 'home'); ?>

<?php get_template_part('templates/blocks/documents', 'home'); ?>

<section class="news-home">
  <div class="container">
      <div class="title-wrapper">
        <h2 class="section-title">noticias. <?= Extras\ungrynerd_svg('icon-news'); ?></h2>
        <a href="<?= get_post_type_archive_link('post'); ?>" class="button">ir a las noticias de <?= bloginfo('blogname') ?></a>
      </div>
      <div class="row">
        <?php while (have_posts()) : the_post(); ?>
          <div class="col-md-4">
            <article class="post post--home">
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
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('templates/blocks/contact', 'home'); ?>
