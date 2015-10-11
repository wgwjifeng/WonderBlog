<footer class="footer">
  <div class="footer-wrap">
    <div class="footer-logo"> <a title="入驻" href="<?php echo get_opt('pshow_join', 'http://meowooh.com/'); ?>" rel="nofollow"></a> </div>
    <div class="word">
      <p class="say">"
        <?php bloginfo('description'); ?>
        "</p>
      <p class="auther">by<em>
        <?php bloginfo('name'); ?>
        </em></p>
    </div>
    <div class="copyright"> <?php echo get_opt('pshow_footer', 'Copyright 2015 版权所有 meowooh.com 你可以在后台底部设置中修改此处'); ?></div>
    <div class="friend-link" >
      <h3>友情链接：</h3>
      <!--wp-compress-html--><!--wp-compress-html no compression-->
      <?php wp_list_bookmarks('title_li=&categorize=0&before=<span>&after=</span>&orderby=rand&limit=8' ); ?>
      <!--wp-compress-html no compression--><!--wp-compress-html-->
    </div>
  </div>
</footer>
<a class="gotop" href="#" style="display:none">回到顶部</a> 
<!--wp-compress-html--><!--wp-compress-html no compression-->
<script type="text/javascript" src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/gotop.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/js/slider.js"></script> 
<script>
    var minePage = 0, findPage = 0;
    var canAdd = false, isLasted = false;
    $("header").hide();
    $(".indexpulldown").bind("click", function () {
        $("header").toggle(0, function () {
            $(".indexpulldown").css("top", "10px").attr("src", "<?php bloginfo('template_directory'); ?>/images/closeheader.png");
        });
        if ($("header").is(":visible") == false) {
            $(".indexpulldown").css("top", "8px").attr("src", "<?php bloginfo('template_directory'); ?>/images/pulldown.png");
        }
    });
    $(".indexpulldown").bind("mouseover", function () {
        $(".indexpulldown").css("top", parseInt($(".indexpulldown").css("top")) + 4);
    })
    $(".indexpulldown").bind("mouseleave", function () {
        $(".indexpulldown").css("top", parseInt($(".indexpulldown").css("top")) - 4);
    })
	// Thumbnail
</script> 
<!--wp-compress-html no compression--><!--wp-compress-html-->