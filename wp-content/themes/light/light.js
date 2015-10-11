//调用图片背景插件&#page显示动画
jQuery(function() {
    jQuery('#page').superbgimage().fadeIn("slow");
});
//调整图片大小
jQuery(window).load(function(){
   	var img_cont=($('.entry-content').find('img')).length; //查找并计算文章里面的图片个数，根据自己主题写选择器
   	if (img_cont != 0) { //做个判断，没有图片就不需要了
   		var maxwidth=440; //定义图片最大宽度，超过此宽度的图片自动缩为 maxwidth 值
   		var maxwidth_value=maxwidth+'px';
   		for (var i=0;i<=img_cont-1;i++) {
   			var max_width=$('.entry-content img:eq('+i+')');
   			if (max_width.width() > maxwidth) {
   				max_width.addClass('max_width_img').removeAttr("width").removeAttr("height").css({"cursor":"pointer","width":maxwidth_value,"height":"auto"});
  			}
  		}
   	}
});
//图片hover动画
jQuery(function(){
	jQuery(".entry-content img").hover(function(){
			jQuery(this).animate({"opacity":"0.8"},200);
		},function(){jQuery(this).animate({"opacity":"1"},200);})
	});