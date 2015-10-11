<?php get_header(); ?>

<div id="content">
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" class="post">
    <div class="entry-header">
      <h1 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
        <?php the_title(); ?>
        </a></h1>
    </div>
    <div class="entry-content">
      <?php the_content(''); ?>
    </div>
    <div class="clear"></div>
    <div class="entry-meta">
      <p>
        <?php the_time('Y-m-d H:i:G'); ?>
      </p>
      <?php the_category(' &bull; ') ?>
      <?php the_tags(' | ',' &bull; ',' | '); ?>
      <?php comments_popup_link(__('0 Notes'), __('1 Notes'), __('%  Notes')); ?>
      <?php edit_post_link('编辑', ' | ', ''); ?>
    </div>
    <div class="clear"></div>
  </div>
  <?php comments_template(); ?>
  <div id="nav-below">
    <div class="nav-next">
      <?php previous_post_link('%link','Next'); ?>
    </div>
    <div class="nav-prev">
      <?php next_post_link('%link','Previous'); ?>
    </div>
  </div>
  <?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>
