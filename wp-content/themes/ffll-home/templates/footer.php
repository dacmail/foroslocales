<?php use Roots\Sage\Assets; ?>
<?php use Roots\Sage\Extras; ?>
<footer class="footer">
  <div class="container">
    <section class="logo-menu">
      <nav class="navbar navbar-expand-md">
        <?php
        if (has_nav_menu('footer_navigation')) :
          wp_nav_menu([
            'theme_location' => 'footer_navigation',
            'menu_class' => 'nav navbar-nav mr-auto',
            'container_id' => 'foot-nav',
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
        <img alt="Foros Locales Madrid" src="<?= Assets\asset_path('images/logo_madrid.png'); ?>">
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

