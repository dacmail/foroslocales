<?php use Roots\Sage\Extras; ?>

<section class="page-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 class="section-title"><?php the_title(); ?>.</h2>
      </div>
      <div class="col-md-8">
        <div class="post__content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
