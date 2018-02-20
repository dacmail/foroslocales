<?php /* Template Name: Listado de eventos */ ?>
<?php use Roots\Sage\Extras; ?>
<section class="posts-list">
  <div class="supertitle">
    <h1 class="title-search">Eventos de hoy. <?= Extras\ungrynerd_svg('icon-calendar-black'); ?></h1>
  </div>
  <div class="container">
    <?php $events = new WP_Query(array(
      'post_type' => 'event',
      'multisite' => 1,
      'meta_key' => '_event_start_date',
      'meta_value'=> Date('Y-m-d')
    )); ?>
    <?php if ($events->have_posts()): ?>
      <?php while ($events->have_posts()) : $events->the_post(); ?>
        <article class="results">
          <?php get_template_part('templates/components/results', get_post_type()) ?>
        </article>
      <?php endwhile; ?>
      <?= Extras\ungrynerd_pagination(); ?>
    <?php else: ?>
      <h2>No hay eventos para hoy</h2>
    <?php endif ?>
  </div>
</section>
