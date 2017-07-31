<?php use Roots\Sage\Extras; ?>

<?php $file = get_post_meta(get_the_ID(), '_ungrynerd_file', true); ?>
<?php $ext = pathinfo($file, PATHINFO_EXTENSION); ?>
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
  <a target="_blank" href="<?= $file; ?>" class="doc-list__document__link" >
    <?= Extras\ungrynerd_doc_icon($ext); ?>
  </a>
</div>
