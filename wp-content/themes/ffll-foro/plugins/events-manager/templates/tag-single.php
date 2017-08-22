<?php use Roots\Sage\Extras; ?>

<?php
/*
 * This page displays a single event, called during the em_content() if this is an event page.
 * You can override the default display settings pages by copying this file to yourthemefolder/plugins/events-manager/templates/ and modifying it however you need.
 * You can display events however you wish, there are a few variables made available to you:
 *
 * $args - the args passed onto EM_Events::output()
 */
global $EM_Tag;
/* @var $EM_Tag EM_Tag */
$args = array();
$args = apply_filters('em_content_tags_args', $args);

$page_queryvar = !empty($args['page_queryvar']) ? $args['page_queryvar'] : 'pno';
if( !empty($args['pagination']) && !array_key_exists('page',$args) && !empty($_REQUEST[$page_queryvar]) && is_numeric($_REQUEST[$page_queryvar]) ){
  $page = $args['page'] = $_REQUEST[$page_queryvar];
}

$events = EM_Events::get($args); ?>
<section class="posts-list">
  <?php
  foreach( $events as $EM_Event ) { ?>
    <article class="post post--listing">
      <h2 class="post__title">
        <?php echo $EM_Event->output("#_EVENTLINK"); ?>
      </h2>
      <p class="post__date"><?php echo $EM_Event->output("#_EVENTDATES"); ?></p>
      <?php echo $EM_Event->output("#_EVENTEXCERPT"); ?>
      <div class="post__tags">
        <?= Extras\ungrynerd_svg('icon-tag'); ?>
        <?php echo $EM_Event->output("#_EVENTTAGS"); ?>
      </div>
    </article>
    <?php echo EM_Events::get_pagination_links($args, EM_Events::count()); ?>
  <?php } ?>
</section>
?>
