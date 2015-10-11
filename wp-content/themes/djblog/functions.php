<?php
//自定义函数返回文章中的缩略图
function catch_post_image() {
global $post,$posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$first_img = $matches [1] [0];
if(empty($first_img)){
$site_url = bloginfo('template_url');
$first_img = "$site_url/images/no-thumbnail.jpg";
}
return $first_img;
}
//自定义函数返回幻灯片缩略图
function catch_slider_image() {
global $post,$posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$first_img = $matches [1] [0];
if(empty($first_img)){
$site_url = bloginfo('template_url');
$first_img = "$site_url/images/no-slideimg.jpg";
}
return $first_img;
}
//截取摘要字数
function djwp_strimwidth($str ,$start ,$width ,$trimmarker ){
$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
return $output.$trimmarker;
}

//打印函数
function p($arr)
{
	print_r($arr);
	die;
}
//菜单  
register_nav_menus();

//小工具
if( function_exists("register_sidebar") ) {
register_sidebar(array(
"before_widget" => "<li>", // widget 的开始标签
"after_widget" => "</li>", // widget 的结束标签
"before_title" => "<h3>", // 标题的开始标签
"after_title" => "</h3>" // 标题的结束标签
));
}
//分页功能
function dj_pagenavi($range = 4){
global $paged,$wp_query;
if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
if($max_page >1){if(!$paged){$paged = 1;}
if($paged != 1){echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";}
previous_posts_link('上一页');
if($max_page >$range){
if($paged <$range){for($i = 1;$i <= ($range +1);$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
elseif($paged >= ($max_page -ceil(($range/2)))){
for($i = $max_page -$range;$i <= $max_page;$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
else{for($i = 1;$i <= $max_page;$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
next_posts_link('下一页');
if($paged != $max_page){echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";}
echo '<span>共['.$max_page.']页</span>';
}
}

//主题后台设置

include_once 'myfunctions.php';




