<?php if ( post_password_required() ) : ?>
<?php _e( 'Enter your password to view comments.' ); ?>
<?php return; endif; ?>

<div id="comments-tab-title"> <a href="javascript:void(0)" class="comments-tab-hover" onclick="$('html,body').animate({scrollTop: $('#comments-tab-title').offset().top}, 800)">Comments</a> <a href="javascript:void(0)" class="" onclick="$('html,body').animate({scrollTop: $('#comments-tab-title').offset().top}, 800)">Trackbacks</a> </div>
<div id="comments">
  <div class="comt">
    <div id="tab-comments">
      <?php if ( have_comments() ) : ?>
      <div style=" display: block;">
        <ol class="commentlist">
          <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <div class="navi-comments">
          <?php paginate_comments_links('prev_text=上一页&next_text=下一页');?>
        </div>
        <?php endif; ?>
      </div>
      <div style="display: none; ">
        <?php //输出自定义Trackbacks和Pingbacks 
foreach($comments as $comment){
   if(get_comment_type() != 'comment' && $comment->comment_approved != '0'){ $havepings = 1; break; }
}
if($havepings == 1) : //判断是否有 Trackbacks/Pingbacks
?>
        <div class="trackbacks-pingbacks">
          <h3>Trackbacks and Pingbacks:</h3>
          <ul id="pinglist">
            <?php wp_list_comments('type=pings&per_page=0&callback=custom_pings'); ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
  <p>
    <?php _e( 'Comments are closed.' ); ?>
  </p>
  <?php endif; ?>
  <?php
$args =  array(
'comment_field'=> '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
<br/>
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
<br/>
<textarea id="comment" name="comment" cols="45" rows="8"></textarea></p>',
'label_submit'=> '确 认 提 交 / Ctrl + Enter',
);
comment_form($args);
?>
  <script type="text/javascript">
    function grin(tag) {
      if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
        myField = document.getElementById('comment');
      } else {
        return false;
      }
      tag = ' ' + tag + ' ';
      if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = tag;
        myField.focus();
      }
      else if (myField.selectionStart || myField.selectionStart == '0') {
        startPos = myField.selectionStart
        endPos = myField.selectionEnd;
        cursorPos = startPos;
        myField.value = myField.value.substring(0, startPos)
                      + tag
                      + myField.value.substring(endPos, myField.value.length);
        cursorPos += tag.length;
        myField.focus();
        myField.selectionStart = cursorPos;
        myField.selectionEnd = cursorPos;
      }
      else {
        myField.value += tag;
        myField.focus();
      }
    }
</script> 
</div>
</div>
