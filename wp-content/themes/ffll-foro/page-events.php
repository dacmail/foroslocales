<?php /* Template Name: Eventos */ ?>
<?php use Roots\Sage\Extras; ?>
<section class="posts-list">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 class="section-title">Eventos. <?= Extras\ungrynerd_svg('icon-calendar'); ?></h2>
      </div>
      <div class="col-md-8">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>
<style type="text/css">
  .page-numbers.current { background-color: #<?php header_textcolor(); ?>;  }
</style>
