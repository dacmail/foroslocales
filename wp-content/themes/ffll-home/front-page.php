<?php use Roots\Sage\Extras; ?>
<?php use Roots\Sage\Assets; ?>

<section class="introduccion" id="introduccion">
  <div class="container">
    <div class="row">
      <?php while (have_posts()) : the_post(); ?>
      <div class="col-sm-3">
        <h1 class="section-title"><?php the_title(); ?></h1>
      </div>
      <div class="col-sm-9">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
    </div>
  </div>
</section>

