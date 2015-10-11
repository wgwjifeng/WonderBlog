<?php
/*
Template Name:links
*/
?>
<?php get_header(); ?>

<div id="content">
  <div id="post-<?php the_ID(); ?>" class="post">
    <div class="entry-content">
      <div class="page_links">
        <ul>
          <?php wp_list_bookmarks('title_li=&categorize=0&show_description=1'); ?>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<?php get_footer(); ?>
