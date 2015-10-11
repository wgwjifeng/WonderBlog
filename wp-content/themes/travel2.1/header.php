<!DOCTYPE html>
<html lang="zh-CN"><!--  oncontextmenu="return false" -->
<head>
	<meta charset="UTF-8" />
	<title>	
		<?php if ( is_paged() ){ ?><?php printf( __('Page %1$s of %2$s', ''), intval( get_query_var('paged')), $wp_query->max_num_pages); ?> - <?php } ?>
		<?php if ( is_home() ) { ?><? bloginfo('name'); ?><?php } ?>
		<?php if ( is_search() ) { ?>搜索"<?php echo $s; ?>"的结果<?php } ?>
		<?php if ( is_404() ) { ?>囧！404 错误<?php } ?>
		<?php if ( is_author() ) { ?><?php _e('post list : ', ''); ?> - <? bloginfo('name'); ?><?php } ?>
		<?php if ( is_single() ) { ?><?php wp_title(''); ?> - <? bloginfo('name'); ?><?php } ?>
		<?php if ( is_page() ) { ?><?php wp_title(''); ?> - <? bloginfo('name'); ?><?php } ?>
		<?php if ( is_category() ) { ?><?php single_cat_title(); ?> - <? bloginfo('name'); ?><?php } ?>
		<?php if ( is_month() ) { ?><?php the_time('F, Y'); ?> - <? bloginfo('name'); ?><?php } ?>
		<?php if ( is_day() ) { ?><?php the_time('F j, Y'); ?> - <? bloginfo('name'); ?><?php } ?>
		<?php if ( is_tag() ) { ?><?php single_tag_title(); ?> - <? bloginfo('name'); ?><?php } ?>
	</title>
	<?php if (is_single()) {
			if ($post->post_excerpt) {
				$description = $post->post_excerpt;
			} else {
				$description = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"...");
				}
				$tags = wp_get_post_tags($post->ID);
				foreach ($tags as $tag ) {
				$keywords = $tag->name;
				}
		} else if (is_category()) {
			$description = category_description();
	}?>
	<meta name="keywords" content="<?php if (is_home()) { echo get_option('huilang_keywords');} else echo $keywords;?>"/>
	<meta name="description" content="<?php if (is_home()) { echo get_option('huilang_description');} else echo $description;?>"/>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.ico" type=image/x-icon>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class('custom-background'); ?>>
	<div id="wrap">
		<div id="header" class="clearfix">
			<div id="logo" class="sprite">
				<div class="sprite circle">
					<a href="<? bloginfo('url'); ?>" title="<? bloginfo('name'); ?>"><img src="http://0.gravatar.com/avatar/43cd5c12d28f54c4305a33dc180e648a?s=64&d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D64&r=G" alt=""></a>
				</div>
			</div>
			<div class="mod-right">
				<h1><a href="<? bloginfo('url'); ?>" title="<? bloginfo('name'); ?>"><? bloginfo('name'); ?></a></h1>
				<div class="description">
					<? bloginfo('description'); ?>
				</div>
				<div class="tools">
					<?php wp_nav_menu( array('menu_class' => 'clearfix','theme_location' => 'header_menu','menu_id' => 'header_menu')); ?>
				</div>
				<form action="<? bloginfo('url'); ?>" method="get" class="search">
					<input class="ipt-txt" type="text" name="s" value="搜索" onblur="if(this.value == '') { this.value='搜索'}" onfocus="if (this.value == '搜索') {this.value=''}" />
					<input class="icon sb " type="submit" value="" title="搜索" />
				</form>
			</div>
		</div>