<?php get_header(); ?>
	<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile;?>
		<?php else:?>
			<div class="sprite no-result">啊~ , 我还木有去过那里 o(&gt;﹏&lt;)o <a href="javascript:history.go(-1);" class="back">返回</a></div>
		<?php endif;?>
	</div>
<?php get_footer(); ?>