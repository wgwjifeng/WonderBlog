<?php if ( post_password_required() ) : ?>
<?php _e( 'Enter your password to view comments.' ); ?>
<?php return; endif; ?>

<div id="comments">
  <div class="comt">
    <?php if ( have_comments() ) : ?>
    <ol class="commentlist">
      <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
    </ol>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navi-comments">
      <?php paginate_comments_links('prev_text=上一页&next_text=下一页');?>
    </div>
    <?php endif; ?>
    <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p>
      <?php _e( 'Comments are closed.' ); ?>
    </p>
    <?php endif; ?>
    <?php
$args =  array(
'comment_field'=> '<div class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
<div class="comment-menu">
<a href="javascript:void(0);" id="emot" >表情</a>
<a href="javascript:void(0);" id="img" onclick="grin(\'[img src=图片地址 alt=图片描述 /]\')" >图片</a>
<a href="javascript:void(0);" id="share" onclick="grin(\'[a href=网站地址]网站标题[/a]\')" >网站</a>
<a href="javascript:void(0);" id="video" onclick="grin(\'[video]视频SWF地址[/video]\')">视频</a>
</div>
<div class="comment-wrap">
<div class="comment-emot">
<a href="javascript:void(0)" onclick="grin(\':?:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_question.gif"  alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':razz:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_razz.gif"      alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':sad:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_sad.gif"       alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':evil:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_evil.gif"      alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':!:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_exclaim.gif"   alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':smile:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_smile.gif"     alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':oops:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_redface.gif"   alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':grin:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_biggrin.gif"   alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':eek:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_surprised.gif" alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':shock:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_eek.gif"       alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':???:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_confused.gif"  alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':cool:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_cool.gif"      alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':lol:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_lol.gif"       alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':mad:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_mad.gif"       alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':twisted:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_twisted.gif"   alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':roll:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_rolleyes.gif"  alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':wink:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_wink.gif"      alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':idea:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_idea.gif"      alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':arrow:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_arrow.gif"     alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':neutral:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_neutral.gif"   alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':cry:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_cry.gif"       alt="" /></a>
<a href="javascript:void(0)" onclick="grin(\':mrgreen:\')" ><img src="'.get_option('home').'/wp-content/themes/light/images/smilies/icon_mrgreen.gif"   alt="" /></a>
</div>
</div>
<script src="'.get_option('home').'/wp-content/themes/light/comments.js"></script>
<script src="'.get_option('home').'/wp-content/themes/light/comments-ajax.js"></script>
<textarea id="comment" name="comment" cols="45" rows="8"></textarea></div>',
'label_submit'=> '确 认 提 交 / Ctrl + Enter',
);
comment_form($args);
?>
  </div>
</div>
