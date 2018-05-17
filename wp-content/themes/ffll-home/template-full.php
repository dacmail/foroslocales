<?php /* Template Name: Página Full Width */ ?>
<?php while (have_posts()) : the_post(); ?>
  <section class="page-wrap">
    <div class="container">
      <h2 class="section-title"><?php the_title(); ?>.</h2>
    </div>
    <div class="container-full">
      <?php the_content(); ?>
    </div>
  </section>
<?php endwhile; ?>
