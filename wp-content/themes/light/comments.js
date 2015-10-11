//评论@用户和#引用
jQuery('.comment-reply').click(function() {
var atid = '"#' + jQuery(this).parent().parent().attr("id") + '"';//获取评论ID
var atname = jQuery(this).parent().parent().find('.name:first').text();//获得作者名称
jQuery("#comment").attr("value","<a href=" + atid + ">@" + atname + " </a>\n").focus();//组合成引用
jQuery("#cancel-comment-reply-link").text("取消 @" + atname);
});
jQuery('.comment-quote').click(function() {
var atid = '"#' + jQuery(this).parent().parent().attr("id") + '"';//获取评论ID
var atname = jQuery(this).parent().parent().find('.name:first').text();//获得作者名称
var quotecontent = jQuery(this).parent().find('.comment-text>p').text();//获得评论内容
jQuery("#comment").attr("value", "<blockquote>\n<strong><a href=" + atid + ">" + atname + " </a>" +": </strong>" + quotecontent + "</blockquote>\n").focus();//组合成引用
jQuery("#cancel-comment-reply-link").text("取消引用");
});
jQuery('#cancel-comment-reply-link').click(function() {	//点击取消回复评论清空评论框的内容
jQuery("#comment").attr("value",'');
});
//表情弹出层
jQuery('#emot,.comment-emot a').click(function() { jQuery('.comment-emot').toggle();});
//评论框插入内容
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