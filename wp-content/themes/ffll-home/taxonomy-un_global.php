<?php use Roots\Sage\Extras; ?>
<?php var_dump(get_queried_object('term_id')); ?>
<section class="posts-list">
  <div class="supertitle">
    <h1 class="title-search"><?php single_term_title(); ?>. <?= Extras\ungrynerd_svg('icon-tag'); ?></h1>
  </div>
  <div class="container">
    <aside class="info">
      <?= Extras\ungrynerd_svg('icon-info'); ?>
      <div class="info__content">
        <p>Si quieres contactar con las mesas de <?php single_term_title(); ?> de todos los Foros Locales de Madrid, <a href="#contacto">aquí puedes hacerlo</a>. Ten en cuenta que tu mensaje llegará a las mesas de todo Madrid. Si quieres contactar con alguna específica de un distrito, <a href="<?= get_permalink(98) ?>">dirígete aquí</a>, selecciona al que quieres contactar y podrás seleccionar tu destinatario de forma individual.</p>
      </div>
    </aside>
    <?php if (have_posts()): ?>
      <?php while (have_posts()) : the_post(); ?>
        <article class="results">
          <?php get_template_part('templates/components/results', get_post_type()) ?>
        </article>
      <?php endwhile; ?>
      <?= Extras\ungrynerd_pagination(); ?>
    <?php else: ?>
      <h2>No hay resultados para tu búsqueda</h2>
    <?php endif ?>
    <aside class="info">
      <?= Extras\ungrynerd_svg('icon-info'); ?>
      <div class="info__content">
        <p>Si quieres contactar con las mesas de <?php single_term_title(); ?> de todos los Foros Locales de Madrid, <a href="#contacto">aquí puedes hacerlo</a>. Ten en cuenta que tu mensaje llegará a las mesas de todo Madrid. Si quieres contactar con alguna específica de un distrito, <a href="<?= get_permalink(98) ?>">dirígete aquí</a>, selecciona al que quieres contactar y podrás seleccionar tu destinatario de forma individual.</p>
      </div>
    </aside>
    <div class="contact-form" id="contacto">
      <?php echo do_shortcode('[contact-form-7 id="10"]'); ?>
    </div>
  </div>
</section>
