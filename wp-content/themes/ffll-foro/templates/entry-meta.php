<div class="post__meta">
  <?php if (get_post_type()!=='event'): ?>
      <time class="post__date"><?php the_time(get_option('date_format')); ?></time>
  <?php endif ?>
  <p class="post__author"><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?= get_the_author(); ?></a></p>
  <div class="post__share">
    Compartir
    <ul>
      <li><a href="#" target="_blank">Twitter</a></li>
      <li><a href="#" target="_blank">Facebook</a></li>
      <li><a href="#" target="_blank">Email</a></li>
      <li><a href="#" target="_blank">WhatsApp</a></li>
    </ul>
  </div>
</div>
