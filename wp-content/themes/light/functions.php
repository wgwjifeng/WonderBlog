<?php
/* PHP warning message */
//error_reporting(E_ALL & ~E_NOTICE); // 侦错用

/* Gzip */
//function gzippy(){ob_start('ob_gzhandler');}
//if(!stristr($_SERVER['REQUEST_URI'], 'tinymce') && !ini_get('zlib.output_compression')) {add_action('init', 'gzippy');}

/* 加载jquery */
if ( !is_admin() ) { 
    function my_init_method() {
      wp_deregister_script( 'jquery' ); // 取消原有jquery 定义
      wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js', '', '1.3.2' ); // 自定义 jquery 文件位址
    }    
  add_action('init', 'my_init_method'); // 加入功能, 前台使用 wp_enqueue_script( '名称' ) 加载
wp_enqueue_script( 'light', get_bloginfo('template_directory').'/light.js', array('jquery'), '1.0.0', 0 ); // 重新定义 script,同时加载
}

/* 文章形式 */
add_theme_support( 'post-formats', array( 'aside','gallery','link','image','quote','status','video','audio','chat' ) );

/*菜单*/
if ( function_exists( 'register_nav_menus' ) ) 
{ register_nav_menus( array('menu' => '主菜单',) ); }

/* 自定义背景 */
add_custom_background();

/* 去除默认相册样式 */
add_filter( 'use_default_gallery_style', '__return_false' );

/* 链接自动识别播放 */
function auto_player_urls($c) {
    $s = array('/^<p>(http:\/\/.*\.mp3)<\/p>$/m' => '<p><embed class="mp3_player" src="'.get_bloginfo("template_url").'/mp3_player.swf?audio_file=$1&amp;color=ffffff" width="207" height="30" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque"></p>',
    '/^<p>(http:\/\/.*\.swf)<\/p>$/m' => '<p><embed class="swf_player" src="$1"  width="207" height="30" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque"></p>');
    foreach($s as $p => $r){
        $c = preg_replace($p,$r,$c);
    }
    return $c;
}
add_filter( 'the_content', 'auto_player_urls' );

/* 添加缩略图连接 */
function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
	return $html;}
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

/* 缩略图 */
add_theme_support( 'post-thumbnails' );
function don_the_thumbnail() {
    global $post;
    // 判断该文章是否设置的缩略图，如果有则直接显示
    if ( has_post_thumbnail() ) {
        echo the_post_thumbnail();
    } else { //如果文章没有设置缩略图，则查找文章内是否包含图片
        $content = $post->post_content;
        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
        $n = count($strResult[1]);
        if($n > 0){ // 如果文章内包含有图片，就用第一张图片做为缩略图
            echo '<a href="'.get_permalink().'" title="'.get_post_field( 'post_title','' ).'"><img src="'.$strResult[1][0].'"></a>';
        }else { // 如果文章内没有图片，则用默认的图片。
            echo '';}}}

/* 评论 */
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   global $commentcount;
   if(!$commentcount) {
	   $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage')-1 : get_page_of_comment( $comment->comment_ID, $args )-1;
	   $cpp=get_option('comments_per_page');
	   $commentcount = $cpp * $page;
	}
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>" class="comment-body">
    <div class="comment-author"><?php echo get_avatar( $comment, $size = '28'); ?></div>
    <div class="comment-head"> <span class="name"><?php printf(__('%s'), get_comment_author_link()) ?></span>
      <div class="date"><?php printf(__('%1$s %2$s'), get_comment_date('F j, Y'),  get_comment_time('H:i:G')) ?>
        <?php if(!$parent_id = $comment->comment_parent) {printf('#%1$s', ++$commentcount);} ?>
      </div>
    </div>
    <div class="comment-entry">
      <div class="comment-text">
        <?php comment_text() ?>
        <?php if ($comment->comment_approved == '0') : ?>
        <em>
        <?php _e('Your comment is awaiting moderation.') ?>
        </em> <br />
        <?php endif; ?>
      </div>
      <div class="comment-reply" title="@用户">
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('@')))) ?>
      </div>
    </div>
  </div>
  <?php
        }

/* 自定义表情路径 */
function custom_smilies_src($src, $img){
    return get_option('home') . '/wp-content/themes/light/images/smilies/' . $img;}
add_filter('smilies_src', 'custom_smilies_src', 10, 2);

