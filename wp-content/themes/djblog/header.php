<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--  HEAD BEGIN -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/rss+xml" title="Amelia Lyon Photography Blog - RSS" href="<?php bloginfo('info')?>/rss.xml" />
<?php
	 $options = get_option('newspoon_options');	
	 
	 
	 if ($options['djwp_if_seo'] == '1') { ?>
<title>
<?php if ( is_home() ) { ?>
<?php if( $options['djwp_homepage_title'] ) { echo $options['djwp_homepage_title']; } else { bloginfo('description'); } ?>
<?php } ?>
<?php if ( is_search() ) 
{?>
有关"<?php echo $s; ?>"的搜索结果
<?php if( $options['djwp_homepage_keywords_separater'])
{
 echo $options['djwp_homepage_keywords_separater']; 
 } 
 else 
 { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_404() ) { ?>
404页面
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_author() ) { ?>
作者文章列表
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php single_post_title(''); ?>
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_page() ) { ?>
<?php single_post_title(''); ?>
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_category() ) { ?>
<?php single_cat_title(); ?>
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_year() ) { ?>
"
<?php the_time('Y'); ?>
"时间的文章列表
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_month() ) { ?>
"
<?php the_time('F, Y'); ?>
"时间的文章列表
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_day() ) { ?>
"
<?php the_time('F j, Y'); ?>
"时间的文章列表
<?php if( $options['djwp_homepage_keywords_separater'] ){ echo $options['djwp_homepage_keywords_separater']; } else { echo " - ";} ?>
<?php bloginfo('name'); ?>
<?php } ?>
</title>
<?php

if (is_home()) { 

	if( $options['djwp_homepage_description'] ){ $homepage_description = $options['djwp_homepage_description']; }

	if( $options['djwp_homepage_keywords'] ){ $homepage_keywords = $options['djwp_homepage_keywords']; }

    //将会把转变双引号和单引号的以及html标签转为html实体
	$description = htmlentities(strip_tags(trim( $homepage_description )),ENT_QUOTES,'UTF-8');

	$keywords = htmlentities(strip_tags(trim( $homepage_keywords )),ENT_QUOTES,'UTF-8');

} elseif (is_single()) {

	if ( get_post_meta($post->ID, "description", $single = true) != "" )

	{

		$description = get_post_meta($post->ID, "description", $single = true);

	} else {

		$description = djwp_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 130,"...");

	}

	if ( get_post_meta($post->ID, "keywords", $single = true) != "" )

	{

		$keywords = get_post_meta($post->ID, "keywords", $single = true);

	} else {	

		$tags = wp_get_post_tags($post->ID);
		$count = count($tags);
		$i=1;
		foreach ($tags as $tag ) {
			if($i==$count){
				$keywords = $keywords . $tag->name;
			} else {
				$keywords = $keywords . $tag->name . ",";
			}
		}

	}

} else if (is_page()) {

	if ( get_post_meta($post->ID, "description", $single = true) != "" )

	{

		$description = get_post_meta($post->ID, "description", $single = true);

	}

	if ( get_post_meta($post->ID, "keywords", $single = true) != "" )

	{

		$keywords = get_post_meta($post->ID, "keywords", $single = true);

	}

} else if (is_category()) {
	$description = htmlentities(strip_tags(trim(category_description())),ENT_QUOTES,'UTF-8');
}

?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<?php } else { ?>
<title>
<?php if ( is_home() ) { ?>
<?php bloginfo('name'); ?>
-
<?php bloginfo('description'); ?>
<?php } ?>
<?php if ( is_search() ) { ?>
有关"<?php echo $s; ?>"的搜索结果 -
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_404() ) { ?>
404页面 -
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_author() ) { ?>
作者文章列表 -
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php single_post_title(''); ?>
-
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_page() ) { ?>
<?php single_post_title(''); ?>
-
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_category() ) { ?>
<?php single_cat_title(); ?>
-
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_year() ) { ?>
"
<?php the_time('Y'); ?>
"时间的文章列表 -
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_month() ) { ?>
"
<?php the_time('F, Y'); ?>
"时间的文章列表 -
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_day() ) { ?>
"
<?php the_time('F j, Y'); ?>
"时间的文章列表 -
<?php bloginfo('name'); ?>
<?php } ?>
</title>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/darkroom/blog/css/style.css" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/darkroom/blog/css/style-ie.css" media="screen" />
	<![endif]-->
<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/darkroom/blog/css/style-ie6.css" media="screen" />
	<![endif]-->
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/ITDR.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/SuckerFish.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/CommentSpace.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/Cookie.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/Comments.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/SWFObject.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/FlashHeader.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/AjaxConnection.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/TwitterFeed.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/common/js/ImageReplace.js" type="text/javascript"></script>
<script src="mt.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/darkroom/blog/js/setup.js" type="text/javascript"></script>
<!--  HEAD END -->
</head>
<body>
<div id="wrapper" style="width:1000px">
<div id="bg-top"></div>
<!--  HEADER BEGIN -->
<div id="header"> <img src="<?php bloginfo('template_url');?>/images/banner.jpg" > </div>
<!--  HEADER END -->
<!-- NAVIGATION BEGIN -->
<div id="navigation-container">
  <div id="header-phrase"> <a href="<?php bloginfo('url')?>">首页</a> </div>
  <div id="navigation" style="none">
    <ul>
      <?php

    $cats = $wpdb->get_results("SELECT {$wpdb->prefix}terms.term_id, name
                            FROM {$wpdb->prefix}term_taxonomy, {$wpdb->prefix}terms
                            WHERE {$wpdb->prefix}term_taxonomy.term_id = {$wpdb->prefix}terms.term_id
                            AND taxonomy = 'category' order by term_id");
                            
    if($cats) {
        foreach($cats as $cat) {
			
			echo '<li><a href="'.get_category_link($cat->term_id).'" title="'.$cat->name.'"><span class="NavigationReplace">'.$cat->name.'&nbsp;&nbsp;|&nbsp;&nbsp;</span></a></li>';
        }
    }
?>
      <li style=""><a href="?page_id=2" title="" target="_self"><span class="NavigationReplace">关于我们&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
    </ul>
  </div>
</div>
<!-- NAVIGATION END -->
<div id="content">
<!--  TWITTER BEGIN -->
<div id="twitter-container">
<div id="twitter" style="float:right">
  <table>
    <tr>
      <td><a href="#"><img src="<?php bloginfo('template_url')?>/images/a.gif"></a> </td>
      <td></td>
      <td></td>
      <td><a href="#"><img src="<?php bloginfo('template_url')?>/images/b.gif"></a> </td>
      <td></td>
      <td></td>
      <td><a href="#"><img src="<?php bloginfo('template_url')?>/images/c.gif"></a> </td>
      <td></td>
      <td></td>
      <td><a href="#"><img src="<?php bloginfo('template_url')?>/images/d.gif"></a> </td>
      <td></td>
      <td></td>
      <td><a href="#"><img src="<?php bloginfo('template_url')?>/images/e.gif"></a> </td>
      <td></td>
      <td></td>
      <td><a href="#"><img src="<?php bloginfo('template_url')?>/images/f.gif"></a> </td>
    </tr>
  </table>
</div>
<div id="search-form">
  <form id="form" method="get" action="<?php bloginfo('url'); ?>">
    <input type="hidden" name="IncludeBlogs" value="1" />
    <input id="search" class="search-box" name="s" size="23" />
    <input type="submit" value="" class="submit" />
  </form>
  <span id="search-this-blog"></span> </div>
<!-- search-form -->
