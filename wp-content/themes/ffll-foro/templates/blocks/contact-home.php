<?php use Roots\Sage\Extras; ?>
<?php if (!get_theme_mod('ungrynerd_hide_contact')): ?>
  <section class="sections contact-home" id="contacto">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
          <h2 class="section-title">Contacto. <?= Extras\ungrynerd_svg('icon-email'); ?></h2>
          <?= do_shortcode('[contact-form-7 id="32" title="Contacto"]'); ?>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
