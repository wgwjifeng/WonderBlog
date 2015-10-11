//Tabs
var $j = jQuery.noConflict();
$j(function(){
    var $jtitle = $j(".djwpnavi span");
    var $jcontent = $j(".djwpfunction");
    $jtitle.mousedown(function(){
        var index = $jtitle.index($j(this));
		$j(this).addClass("mouseover").siblings().removeClass("mouseover");
        $jcontent.hide();
        $j($jcontent.get(index)).show();
        return false;
    });
});