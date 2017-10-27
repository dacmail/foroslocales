<?php use Roots\Sage\Extras; ?>
<?php $file = get_post_meta(get_the_ID(), '_ungrynerd_file', true); ?>
<?php $ext = pathinfo($file, PATHINFO_EXTENSION); ?>
<div class="results__format <?= $ext ?>">
  .<?= $ext; ?>
</div>
<div class="results__data">
  <?php echo Extras\ungrynerd_site_link(); ?>
  <h2 class="results__title">
    <?php the_title(); ?>
  </h2>
  <div class="results__meta">
    <div class="results__archive">
      <?= Extras\ungrynerd_svg('icon-folder-small'); ?>
      <?php the_terms(get_the_ID(), 'un_archive'); ?>
    </div>
    <div class="results__type">
      <?= Extras\ungrynerd_svg('icon-type-small'); ?>
      <?php the_terms(get_the_ID(), 'un_doc_type'); ?>
    </div>
    <div class="results__date">
      <?= Extras\ungrynerd_svg('icon-calendar-small'); ?>
      <?php the_time(get_option('date_format')); ?>
    </div>
  </div>
</div>
<a target="_blank" href="<?= $file; ?>" class="results__link" >
  <?= Extras\ungrynerd_doc_icon($ext); ?>
</a>
