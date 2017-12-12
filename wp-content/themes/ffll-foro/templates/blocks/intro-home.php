<?php use Roots\Sage\Extras; ?>
<?php if (get_theme_mod('ungrynerd_show_intro')): ?>
  <section class="sections intro-home" id="intro">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <?php $the_query = new WP_Query(array('page_id' => get_option('page_on_front'))); ?>
          <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
            <?php the_excerpt(); ?>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
