
if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.FlashHeader) itdr.classes.FlashHeader = new function () {
	// private members
	var _use = false;
	var basePath = "/darkroom/";
	var swfPath = "blog/swf/header.swf";
	var version = "9.0.28";
	var transparent = false;
	var color;
	// private functions
	function init () {
		if (_use==false) return;
		var flashvars = {};
		var params = {};
		if (color!=undefined) params.bgcolor = color;
		if (transparent) params.wmode = "transparent";
		params.allowscriptaccess = "always";
		var attributes = {};
		swfobject.embedSWF(basePath + swfPath, "header-swf", "100%", "100%", version, basePath + "common/swf/expressinstall.swf", flashvars, params, attributes);
	}
	// public methods
	this.use = function (bool) {
		_use = bool;
	}
	this.setStageColor = function (str) {
		color = str;
	}
	this.setTransparency = function (bool) {
		transparent = bool;
	}
	this.setFlashVersion = function (ver) {
		version = ver;
	}
	this.setSwfPath = function (path) {
		swfPath = path;
	}
	this.setBasePath = function (path) {
		basePath = path;
	}
	// do everything on dom load
	itdr.func.DOMLoad(init);
}

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;