<?php use Roots\Sage\Extras; ?>

<section class="single-post">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class('post--single'); ?>>
        <header>
          <h1 class="post__title">
            <?php the_title(); ?>
          </h1>
          <?php get_template_part('templates/entry-meta'); ?>
          <?php if (has_post_thumbnail()): ?>
            <div class="post__thumb">
              <?php the_post_thumbnail('landscape') ?>
              <?php $thumb_caption = get_post(get_post_thumbnail_id())->post_excerpt; ?>
              <?php if (!empty($thumb_caption)): ?>
                <p class="post__thumb__caption"><?= Extras\ungrynerd_svg('icon-camera') . ' ' . $thumb_caption; ?></p>
              <?php endif ?>
            </div>
          <?php endif ?>
        </header>
        <div class="post__content">
          <?php the_content(); ?>
        </div>
        <div class="post__tags">
          <?= Extras\ungrynerd_svg('icon-tag'); ?>
          <?php the_terms(get_the_ID(), 'un_global', '', ', '); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</section>

