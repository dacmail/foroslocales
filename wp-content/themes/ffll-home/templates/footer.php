<?php use Roots\Sage\Assets; ?>
<?php use Roots\Sage\Extras; ?>
<footer class="footer">
  <div class="container">
    <section class="logo-menu">
      <nav class="navbar navbar-expand-md">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'nav navbar-nav mr-auto',
            'container_id' => 'primary-nav',
            'container_class' => 'navbar-collapse navbar-left'
          ]);
        endif;
        ?>
      </nav>
      <a class="follow" target="_blank" href="https://twitter.com/ForosLocales">Síguenos en twitter <?= Extras\ungrynerd_svg('icon-twitter'); ?></a>
    </section>
  </div>
  <div class="footer-bg"></div>
  <section class="preheader">
    <div class="container">
      <h2 class="preheader__title">Foros Locales Madrid</h2>
      <a href="http://madrid.es" class="preheader__logo">
        <img src="<?= Assets\asset_path('images/logo_madrid.png'); ?>">
      </a>
    </div>
  </section>
</footer>
