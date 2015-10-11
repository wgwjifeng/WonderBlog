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
<body>
<header class="header-common"  isList="">
  <div class="decorate-bar"></div>
  <div class="header-bar">
    <div class="info-bar clearfix">
      <div class="firstheader">
        <h1><a class="logo" href="/"> <img src="<?php bloginfo('template_directory'); ?>/images/logo.png"> </a></h1>
        <!--<div class="user-panel">
          <div class="logined" style="position: relative;top:0;z-index:4567;">
            <ul class="want-login">
              <li class="hovertag register"><a type="register" href="/"  rel="nofollow">注册</a></li>
              <li class="hovertag login"><a type="login" id="J_popLogin" class=""   href="/" rel="nofollow">登录</a></li>
            </ul>
          </div>
        </div>-->
      </div>
      <div class="secondheader"> 
        <!--search -->
        <div class="centerSecondHeader">
          <div class="searchWrap searchColor">
            <div class="search">
              <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <input type="text" name="s" id="s" class="searchText" label="搜索宝贝"/>
              <input id="searchsubmit" type="submit" value="" class="submit"/>
			</form>
            </div>
          </div>
          <!--search end -->
          <div class="nav-bar">
            <nav class="nav clearfix">

              	<?php 
			$top_nav = wp_nav_menu( array( 'theme_location'=>'main', 'fallback_cb'=>'', 'container'=>'', 'menu_class'=>'nav-item', 'echo'=>false, 'after'=>'<span></span>' ) );
			$top_nav = str_replace( "<span></span></li>\n</ul>", "</li>\n</ul>", $top_nav );
			echo $top_nav;
		?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="feedback clearfix"  > <a href="<?php echo get_opt('pshow_jianyi', 'http://meowooh.com/'); ?>">求建议</a> </div>