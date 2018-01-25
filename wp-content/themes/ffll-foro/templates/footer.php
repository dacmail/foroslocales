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
      <h2 class="preheader__title"><a href="<?php echo network_site_url(); ?>">Foros Locales Madrid</a></h2>
      <a href="http://madrid.es" class="preheader__logo">
        <img alt="Ayuntamiento de Madrid" src="<?= Assets\asset_path('images/logo_madrid.png'); ?>">
      </a>
    </div>
  </section>
</footer>
<?php get_template_part('templates/cookies'); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112867798-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112867798-1');
</script>


