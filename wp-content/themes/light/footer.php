<div id="body">
  <div id="superbgimage" >
    <?php
    $header_image = get_header_image();
	if ( empty( $header_image ) ): ?>
    <?php else : ?>
    <img src="<?php header_image(); ?>" style="z-index:2;" />
    <?php endif; ?>
  </div>
  <div class="overlay"></div>
  <div class="footer-main">©<a href="<?php bloginfo('url'); ?>">
    <?php bloginfo('name'); ?>
    </a> | <a href="http://wordpress.org/">WordPress</a> | <a href="http://blog.wwawwa.com/" target="_blank">Theme</a></div>
</div>
<script src="<?php bloginfo('template_url'); ?>/jquery.superbgimage.min.js"></script> 
<script>
 if($('.entry-content a[rel!=link]:has(img)').length > 0){
            $.getScript("<?php bloginfo('template_directory') ?>/slimbox2.js",function(){ 
			$(".entry-content a:has(img)").filter(function() {
			return /\.(jpg|png|gif)$/i.test(this.href);
		}).slimbox({}, null, function(el) {
			return (this == el) || (this.parentNode && (this.parentNode == el.parentNode));
		});
	});
  }  
</script> 
<?php echo stripslashes(get_option('mytheme_javaScriptcss')); ?> <?php echo stripslashes(get_option('mytheme_analytics')); ?>
<?php wp_footer(); ?>
<!--[if IE 6]>
	<script src="http://letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</body></html>