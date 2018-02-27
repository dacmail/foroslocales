<?php use Roots\Sage\Assets; ?>
<?php use Roots\Sage\Extras; ?>

<section class="preheader">
  <div class="container">
    <h1 class="preheader__title"><a href="<?php echo network_site_url(); ?>">Foros Locales Madrid</a></h1>
    <a href="http://madrid.es" class="preheader__logo">
      <img src="<?= Assets\asset_path('images/logo_madrid.png'); ?>" alt="Ayuntamiento de Madrid">
    </a>
  </div>
</section>
<nav class="menu nav-primary sticky-top">
  <div class="container">
    <div class="navbar navbar-expand-xl justify-content-between">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#primary-navigation" aria-controls="primary-navigation" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          &#9776;
        </span>
      </button>
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'nav navbar-nav mr-auto',
          'container_id' => 'primary-navigation',
          'container_class' => 'collapse navbar-collapse navbar-left'
        ]);
      endif;
      ?>
      <a class="follow" target="_blank" href="https://twitter.com/ForosLocales">Síguenos en twitter <?= Extras\ungrynerd_svg('icon-twitter'); ?></a>
    </div>
  </div>
</nav>
<?php if (is_front_page()): ?>
  <header class="header color-<?= rand(1,4); ?>">
    <div class="container">
      <a class="header__site-name" href="<?= esc_url(home_url('/')); ?>">
        <img src="<?= Assets\asset_path('images/logo-foros-locales.svg'); ?>" alt="<?php bloginfo('name'); ?>">
      </a>
    </div>
  </header>
<?php endif ?>