<?php use Roots\Sage\Assets; ?>
<?php use Roots\Sage\Extras; ?>
<footer class="footer">
  <div class="container">
    <section class="logo-menu">
      <a class="blog-name" href="<?= esc_url(home_url('/')); ?>">
        <?php bloginfo('name'); ?>
      </a>
      <nav class="navbar">
        <?php
          if (has_nav_menu('footer_navigation')) :
            wp_nav_menu([
              'theme_location' => 'footer_navigation',
              'menu_class' => 'nav',
              'container_id' => 'footer-nav',
              'container_class' => 'navbar-right',
            ]);
          endif;
          ?>
      </nav>
    </section>
  </div>
  <div class="footer-bg"></div>
  <section class="preheader">
    <div class="container">
      <h2 class="preheader__title">Foros Locales Madrid</h2>
      <a href="http://madrid.es" class="preheader__logo">
        <img  src="<?= Assets\asset_path('images/logo_madrid.png'); ?>">
      </a>
    </div>
  </section>
</footer>
