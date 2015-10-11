<style>
	


</style>
<div id="footer-container" style="width:100%">
	<div id="more-pages">
		
		<span id="more-pages-inner">	
						
				<span id="page-numbers">
			<div class="page_navi"><?php dj_pagenavi(4); ?></div>
				</span>
			
		</span>
		<div style="width:100%; height:50px;" class="aaa">
		<?php wp_list_bookmarks('title_li=&categorize=0&class=linkcat'); ?>
		</div>
	</div>
    <?php //wp_pagenavi(); ?>
	<div id="copyright">
	<a href="<?php bloginfo('url')?>/?page_id=2">关于我们</a>&nbsp;&nbsp;&nbsp;&nbsp;
		 &copy; 2014 沪ICP备09002565号  All Rights Reserved<br />
		 Websites by <?php  $options = get_option('newspoon_options');	 echo $options['copyright']?><br />
         <?php echo $options['icp']?>
         <?php echo $options['tongji']?>
	</div>
</div>
<!-- FOOTER END -->
	<div id="bg-bottom"></div>
</div><!-- /wrapper -->
<script type="text/javascript"> var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www."); document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E")); </script> <script type="text/javascript"> var pageTracker = _gat._getTracker("UA-5378021-1"); pageTracker._trackPageview(); </script> 