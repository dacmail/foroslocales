<?php use Roots\Sage\Assets; ?>

<section class="preheader">
  <div class="container">
    <h2 class="preheader__title">Foros Locales Madrid</h2>
    <a href="http://madrid.es" class="preheader__logo">
      <img  src="<?= Assets\asset_path('images/logo_madrid.png'); ?>">
    </a>
  </div>
</section>
<nav class="menu nav-primary">
  <?php
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
  endif;
  ?>
</nav>
<header class="header" style="background-color: #<?php header_textcolor(); ?>;">
  <div class="container" style="background-image:url(<?php header_image(); ?>);">
    <?php if (has_custom_logo()): ?>
      <?php the_custom_logo(); ?>
    <?php else: ?>
      <a class="header__site-name" href="<?= esc_url(home_url('/')); ?>">
        <?php bloginfo('name'); ?>
      </a>
    <?php endif ?>
  </div>
</header>
