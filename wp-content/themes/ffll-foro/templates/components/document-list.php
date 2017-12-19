<?php use Roots\Sage\Extras; ?>

<?php $file = get_post_meta(get_the_ID(), '_ungrynerd_file', true); ?>
<?php $ext = pathinfo($file, PATHINFO_EXTENSION); ?>
<?php if (strlen($ext)>3 || strlen($ext)<1): $ext = "web"; endif; ?>
<div class="doc-list__document">
  <div class="doc-list__document__format <?= $ext ?>">
    .<?= $ext; ?>
  </div>
  <div class="doc-list__document__name">
    <?php the_title(); ?>
  </div>
  <div class="doc-list__document__tags">
    <?php the_terms(get_the_ID(), 'un_archive'); ?>
  </div>
  <div class="doc-list__document__date">
    <?= Extras\ungrynerd_svg('icon-calendar-small'); ?>
    <?php the_time(get_option('date_format')); ?>
  </div>
  <a target="_blank" href="<?= $file; ?>" class="doc-list__document__link" >
    <span>Ver</span> <?= Extras\ungrynerd_doc_icon($ext); ?>
  </a>
</div>
