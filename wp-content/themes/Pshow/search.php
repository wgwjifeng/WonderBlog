<?php get_header(); ?>
<section style="height: auto;width: 982px;margin: 0 auto;position: relative;">
  <div class="banner topicbanner"> <a href="/" class="mine" title="<?php bloginfo('name'); ?>"><span>回首页</span></a> <a href="<?php echo get_option('home') ?>/?random" class="find" title="随便看看"><span>发现</span></a> <img class="indexpulldown" src="<?php bloginfo('template_directory'); ?>/images/pulldown.png" alt="pulldown"/> </div>
  <div class="activity findlist">
    <div class="topicTitle">
      <p>
        <?php 
			if( is_search() ){
				echo '搜索词：'.get_query_var( 's' );
			}
			else if( is_date() ){
				wp_title( '' );
			}
			else single_term_title(); 
		?>
      </p>
    </div>
    <ul id="primary">
      <?php while (have_posts()) : the_post(); ?>
      <li class="listimg"> <span class="txt"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 70,"..."); ?>
        <p><a href="<?php the_permalink() ?>" target="_blank" title="点击查看">点击查看</a></p>
        </span> <a href="<?php the_permalink() ?>" target="_blank" class="lista" title="<?php the_title_attribute(); ?>"> <img class="lista" alt="img" src="<?php echo mmimg(get_the_ID()); ?>" style="opacity: 1;"></a> </li>
      <?php endwhile; ?>
    </ul>
  </div>
    <?php par_pagenavi(9); ?>
</section>
<?php get_footer(); ?>
</body></html>