<?php get_header(); ?>

<div id="content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-type"></div>
    <?php get_template_part( 'loop', get_post_format() ); ?>
    <div class="clear"></div>
    <div class="entry-meta"> <a href="<?php the_permalink();?>">
      <?php the_time('Y-m-d H:i:G'); ?>
      </a>|
      <?php comments_popup_link(__('0 Notes'), __('1 Notes'), __('%  Notes')); ?>
      <br/>
      <a href="<?php the_permalink();?>"> LOOK </a> </div>
    <div class="clear"></div>
  </div>
  <?php endwhile; ?>
  <?php if ( $wp_query->max_num_pages > 1  ) { ?>
  <div id="nav-below">
    <div class="nav-next">
      <?php previous_posts_link('Next', 0); ?>
    </div>
    <div class="nav-prev">
      <?php next_posts_link('Previous', 0); ?>
    </div>
  </div>
  <?php }?>
  <?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
