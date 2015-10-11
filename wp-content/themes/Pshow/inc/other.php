<?php
function remove_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );
function dmeng_get_https_avatar($avatar){
$avatar = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "secure.gravatar.com", $avatar);
return $avatar;
}
add_filter('get_avatar', 'dmeng_get_https_avatar');
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 ); //Javascript的调用
remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );//清除前后文信息
remove_action('wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'locale_stylesheet' );
remove_action('publish_future_post','check_and_publish_future_post',10, 1 );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_print_styles', 8 );//载入css
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_footer', 'wp_print_footer_scripts' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
}
if ( !is_admin() ) { 
function my_init_method() {
wp_deregister_script( 'jquery' ); 
}
add_action('init', 'my_init_method'); 
}
wp_deregister_script( 'l10n' );
register_nav_menus(
      array(
       'main' => __( '主菜单导航' )
      )
   );
remove_filter('the_content', 'wptexturize');
 function enable_more_buttons($buttons) {
     $buttons[] = 'hr';
     $buttons[] = 'del';
     $buttons[] = 'sub';
     $buttons[] = 'sup'; 
     $buttons[] = 'fontselect';
     $buttons[] = 'fontsizeselect';
     $buttons[] = 'cleanup';   
     $buttons[] = 'styleselect';
     $buttons[] = 'wp_page';
     $buttons[] = 'anchor';
     $buttons[] = 'backcolor';
     return $buttons;
     }
add_filter("mce_buttons_3", "enable_more_buttons");
add_filter('the_content', 'imagesalt');
function imagesalt($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 alt="'.$post->post_title.'" title="'.$post->post_title.'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
add_theme_support( 'post-thumbnails' );
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$popimg=get_option( 'mao10_popimg');
$first_img = "$popimg";
}
return $first_img;
}
 
function mmimg($postID) {
 $cti = catch_that_image();
 $showimg = $cti;
 has_post_thumbnail();
 if ( has_post_thumbnail() ) { 
 $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
 $shareimg = $thumbnail_image_url[0];
 } else { 
 $shareimg = $showimg;
 };
 return $shareimg;
} 
function exampletheme_options_after() { 
	global $wpdb;
	$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
	$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
	$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
	$request .= " ORDER BY term_id asc";
	$categorys = $wpdb->get_results($request);
	echo '<div class="uk-panel uk-panel-box" style="margin-bottom: 20px;"><h3 style="margin-top: 0; margin-bottom: 15px; font-size: 14px; line-height: 24px; font-weight: 400; text-transform: none; color: #fff;background: gray;padding-left: 8px;">可能会用到的分类ID</h3>';
	echo "<ul>";
	foreach ($categorys as $category) { 
		echo  '<li style="margin-right: 10px;float:left;">'.$category->name."（<code>".$category->term_id.'</code>）</li>';
	}
	echo "</ul></div>";
}
function par_pagenavi($range = 9){ 
if ( is_singular() ) return;
global $wp_query, $paged;
$max_page = $wp_query->max_num_pages;
if ( $max_page == 1 ) return;
if ( empty( $paged ) ) $paged = 1;
echo '  <div class="pagination"><a><span class="page-numbers">'.第 . $paged .页 .（共 . $max_page .页）. ' </span></a> ';
    global $paged, $wp_query;  
    if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}  
    if($max_page > 1){if(!$paged){$paged = 1;}  
    if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> NO.1 </a>";}  
    previous_posts_link(' « ');  
    if($max_page > $range){  
        if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";  
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}  
    elseif($paged >= ($max_page - ceil(($range/2)))){  
        for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";  
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}  
    elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){  
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}  
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";  
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}  
    next_posts_link(' » ');  
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> END </a></div>";}}  
}  
function random_postlite() {
    global $wpdb;
    $query = "SELECT ID FROM $wpdb->posts WHERE post_type = 'post' AND post_password = '' AND   post_status = 'publish' ORDER BY RAND() LIMIT 1";
    if ( isset( $_GET['random_cat_id'] ) ) {
        $random_cat_id = (int) $_GET['random_cat_id'];
        $query = "SELECT DISTINCT ID FROM $wpdb->posts AS p INNER JOIN $wpdb->term_relationships AS tr ON (p.ID = tr.object_id AND tr.term_taxonomy_id = $random_cat_id) INNER JOIN  $wpdb->term_taxonomy AS tt ON(tr.term_taxonomy_id = tt.term_taxonomy_id AND taxonomy = 'category') WHERE post_type = 'post' AND post_password = '' AND     post_status = 'publish' ORDER BY RAND() LIMIT 1";
    }
    if ( isset( $_GET['random_post_type'] ) ) {
        $post_type = preg_replace( '|[^a-z]|i', '', $_GET['random_post_type'] );
        $query = "SELECT ID FROM $wpdb->posts WHERE post_type = '$post_type' AND post_password = '' AND     post_status = 'publish' ORDER BY RAND() LIMIT 1";
    }
    $random_id = $wpdb->get_var( $query );
    wp_redirect( get_permalink( $random_id ) );
    exit;
}
if ( isset( $_GET['random'] ) )
add_action( 'template_redirect', 'random_postlite' );
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
add_action('wp_ajax_bigfa_like', 'bigfa_like');
function bigfa_like(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
    $bigfa_raters = get_post_meta($id,'bigfa_ding',true);
    $expire = time() + 99999999;
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
    setcookie('bigfa_ding_'.$id,$id,$expire,'/',$domain,false);
    if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
        update_post_meta($id, 'bigfa_ding', 1);
    } 
    else {
            update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
        }
   
    echo get_post_meta($id,'bigfa_ding',true);
    
    } 
    
    die;
}
function all_img($soContent){
$soImages = '~<img [^\>]*\ />~';
preg_match_all( $soImages, $soContent, $thePics );
$allPics = count($thePics);
if( $allPics > 0 ){
foreach($thePics[0] as $v){
echo $v;
}
}
else {
echo "<img src='";
echo bloginfo('template_url');
echo "/images/thumb.gif'>";
}
}
add_action('template_redirect', 'redirect_single_post');
function redirect_single_post() {
    if (is_search()) {
        global $wp_query;
        if ($wp_query->post_count == 1 && $wp_query->max_num_pages == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
            exit;
        }
    }
}

