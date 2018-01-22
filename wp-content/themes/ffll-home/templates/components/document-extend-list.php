<?php use Roots\Sage\Extras; ?>

<?php $file = get_post_meta(get_the_ID(), '_ungrynerd_file', true); ?>
<?php if (!empty($file)): ?>
  <?php $ext = pathinfo($file, PATHINFO_EXTENSION); ?>
  <?php if (strlen($ext)>3 || strlen($ext)<1) : $ext = "web"; endif; ?>
<?php endif ?>
<div class="doc-list__document">
  <div class="doc-list__document__data">
    <h2 class="doc-list__document__title"><?php the_title(); ?></h2>
    <div class="doc-list__document__metas">
      <?php $types = get_the_terms(get_the_ID(), 'un_doc_type' ); ?>
      <?php if ($types): ?>
        <div class="doc-list__document__type">
          <?= Extras\ungrynerd_svg('icon-type-small'); ?>
          <?php foreach ($types as $type) : ?>
            <a href="<?= add_query_arg(array('tipo' => $type->slug))  ?>"><?= esc_html($type->name); ?></a>
          <?php endforeach; ?>
        </div>
      <?php endif ?>
      <?php $keys = get_the_terms(get_the_ID(), 'un_global'); ?>
      <?php if ($keys): ?>
        <div class="doc-list__document__archive">
          <?= Extras\ungrynerd_svg('icon-tag-small'); ?>
          <?php foreach ($keys as $key) : ?>
            <a href="<?= add_query_arg(array('por' => $key->slug))  ?>"><?= esc_html($key->name); ?></a>
          <?php endforeach; ?>
        </div>
      <?php endif ?>
    </div>
  </div>
  <?php if (!empty($file)) : ?>
    <div class="doc-list__document__format <?= $ext ?>">
      .<?= $ext; ?>
    </div>
    <a target="_blank" href="<?= $file; ?>" class="doc-list__document__link" >
      <?= Extras\ungrynerd_doc_icon($ext); ?>
    </a>
  <?php else: ?>
    <a target="_blank" href="<?= esc_url(get_post_meta(get_the_ID(), '_ungrynerd_web', true)); ?>" class="doc-list__document__link" >
      <?= Extras\ungrynerd_svg('icon-link'); ?>
    </a>
  <?php endif ?>
</div>
