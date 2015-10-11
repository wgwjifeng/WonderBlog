<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>
<?php global $page, $paged;wp_title( '|', true, 'right' );bloginfo( 'name' );$site_description = get_bloginfo( 'description', 'display' );if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( '第 %s 页'), max( $paged, $page ) );?>
</title>
<?php if (is_home()){ 
    $description = get_option('mytheme_description');
    $keywords = get_option('mytheme_keywords');
} elseif (is_single()){    
    $description =  substr(strip_tags($post->post_content),0,220);
    $keywords = ""; 
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ", ";
    }
}
?>
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="Feedsky RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">
<div id="header">
  <h1 id="site-title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
    <?php bloginfo('name'); ?>
    </a></h1>
  <?php wp_nav_menu( array('container_id' => 'menu')); ?>
</div>
<div class="clear"></div>