add_action('optionsframework_after','options_after', 100);


function options_after() {
echo '<div class="metabox-left" id="custom-panel">';
echo '<div id="redux-header"><div class="display_header"><h2>Pshow主题 Pc端beta</h2><span>1.0</span></div></div>';   
echo '<p>这是一个简单的偏图片类主题模板，如你所见，简单设置一下就可以使用了。<br>未来方向，痞子除完善功能外，会做一个相应的手机模板来进行搭配使用。<br><br>如果你也看好Pshow这个类型的模板，可以添加我的微信公众号：痞子酱【pzj114】。主题后续更新都会在此进行更新说明。也欢迎你提出一些建设性意见给我，集广思益！</p>'; 
echo '<div class="allcatsid"><ul><li><strong>分类名</strong><br /><b>分类ID</b></li>';
$categories = get_categories('hide_empty=0&orderby=id');
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_name;;  
echo '<li>';
echo $wp_cats[$category_list->cat_ID];;
echo '<br />';
echo $category_list->cat_ID;;
echo '</li>';};
echo ' </ul></div><br><p><a target="_blank" href="http://my.henghost.com/aff.php?aff=2159"><img src="http://cdn.meowooh.com/hczj.png" width="300px"></a><br><a target="_blank" href="http://dwz.cn/GRiwf"><img src="http://cdn.meowooh.com/250-250.gif" width="300px"></a><br><br>七牛云存储推介：<a href="https://portal.qiniu.com/signup?code=3leigmzoib5g2" target="_blank">Go</a></p></div>';
}

//自定义后台版权
function remove_footer_admin () {
echo '感谢选择 痞子为您打造！如需帮助，微信联系：【pzj114】</p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//工具条
add_filter('show_admin_bar', '__return_false');
//gzip压缩
function gzippy() {
ob_start('ob_gzhandler');
}

if(!stristr($_SERVER['REQUEST_URI'], 'tinymce') && !ini_get('zlib.output_compression')) {
add_action('init', 'gzippy');
}
function wp_compress_html(){
    function wp_compress_html_main ($buffer){
        $initial=strlen($buffer);
        $buffer=explode("<!--wp-compress-html-->", $buffer);
        $count=count ($buffer);
        for ($i = 0; $i <= $count; $i++){
            if (stristr($buffer[$i], '<!--wp-compress-html no compression-->')) {
                $buffer[$i]=(str_replace("<!--wp-compress-html no compression-->", " ", $buffer[$i]));
            } else {
                $buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
                $buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
                $buffer[$i]=(str_replace("\n", "", $buffer[$i]));
                $buffer[$i]=(str_replace("\r", "", $buffer[$i]));
                while (stristr($buffer[$i], '  ')) {
                    $buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
                }
            }
            $buffer_out.=$buffer[$i];
        }
        $final=strlen($buffer_out);   
        $savings=($initial-$final)/$initial*100;   
        $savings=round($savings, 2);   
        $buffer_out.="\n<!--压缩前的大小: $initial bytes; 压缩后的大小: $final bytes; 节约：$savings% -->";   
    return $buffer_out;
}
ob_start("wp_compress_html_main");
}
add_action('get_header', 'wp_compress_html');