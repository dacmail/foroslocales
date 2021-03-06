<?php use Roots\Sage\Extras; ?>

<?php $file = get_post_meta(get_the_ID(), '_ungrynerd_file', true); ?>
<?php $ext = pathinfo($file, PATHINFO_EXTENSION); ?>
<?php if (strlen($ext)>3 || strlen($ext)<1): $ext = "web"; endif; ?>
<div class="doc-list__document">
  <div class="doc-list__document__format <?= $ext ?>">
    .<?= $ext; ?>
  </div>
  <div class="doc-list__document__data">
    <h2 class="doc-list__document__title"><a target="_blank" href="<?= $file; ?>"><?php the_title(); ?></a></h2>
    <div class="doc-list__document__metas">
      <?php if (has_term('', 'un_archive')): ?>
        <div class="doc-list__document__archive">
          <?= Extras\ungrynerd_svg('icon-folder-small'); ?>
          <?php the_terms(get_the_ID(), 'un_archive'); ?>
        </div>
      <?php endif ?>
      <?php if (has_term('', 'un_doc_type')): ?>
        <div class="doc-list__document__type">
          <?= Extras\ungrynerd_svg('icon-type-small'); ?>
          <?php the_terms(get_the_ID(), 'un_doc_type'); ?>
        </div>
      <?php endif ?>
      <div class="doc-list__document__date">
        <?= Extras\ungrynerd_svg('icon-calendar-small'); ?>
        <?php the_time(get_option('date_format')); ?>
      </div>
    </div>
    <?= apply_filters('the_content', get_post_meta(get_the_ID(), '_ungrynerd_desc', true)); ?>
  </div>
  <a target="_blank" href="<?= $file; ?>" class="doc-list__document__link" >
    <?= Extras\ungrynerd_doc_icon($ext); ?>
  </a>
</div>
