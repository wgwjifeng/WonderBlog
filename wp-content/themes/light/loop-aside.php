
<div class="entry-header">
  <h1 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark">
    <?php the_title(); ?>
    </a></h1>
</div>
<div class="entry-content">
  <p style="text-indent:2em;"><?php echo mb_strimwidth(strip_tags(get_the_content()),0,500,"..."); ?></p>
</div>
