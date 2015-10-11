<?php get_header(); ?>

<section style="height: auto;width: 982px;margin: 0 auto;position: relative;">
  <div class="banner topicbanner"> <a href="/" class="mine" ><span>首页</span></a> <a href="<?php echo get_option('home') ?>/?random" class="find" ><span>发现</span></a> <img class="indexpulldown" src="<?php bloginfo('template_directory'); ?>/images/pulldown.png" alt="pulldown"/> </div>
  <div class="user-section clearfix">
  <div id="lanrenzhijia">
		<ul id="inner">
  <?php $display_categories = array(get_opt('pshow_slider')); 
        foreach ($display_categories as $category) { ?>      
        <?php query_posts("showposts=5&cat=$category"); while (have_posts()) : the_post(); ?>
       <li><a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title_attribute(); ?>"> <img src="<?php echo mmimg(get_the_ID()); ?>" width="800" height="300"></a></li>
         <?php endwhile; ?>
<?php } wp_reset_query();?>
       
		</ul>
	</div>
 <div id="col-side">
            <img src="<?php bloginfo('template_directory'); ?>/images/weixin.png" width="218px" height="280px">
</div> 
 </div> 
<?php $display_categories = explode(',', get_opt('pshow_index')); 
        foreach ($display_categories as $category) { ?>
<?php query_posts("showposts=8&cat=$category")?>
  <div class="activity findlist">
    <div id="JTopic-398" class="follow"> <span><?php if( get_post_meta($post->ID,'bigfa_ding',true) ){            
                    echo get_post_meta($post->ID,'bigfa_ding',true);
                 } else {
                    echo '0';
                 }?></span><span>人点赞 </span><a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' done';?>"><i onclick="follow(398)">+</i></a> </div>
    <div class="topicTitle"> <a href="<?php echo get_category_link($category);?>" target="_blank"><p><?php single_cat_title(); ?></p></a> </div>
    <ul id="primary">
    <?php while (have_posts()) : the_post(); ?>
      <li class="listimg">
      <span class="txt"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 70,"..."); ?><p><a href="<?php the_permalink() ?>" target="_blank" title="点击查看">点击查看</a></p></span>
      <a href="<?php the_permalink() ?>" target="_blank" class="lista" title="<?php the_title_attribute(); ?>"> <img class="lista" alt="img" src="<?php echo mmimg(get_the_ID()); ?>" style="opacity: 1;"></a>
      </li>
  <?php endwhile; ?>
    </ul>
  </div>
  <?php } wp_reset_query();?>
</section>
    <?php get_footer(); ?>
    
    
    
</body>
</html>

