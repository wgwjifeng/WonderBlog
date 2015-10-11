//公共函数 文本框离开，点击时默认值显示,去掉空格
XQTOOL={};

$(document).ready(function(){

	/*qiu 2013-1-11*/
	$(window).bind("scroll",function () { //浏览器滚动条触发事件
		var scrollTop = $(window).scrollTop();
		if(scrollTop>0){
			if($('.home-gotop') && scrollTop > 3542 ){
				$('.home-gotop').show();
			}else{
				$('.home-gotop').hide();
			}
			$('.gotop:not(.home-gotop)').show();
		}else{
			$('.gotop').hide();
		}
	});

	//返回顶部响应事件
	$('.gotop').click(function(){
		$(this).addClass('gotop-over');
		var current=$(this);
		setTimeout(function(){
			current.hide();
			current.removeClass('gotop-over');
		},500);
	});

});

$(document).ready(function() { 
$.fn.postLike = function() {
 if ($(this).hasClass('done')) {
 return false;
 } else {
 $(this).addClass('done');
 var id = $(this).data("id"),
 action = $(this).data('action'),
 rateHolder = $(this).children('.count');
 var ajax_data = {
 action: "bigfa_like",
 um_id: id,
 um_action: action
 };
 $.post("/wp-admin/admin-ajax.php", ajax_data,
 function(data) {
 $(rateHolder).html(data);
 });
 return false;
 }
};
$(document).on("click", ".favorite",
function() {
 $(this).postLike();
});
}); 

