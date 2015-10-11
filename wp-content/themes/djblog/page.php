<?php get_header(); ?> 
<!--  ENTRY SUMMARY BEGIN -->
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="EntrySingle">
	<!--<div class="TitleDate">
		<div class="Title"><a href="<?php the_permalink() ?>"><span class="TitleReplace"><?php the_title(); ?></span></a></div>
		<div class="DateStamp"><span class="DateReplace"><?php the_time("Y-m-d"); ?></span></div>
	</div>-->
	<div class="Entry" id="entry-489">
    
			<div class="TitleEntry"><a href="<?php the_permalink() ?>"><span class="TitleReplace"><?php the_title(); ?></span></a></div>
<!-- ENTRY META BEGIN -->
<div class="EntryMeta">
	<span class="ByLine">

		<span>By <?php the_author(); ?> &nbsp;<?php the_time("Y-m-d: h:i:s"); ?>
		
		

		

	</span>	

	
</div>
<!-- ENTRY META END -->
		
		<div class="EntryContent">
			<div class="EntryContentBody"><?php the_content() ?>
  <span class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></span>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script></span>				
	
上一篇：<?php next_post_link('%link') ?> 
  
<div style="float:right">下一篇：<?php previous_post_link('%link') ?></div> 
			</div>


		</div>
	</div>
</div>
<!--  ENTRY SUMMARY END -->


</div>
  <?php endwhile; ?>

          <?php else : ?>
             <li>

            <div class="ttl"><a href="#" target="_blank"> ��Ǹ��û���ҵ��κ����£�</a></div>

            <div class="timestamp">

              <?php date(Y-m-d,time());?>

            </div>

            <div style="clear:both"></div>

            <span></span> </li>

          <?php endif; ?>
<!-- /content -->
<!-- FOOTER BEGIN -->
<?php get_footer(); ?>
