<?php while (have_posts()) : the_post(); ?>
  <?php if (is_page(12)): ?>
    <?php get_template_part('templates/content', 'page-events'); ?>
  <?php else : ?>
    <?php get_template_part('templates/content', 'page'); ?>
  <?php endif ?>
<?php endwhile; ?>
<style type="text/css">
  .page-numbers.current { background-color: #<?php header_textcolor(); ?>;  }
</style>
