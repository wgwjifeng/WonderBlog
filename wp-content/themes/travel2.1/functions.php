<?php
//huilang.me functions.php
//编辑器增强
function add_more_buttons($buttons) {  
$buttons[] = 'fontsizeselect';  
$buttons[] = 'styleselect';  
$buttons[] = 'fontselect';  
$buttons[] = 'hr';  
$buttons[] = 'sub';  
$buttons[] = 'sup';  
$buttons[] = 'cleanup';  
$buttons[] = 'image';  
$buttons[] = 'code';  
$buttons[] = 'media';  
$buttons[] = 'backcolor';  
$buttons[] = 'visualaid';  
return $buttons;  
}  
add_filter("mce_buttons_3", "add_more_buttons");


function ajax_post(){
  if( isset($_GET['action'])&& $_GET['action'] == 'ajax_post'){
    if(isset($_GET['cat'])){
      query_posts("category_name=" . $_GET['cat']."&paged=".$_GET['pag']);
    }else if(isset($_GET['pag'])){
      query_posts("paged=" . $_GET['pag']);
    }
    if(have_posts()){while (have_posts()):the_post();?>
          <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile;}
    die();
    }else{return;}
}
add_action('init', 'ajax_post');


//////////访问次数///////////
function getPostViews($postID){   
    $count_key = 'post_views_count';   
    $count = get_post_meta($postID, $count_key, true);   
    if($count==''){   
        delete_post_meta($postID, $count_key);   
        add_post_meta($postID, $count_key, '0');   
        return "0";   
    }   
    return $count.'';   
} 
function setPostViews($postID) {   
    $count_key = 'post_views_count';   
    $count = get_post_meta($postID, $count_key, true);   
    if($count==''){   
        $count = 0;   
        delete_post_meta($postID, $count_key);   
        add_post_meta($postID, $count_key, '0');   
    }else{   
        $count++;   
        update_post_meta($postID, $count_key, $count);   
    }   
}
// 禁用自动保存，所以编辑长文章前请注意手动保存。
add_action( 'admin_print_scripts', create_function( '$a', "wp_deregister_script('autosave');" ) );
// 禁用修订版本
remove_action( 'pre_post_update' , 'wp_save_post_revision' );
//自动改图片文件名称
function example_wp_handle_upload_prefilter($file){
    $time=date("Y-m-d");
    $file['name'] = $time."".mt_rand(1,100).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'example_wp_handle_upload_prefilter');
//支持缩略图
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}


//菜单
register_nav_menus( array(
    'header_menu' => '头部菜单',
) );


/*PAGINATION*/
function par_pagenavi($range = 10){
  global $paged, $wp_query;
  if ( !$max_page ) {
    $max_page = $wp_query->max_num_pages;
  }
  if($max_page > 1){
    if(!$paged){$paged = 1;
  }
  previous_posts_link('<<上一页');
  if($max_page > $range){
    if($paged < $range){
        for($i = 1; $i <= ($range + 1); $i++){
        echo " <a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a> ";
      }
    }
    elseif($paged >= ($max_page - ceil(($range/2)))){
    for($i = $max_page - $range; $i <= $max_page; $i++){echo " <a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a> ";}}
    elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
      for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
        echo " <a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a> ";
      }
    }
  }
  else{
    for($i = 1; $i <= $max_page; $i++){
      echo " <a href='" . get_pagenum_link($i) ."'";
      if($i==$paged)echo " class='current'";echo ">$i</a> ";
    }
  }
  next_posts_link('下一页>>');}
}


function huilang_thumbnail(){  
    global $post;  
    if ( has_post_thumbnail() ){  
        $domsxe = simplexml_load_string(get_the_post_thumbnail());  
        $thumbnailsrc = $domsxe->attributes()->src;  
        echo $thumbnailsrc;  
    } else {  
        $content = $post->post_content;  
        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);  
        $n = count($strResult[1]);  
        if($n > 0){  
            echo $strResult[1][0];  
        }else {  
            /*$random = mt_rand(1, 10); 
            echo get_bloginfo('template_url').'/img/thumb/img'.$random.'.png';*/  
            echo get_bloginfo('template_url').'/img/default.png';  
        }  
    }  
}  

add_theme_support( 'post-formats', array('image') );
add_custom_background();
include_once('includes/setting.php');