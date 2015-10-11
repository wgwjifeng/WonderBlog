
<div class="entry-header">
  <h1 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark">
    <?php the_title(); ?>
    </a></h1>
</div>
<div class="entry-thumbnails">
  <?php the_post_thumbnail(array(200,200)); ?>
</div>
<div class="entry-content">
  <?php the_content(); ?>
</div>
