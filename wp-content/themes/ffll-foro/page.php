<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<style type="text/css">
  .page-numbers.current { background-color: #<?php header_textcolor(); ?>;  }
</style>
