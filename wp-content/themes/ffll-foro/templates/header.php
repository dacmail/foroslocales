<?php use Roots\Sage\Assets; ?>
<?php use Roots\Sage\Extras; ?>

<section class="preheader">
  <div class="container">
    <h2 class="preheader__title"><a href="<?php echo network_site_url(); ?>">Foros Locales Madrid</a></h2>
    <a href="http://madrid.es" class="preheader__logo">
      <img alt="Ayuntamiento de Madrid" src="<?= Assets\asset_path('images/logo_madrid.png'); ?>">
    </a>
  </div>
</section>
<nav class="menu nav-primary sticky-top">
  <div class="container">
    <div class="navbar navbar-toggleable-md justify-content-between">
      <span class="blog-name"><?php bloginfo('name'); ?></span>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          &#9776;
        </span>
      </button>
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'nav navbar-nav ml-auto',
          'container_id' => 'primary-nav',
          'container_class' => 'collapse navbar-collapse navbar-right',
          'items_wrap' => '<div class="search-wrapper">' . get_search_form(false) . '<a href="#" class="search__close">' . Extras\ungrynerd_svg('icon-close') . '</a></div><ul id="%1$s" class="%2$s">%3$s</ul>'
        ]);
      endif;
      ?>
    </div>
  </div>
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
