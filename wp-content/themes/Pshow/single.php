<?php get_header(); ?>
<section class="detail" style="width: 982px;margin: 0 auto;position: relative;">
  <div class="banner topicbanner"> <a href="/" class="mine" title="<?php bloginfo('name'); ?>"><span>回首页</span></a> <a href="<?php echo get_option('home') ?>/?random" title="随便看看" class="find" ><span>发现</span></a> <img class="indexpulldown" src="<?php bloginfo('template_directory'); ?>/images/pulldown.png" alt="pulldown"/> </div>
  <div class="detail_content" replyid="20828">
    <div class="topicInfo">
      <div class="float">
        <div class="activity hotlist">
          <div class="userid"> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a> </div>
        </div>
        <div class="des" >
          <?php all_img($post->post_content);?>
        </div>
        <div class="likeBtn"> <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' done';?>"><i>+</i></a> <img data-bd-imgshare-binded="1" src="<?php bloginfo('template_directory'); ?>/images/detail_dislike.png"> <span class="likeNum"><?php if( get_post_meta($post->ID,'bigfa_ding',true) ){            
                    echo get_post_meta($post->ID,'bigfa_ding',true);
                 } else {
                    echo '0';
                 }?></span> <span>喜欢</span> </div>
        <div class="detail_share"> </div>
      </div>
      <div class="deatil_comment">
        <?php comments_template(); ?>
      </div>
    </div>
    <div class="productImg">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php the_content("Read More..."); ?>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="topicTitle">相关推荐</div>
  <div class="activity">
    <ul>
      <?php
global $post;
$cats = wp_get_post_categories($post->ID);
if ($cats) {
    $args = array(
          'category__in' => array( $cats[0] ),
          'post__not_in' => array( $post->ID ),
          'showposts' => 8,
          'caller_get_posts' => 1
      );
  query_posts($args);
  if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>
      <li class="listimg"> <span class="txt"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 70,"..."); ?>
        <p><a href="<?php the_permalink() ?>" target="_blank" title="点击查看">点击查看</a></p>
        </span> <a href="<?php the_permalink() ?>" target="_blank" class="lista" title="<?php the_title_attribute(); ?>"> <img class="lista" alt="img" src="<?php echo mmimg(get_the_ID()); ?>" style="opacity: 1;"></a> </li>
      <?php
    }
  }
  else {
    echo '<li>* 暂无相关文章</li>';
  }
  wp_reset_query();
}
else {
  echo '<li>* 暂无相关文章</li>';
}
?>
    </ul>
  </div>
</section>
<?php get_footer(); ?>
</body></html>