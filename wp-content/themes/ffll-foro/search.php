<?php use Roots\Sage\Extras; ?>

<section class="posts-list">
  <div class="container">
    <h1 class="title-search"><?= Extras\ungrynerd_svg('icon-search'); ?>Resultados de búsqueda de <strong>'<?php the_search_query(); ?>'</strong></h1>
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
