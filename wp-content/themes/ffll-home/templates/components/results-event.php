<?php use Roots\Sage\Extras; ?>

<div class="results__format results__format--news">
  <?= Extras\ungrynerd_svg('icon-calendar'); ?>
</div>
<div class="results__data">
  <?php echo Extras\ungrynerd_site_link(); ?>
  <h2 class="results__title results__title--news ">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h2>
  <div class="results__meta">
    <div class="results__date">
      <?= Extras\ungrynerd_svg('icon-calendar-small'); ?>
      <?php the_time(get_option('date_format')); ?> // <?php the_time('H:i'); ?>
    </div>
  </div>
</div>
<span class="results__link results__link--empty "></span>