/* comment_mail_notify v1.0 by willin kan.  */
function comment_mail_notify($comment_id) {
  $admin_notify = '1'; // admin 要不要收回覆通知 ( '1'=要 ; '0'=不要 )
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改為你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  global $wpdb;
  if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '')
    $wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
  if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1'))
    $wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify='1' WHERE comment_ID='$comment_id'");
  $notify = $parent_id ? get_comment($parent_id)->comment_mail_notify : '0';
  $spam_confirmed = $comment->comment_approved;
  if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '您在 [' . get_option("blogname") . '] 的留言有了回应';
    $message = '
    <div id="mailContentContainer" style="font-size: 14px; padding: 0px; height: auto; font-family:"Microsoft Yahei", Tahoma, Arial, Helvetica; _font-family:Tahoma, Arial, Helvetica; margin-right: 0px; ">
	<div style="padding:10px;color:#fff;background-color:#666;border:1px solid #d8e3e8;border-bottom:none;border-radius:5px 5px 0 0;-moz-border-radius:5px 5px 0 0;-webkit-border-radius:5px 5px 0 0;-khtml-border-radius:5px 5px 0 0;">
	您曾在《' . get_the_title($comment->comment_post_ID) . '》的评论有了回复</div>
	<div style="padding:0 15px;color:#111;background-color:#eef2fa;border:1px solid #d8e3e8;border-radius:0 0 5px 5px;-moz-border-radius:0 0 5px 5px;-webkit-border-radius:0 0 5px 5px;-khtml-border-radius:0 0 5px 5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:</p><br />
	  <p style="padding:10px;background-color:#e5e5e5;">' . nl2br(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给你的回应:</p><br />
	  <p style="padding:10px;background-color:#d5d5d5;">' . nl2br($comment->comment_content) . '<br /></p>
      <p>你可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回应完整内容</a>欢迎再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此邮件由系统发出，系统不接收回信，因此请勿直接回复。)</p>
    </div></div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
function add_checkbox() {
  echo '<input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked" style="margin-left:20px;" /><label for="comment_mail_notify">有人回复时邮件通知我</label>';
}
add_action('comment_form', 'add_checkbox');

/* 主题选项 */
add_action('admin_menu', 'mytheme_page');
function mytheme_page (){
	if ( count($_POST) > 0 && isset($_POST['mytheme_settings']) ){
		$options = array ('keywords','description','javaScriptcss','analytics');
	foreach ( $options as $opt ){
		delete_option ( 'mytheme_'.$opt, $_POST[$opt] );
		add_option ( 'mytheme_'.$opt, $_POST[$opt] );}}
add_theme_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'mytheme_settings'); }
function mytheme_settings(){?>
  <style>
.wrap, textarea { font-family:'Century Gothic', 'Microsoft YaHei', Verdana; }
#Topic-options H3 { color:#2481C6; }
</style>
  <div id="Topic-options"class="wrap">
    <div id="icon-themes" class="icon32"><br>
    </div>
    <h2>主题选项</h2>
    <form method="post" action="">
      <fieldset>
        <h3>Meta Keywords & Meta Description</h3>
        <P>Meta Keywords & 网站关键词(*注:多个请用半角逗号隔开.)</p>
        <textarea name="keywords" id="keywords" rows="1" cols="70"><?php echo get_option('mytheme_keywords'); ?></textarea>
        <br />
        <P>Meta Description & 网站描述</P>
        <textarea name="description" id="description" rows="3" cols="70"><?php echo get_option('mytheme_description'); ?></textarea>
      </fieldset>
      <br />
      <fieldset>
        <h3>Analytics</h3>
        <P>analytics│分析&统计代码</p>
        <textarea name="analytics" id="analytics" rows="5" cols="70"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>
      </fieldset>
      <br />
      <fieldset>
        <h3>JavaScript & CSS</h3>
        <P>自定义JavaScript & CSS (*注:需要添加HTML标签.)</p>
        <textarea name="javaScriptcss" id="javaScriptcss" rows="5" cols="70"><?php echo stripslashes(get_option('mytheme_javaScriptcss')); ?></textarea>
      </fieldset>
      <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="保存設置" />
        <input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
      </p>
    </form>
  </div>
  <?php }

/* 顶部选项 */
define('HEADER_TEXTCOLOR', '2A2E32');
define('HEADER_IMAGE', '%s/images/grass.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 1366); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 768);
	register_default_headers( array(
		'grass' => array(
			'url' => '%s/images/grass.jpg',
			'thumbnail_url' => '%s/images/grass-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'grass', 'light' )
		)
	) );
// gets included in the site header
function header_style() {
    ?>
  <style type="text/css">
	#site-title a {color: #<?php echo get_header_textcolor(); ?> !important;}
    </style>
  <?php
}
// gets included in the admin header
function admin_header_style() {
    ?>
  <style type="text/css">
	#headimg{height:400px !important;text-align: center;}
	.hide-if-no-js{display:none;}
    </style>
  <?php
}
add_custom_image_header('header_style', 'admin_header_style');

/* 媒体评论 */
function add_comment_tags($content) {
    //替换图片
    $content = preg_replace('/\[img src=(.*?) alt=(.*?) \/]/e', '"<img class=\"comment-img\" src=\"$1\" alt=\"$2\"/>"', $content);
	//替换连接
	$content = preg_replace('/\[a href=(.*?)](.*?)\[\/a]/e', '"<a target=\"_blank\" href=\"$1\" rel=\"external nofollow\">$2</a>"', $content);
	//替换视频
	$content = preg_replace('/\[video](.*?)\[\/video]/e', '"<embed src=\"$1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" wmode=\"opaque\" width=\"100%\" height=\"300px\">"', $content);
    return $content;
}
add_filter('comment_text', 'add_comment_tags');

?>
