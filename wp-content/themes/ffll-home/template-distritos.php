<?php /* Template Name: Listado de Distritos*/ ?>
<?php use Roots\Sage\Extras; ?>
<?php use Roots\Sage\Assets; ?>

<section class="distritos" id="distritos">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="section-title">Distritos. <?= Extras\ungrynerd_svg('icon-pointer'); ?></h1>
        <ul class="distritos__list">
          <li class="blog-21"><a target="_blank" id="arganzuela-link" href="<?php echo site_url('arganzuela'); ?>">Arganzuela</a>    </li>
          <li class="blog-22"><a target="_blank" id="barajas-link" href="<?php echo site_url('barajas'); ?>">Barajas</a>    </li>
          <li class="blog-23"><a target="_blank" id="carabanchel-link" href="<?php echo site_url('carabanchel'); ?>">Carabanchel</a>    </li>
          <li class="blog-24"><a target="_blank" id="centro-link" href="<?php echo site_url('centro'); ?>">Centro</a>    </li>
          <li class="blog-25"><a target="_blank" id="chamartin-link" href="<?php echo site_url('chamartin'); ?>">Chamartín</a>    </li>
          <li class="blog-26"><a target="_blank" id="chamberi-link" href="<?php echo site_url('chamberi'); ?>">Chamberí</a>    </li>
          <li class="blog-27"><a target="_blank" id="ciudad-lineal-link" href="<?php echo site_url('ciudad-lineal'); ?>">Ciudad Lineal</a>    </li>
          <li class="blog-28"><a target="_blank" id="fuencarral-el-pardo-link" href="<?php echo site_url('fuencarral-el-pardo'); ?>">Fuencarral - El Pardo</a>    </li>
          <li class="blog-32"><a target="_blank" id="hortaleza-link" href="<?php echo site_url('hortaleza'); ?>">Hortaleza</a>    </li>
          <li class="blog-33"><a target="_blank" id="latina-link" href="<?php echo site_url('latina'); ?>">Latina</a>    </li>
          <li class="blog-34"><a target="_blank" id="moncloa-aravaca-link" href="<?php echo site_url('moncloa-aravaca'); ?>">Moncloa - Aravaca</a>    </li>
          <li class="blog-35"><a target="_blank" id="moratalaz-link" href="<?php echo site_url('moratalaz'); ?>">Moratalaz</a>    </li>
          <li class="blog-36"><a target="_blank" id="retiro-link" href="<?php echo site_url('retiro'); ?>">Retiro</a>    </li>
          <li class="blog-37"><a target="_blank" id="salamanca-link" href="<?php echo site_url('salamanca'); ?>">Salamanca</a>    </li>
          <li class="blog-38"><a target="_blank" id="san-blas-canillejas-link" href="<?php echo site_url('san-blas-canillejas'); ?>">San Blas - Canillejas</a>    </li>
          <li class="blog-39"><a target="_blank" id="tetuan-link" href="<?php echo site_url('tetuan'); ?>">Tetuan</a>    </li>
          <li class="blog-40"><a target="_blank" id="usera-link" href="<?php echo site_url('usera'); ?>">Usera</a>    </li>
          <li class="blog-41"><a target="_blank" id="vicalvaro-link" href="<?php echo site_url('vicalvaro'); ?>">Vicálvaro</a>    </li>
          <li class="blog-42"><a target="_blank" id="villa-de-vallecas-link" href="<?php echo site_url('villa-de-vallecas'); ?>">Villa de Vallecas</a>    </li>
          <li class="blog-43"><a target="_blank" id="villaverde-link" href="<?php echo site_url('villaverde'); ?>">Villaverde</a>    </li>
          <li class="blog-44"><a target="_blank" id="puente-de-vallecas-link" href="<?php echo site_url('puente-de-vallecas'); ?>">Puente de Vallecas</a>    </li></ul>
      </div>
      <div class="col-md-6">
        <div class="map">
          <?= Extras\ungrynerd_svg('mapa'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
