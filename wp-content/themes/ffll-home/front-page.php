<?php use Roots\Sage\Extras; ?>
<?php use Roots\Sage\Assets; ?>

<section class="distritos" id="distritos">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="section-title">Distritos. <?= Extras\ungrynerd_svg('icon-pointer'); ?></h2>
        <ul class="distritos__list">
          <li class="blog-21"><a target="_blank" id="arganzuela" href="<?php echo site_url('arganzuela'); ?>">Arganzuela</a>    </li>
          <li class="blog-22"><a target="_blank" id="barajas" href="<?php echo site_url('barajas'); ?>">Barajas</a>    </li>
          <li class="blog-23"><a target="_blank" id="carabanchel" href="<?php echo site_url('carabanchel'); ?>">Carabanchel</a>    </li>
          <li class="blog-24"><a target="_blank" id="centro" href="<?php echo site_url('centro'); ?>">Centro</a>    </li>
          <li class="blog-25"><a target="_blank" id="chamartin" href="<?php echo site_url('chamartin'); ?>">Chamartín</a>    </li>
          <li class="blog-26"><a target="_blank" id="chamberi" href="<?php echo site_url('chamberi'); ?>">Chamberí</a>    </li>
          <li class="blog-27"><a target="_blank" id="ciudad-lineal" href="<?php echo site_url('ciudad-lineal'); ?>">Ciudad Lineal</a>    </li>
          <li class="blog-28"><a target="_blank" id="fuencarral-el-pardo" href="<?php echo site_url('fuencarral-el-pardo'); ?>">Fuencarral - El Pardo</a>    </li>
          <li class="blog-32"><a target="_blank" id="hortaleza" href="<?php echo site_url('hortaleza'); ?>">Hortaleza</a>    </li>
          <li class="blog-33"><a target="_blank" id="latina" href="<?php echo site_url('latina'); ?>">Latina</a>    </li>
          <li class="blog-34"><a target="_blank" id="moncloa-aravaca" href="<?php echo site_url('moncloa-aravaca'); ?>">Moncloa - Aravaca</a>    </li>
          <li class="blog-35"><a target="_blank" id="moratalaz" href="<?php echo site_url('moratalaz'); ?>">Moratalaz</a>    </li>
          <li class="blog-36"><a target="_blank" id="retiro" href="<?php echo site_url('retiro'); ?>">Retiro</a>    </li>
          <li class="blog-37"><a target="_blank" id="salamanca" href="<?php echo site_url('salamanca'); ?>">Salamanca</a>    </li>
          <li class="blog-38"><a target="_blank" id="san-blas-canillejas" href="<?php echo site_url('san-blas-canillejas'); ?>">San Blas - Canillejas</a>    </li>
          <li class="blog-39"><a target="_blank" id="tetuan" href="<?php echo site_url('tetuan'); ?>">Tetuan</a>    </li>
          <li class="blog-40"><a target="_blank" id="usera" href="<?php echo site_url('usera'); ?>">Usera</a>    </li>
          <li class="blog-41"><a target="_blank" id="vicalvaro" href="<?php echo site_url('vicalvaro'); ?>">Vicálvaro</a>    </li>
          <li class="blog-42"><a target="_blank" id="villa-de-vallecas" href="<?php echo site_url('villa-de-vallecas'); ?>">Villa de Vallecas</a>    </li>
          <li class="blog-43"><a target="_blank" id="villaverde" href="<?php echo site_url('villaverde'); ?>">Villaverde</a>    </li>
          <li class="blog-44"><a target="_blank" id="puente-de-vallecas" href="<?php echo site_url('puente-de-vallecas'); ?>">Puente de Vallecas</a>    </li></ul>
      </div>
      <div class="col-md-6">
        <div class="map">
          <?= Extras\ungrynerd_svg('mapa'); ?>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="claves" id="temas">
  <div class="container">
    <div class="col-sm-12">
      <h2 class="section-title">Temas. <?= Extras\ungrynerd_svg('icon-tag'); ?></h2>
      <?php $claves = get_terms('un_global', array('hide_empty' => 0)); ?>
      <ul class="claves__list">
      <?php foreach ($claves as $clave): ?>
        <li><a href="<?php echo get_term_link($clave); ?>"><?php echo $clave->name; ?></a></li>
      <?php endforeach ?>
      </ul>
    </div>
  </div>
</section>
