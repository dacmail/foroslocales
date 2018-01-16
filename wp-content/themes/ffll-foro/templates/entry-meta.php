<div class="post__meta">
  <?php if (get_post_type()!=='event'): ?>
      <span class="post__date"><?php the_time(get_option('date_format')); ?></span>
  <?php endif ?>
  <div class="post__share">
    Compartir
    <ul>
      <li><a href="https://twitter.com/home?status=<?= urlencode(get_the_title()) . ' ' . urlencode(get_permalink()); ?>" target="_blank">Twitter</a></li>
      <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()); ?>" target="_blank">Facebook</a></li>
      <li><a href="mailto:?subject=<?= urlencode(get_the_title()) ?>&body=<?= urlencode(get_permalink()); ?>" target="_blank">Email</a></li>
      <li><a href="https://api.whatsapp.com/send?text=<?= get_the_title() . ' ' . urlencode(get_permalink()); ?>" target="_blank">WhatsApp</a></li>
    </ul>
  </div>
</div>
