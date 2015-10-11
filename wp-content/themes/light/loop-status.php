
<div class="entry-meta"><?php echo get_avatar($post->post_author, 42); ?> 日期:
  <?php the_time('Y-m-d l') ?>
  天气:<?php echo get_post_meta($post->ID, 'weather', true); ?> 地点:<?php echo get_post_meta($post->ID, 'location', true); ?> </div>
<div class="entry-content">
  <?php the_content(); ?>
</div>
