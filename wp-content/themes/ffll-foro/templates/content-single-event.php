<?php use Roots\Sage\Extras; ?>

<section class="single-post">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
        <div class="col-md-7 offset-md-1 order-md-2">
          <article <?php post_class('post post--event'); ?>>
            <header>
              <h1 class="post__title">
                <?php the_title(); ?>
              </h1>
              <?php get_template_part('templates/entry-meta'); ?>
            </header>
            <div class="post__content">
              <p><?php the_post_thumbnail('landscape') ?></p>
              <?= do_shortcode('[event]#_EVENTNOTES[/event]') ?>
            </div>
            <?php if (has_term('', 'event-tags')) : ?>
            <div class="post__tags">
              <?php the_terms(get_the_ID(), 'un_global', Extras\ungrynerd_svg('icon-tag'), ', '); ?>
            </div>
            <?php endif; ?>
          </article>
        </div>
        <div class="col-md-4 order-md-1">
          <aside class="post post--event">
            <span class="post__date"><?php the_time(get_option('date_format')); ?></span>
            <span class="post__date post__date--time"><?php the_time('H:i'); ?></span>
            <?= do_shortcode('[event]{has_location}#_LOCATIONMAP{/has_location}[/event]') ?>
            <?= do_shortcode('[event]{has_location}<p class="post__location">#_LOCATIONNAME (#_LOCATIONADDRESS, #_LOCATIONTOWN){/has_location}[/event]</p>') ?>
            <p><a target="_blank" class="button" href="<?= do_shortcode('[event]#_EVENTGCALURL[/event]') ?>"><?php esc_html_e('Añádelo a Google Calendar', 'ungrynerd'); ?></a></p>
            <p><a target="_blank" class="button" href="<?= do_shortcode('[event]#_EVENTICALURL[/event]') ?>"><?php esc_html_e('Añádelo a tu Calendario', 'ungrynerd'); ?></a></p>
          </aside>
        </div>
      </div>

    <?php endwhile; ?>
  </div>
</section>

