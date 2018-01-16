<?php use Roots\Sage\Extras; ?>
<?php if (get_theme_mod('ungrynerd_show_intro')): ?>

  <section class="sections intro-home" id="intro">
    <div class="container">
      <aside class="info">
        <?= Extras\ungrynerd_svg('icon-info'); ?>
        <div class="info__content">
          <?php $the_query = new WP_Query(array('page_id' => get_option('page_on_front'))); ?>
          <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
            <?php the_excerpt(); ?>
          <?php endwhile;?>
        </div>
      </aside>
    </div>
  </section>
<?php endif ?>
