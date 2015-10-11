<div id="footer">
		<?php if ( is_home() ) { ?>
		<span id="load-more" class="icon load-more"></span>
		<?php } elseif ( is_single() ) {?>
			<div class="sprite navigation"> 
				<a class="btn-nav-prev" href="<?php echo get_previous_posts_page_link(); ?>" title="上一页"><span>上一篇</span></a>
				<a href="<?php echo get_next_posts_page_link(); ?>" title="下一页" class="btn-nav-next"><span>下一篇</span></a> 
			</div>
		<?php } elseif ( is_page() ) {?>
		<?php } else {?>
			<div class="sprite navigation" id="arc"> 
				<a class="btn-nav-prev" href="<?php echo get_previous_posts_page_link(); ?>" title="上一页"><span>上一页</span></a>
				<a href="<?php echo get_next_posts_page_link(); ?>" title="下一页" class="btn-nav-next"><span>下一页</span></a> 
			</div>
		<?php } ?>
		<div class="copyright">
			&copy; <a href="<? bloginfo('url'); ?>" title="<? bloginfo('name'); ?>"><? bloginfo('name'); ?></a> <span class="icon" title="Powered by">&#10084;</span> <a href="http://www.wordpress.org/" title="wordpress" target="_blank">Wordpress</a>
			<span class="icon" title="Themed by">&#10047</span> Theme Travel v1.0 by <a href="http://huilang.me/" title="人生就像一副复杂拼图,每个人总有属于自己的记忆碎片!" target="_blank">记忆碎片</a>
		</div>
	</div>
</div>



<script type="text/javascript">
$('body').on('click','.post-main',function () {
	if (this.getAttribute ('data-type') != 'audio') {
		location.href=this.getAttribute ('data-url');
	}
});



$('.pages').hover(function () {
	$('.pages ul').stop().show('fast');
},function () {
	$('.pages ul').stop().hide('fast');
});

$('.search').hover(function () {
	$('.search .ipt-txt').stop().animate({width:110});
},function () {
	if ($('.search .ipt-txt:focus').length==0) {
		$('.search .ipt-txt').stop().animate({width:1});
	}
});
$('.search .ipt-txt').blur(function () {
	$('.search .ipt-txt').stop().animate({width:1});
});
<?php if ( is_home() ) { ?>
	<?php $max_page = $wp_query->max_num_pages; ?>
	var i=2;
	var max_pages= <?php echo $max_page; ?>;
	if (max_pages) {
		$('#load-more').click(function () {
			if ((max_pages/i) < 1) {
				this.className = 'nopages';
				this.innerHTML='The End';
				$(this).unbind('click');
				return false;
			}
			var _this = this;

			_this.className = 'loading';

			var url = '?action=ajax_post&pag='+i;
			$.get(url, function(data) {
				i++;
				$('#main').append(data);
				_this.className = 'icon load-more';

				if ((pmax_pages/i) >= 1) {
					_this.className = 'nopages';
					_this.innerHTML='The End';
					$(_this).unbind('click');
				}
			}); 
		})
	}
<?php } ?>
</script>
<?php wp_footer(); ?>
</body>
</html>