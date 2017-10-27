<?php use Roots\Sage\Extras; ?>

<div class="results__format results__format--news">
  <?= Extras\ungrynerd_svg('icon-news'); ?>
</div>
<div class="results__data">
  <?php echo Extras\ungrynerd_site_link(); ?>
  <h2 class="results__title  ">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h2>
  <div class="results__meta">
    <div class="results__author">
      <?= Extras\ungrynerd_svg('icon-author'); ?>
      <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?= get_the_author(); ?></a>
    </div>
    <div class="results__date">
      <?= Extras\ungrynerd_svg('icon-calendar-small'); ?>
      <?php the_time(get_option('date_format')); ?>
    </div>
  </div>
</div>
<span class="results__link results__link--empty "></span>
