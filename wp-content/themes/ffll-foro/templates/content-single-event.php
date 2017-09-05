<?php use Roots\Sage\Extras; ?>

<section class="single-post">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
        <div class="col-md-7 offset-md-1 flex-md-last">
          <article <?php post_class('post post--event'); ?>>
            <header>
              <h1 class="post__title">
                <?php the_title(); ?>
              </h1>
              <?php get_template_part('templates/entry-meta'); ?>
              <aside class="post post--event hidden-sm-up">
                <time class="post__date"><?php the_time(get_option('date_format')); ?></time>
                <time class="post__date post__date--time"><?php the_time('H:i'); ?></time>
                <?= do_shortcode('[event]{has_location}<p class="post__location">#_LOCATIONNAME (#_LOCATIONADDRESS, #_LOCATIONPOSTCODE, #_LOCATIONTOWN){/has_location}[/event]</p>') ?>
                <a target="_blank" class="button" href="<?= do_shortcode('[event]#_EVENTGCALURL[/event]') ?>">Añadir a Google Calendar</a>
              </aside>
            </header>
            <div class="post__content">
              <?= do_shortcode('[event]#_EVENTNOTES[/event]') ?>
            </div>
            <?php if (has_term('', 'event-tags')) : ?>
            <div class="post__tags">
              <?= Extras\ungrynerd_svg('icon-tag'); ?>
              <?php the_terms(get_the_ID(), 'un_global', '', ', '); ?>
            </div>
            <?php endif; ?>
          </article>
        </div>
        <div class="col-md-4">
          <aside class="post post--event">
            <time class="post__date"><?php the_time(get_option('date_format')); ?></time>
            <time class="post__date post__date--time"><?php the_time('H:i'); ?></time>
            <?= do_shortcode('[event]{has_location}#_LOCATIONMAP{/has_location}[/event]') ?>
            <?= do_shortcode('[event]{has_location}<p class="post__location">#_LOCATIONNAME (#_LOCATIONADDRESS, #_LOCATIONPOSTCODE, #_LOCATIONTOWN){/has_location}[/event]</p>') ?>
            <a target="_blank" class="button" href="<?= do_shortcode('[event]#_EVENTGCALURL[/event]') ?>">Añadir a Google Calendar</a>
          </aside>
        </div>
      </div>

    <?php endwhile; ?>
  </div>
</section>

