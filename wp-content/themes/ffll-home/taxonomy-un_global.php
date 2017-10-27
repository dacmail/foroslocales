<?php use Roots\Sage\Extras; ?>

<section class="posts-list">
  <div class="supertitle">
    <h1 class="title-search"><?php single_term_title(); ?>. <?= Extras\ungrynerd_svg('icon-tag'); ?></h1>
  </div>
  <div class="container">
    <?php if (have_posts()): ?>
      <?php while (have_posts()) : the_post(); ?>
        <article class="results">
          <?php get_template_part('templates/components/results', get_post_type()) ?>
        </article>
      <?php endwhile; ?>
      <?= Extras\ungrynerd_pagination(); ?>
    <?php else: ?>
      <h2>No hay resultados para tu búsqueda</h2>
    <?php endif ?>
  </div>
</section>
