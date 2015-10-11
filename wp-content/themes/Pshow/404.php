<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' );?>">
<?php echo get_opt('pshow_meta'); ?>
<?php get_template_part( 'seo' ); ?>
<link type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon">
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css">
<?php wp_head();?>
</head>
<body class="sharePost-page">
<header class="header">
        <div class="info-bar">
        	<h1><a class="logo" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a></h1>
        </div>
</header>
<section class="page-error">
	<h2>抱歉，你访问的页面不存在! <a href="/">去首页逛逛</a></h2>
    <div class="error-404">   
    </div>
</section>
</body></html>