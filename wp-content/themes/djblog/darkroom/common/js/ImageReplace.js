/* TwitterFeed class

	<script type="text/javascript">
		with (itdr.classes.ImageReplace) {
			// all default values are optional
			setDefaults({
				wordwrap: false,
				font: "pathfrombase/font.ttf",
				color: "#000000",
				size: 24,
				backgroundColor: "0xFFFFFF",
				transparent: false,
				aliasing: 2
			});
			addRule({
				selector: ".single-entry .title",
				color: "#000000",
				size: 40
			});
			addRule({
				selector: "h1",
				font: "pathfrombase/font2.ttf",
				color: "#000000",
				size: 40,
				transform: "uppercase"
			});
		}
	</script>

*/

if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.ImageReplace) itdr.classes.ImageReplace = new function () {
	// private members
	var basepath = "/darkroom/";
	var renderer = "common/php/text.renderer.php";
	var defaults = {};
	var rules = new Array();
	var img = new Image();
	var imgLoad = false;
	var domLoad = false;
	var ie6 = false /*@cc_on || @_jscript_version < 5.7 @*/;
	// private methods
	function domInit () {
		domLoad = true;
		if (imgLoad) doReplace();
	}
	function imgInit () {
		imgLoad = true;
		if (domLoad) doReplace();
	}
	function doReplace () {
		for(var i=0; i<rules.length; i++) {
			var rule = rules[i];
			var wordwrap = rule.wordwrap==undefined ? defaults.wordwrap : rule.wordwrap;
			var props = ["font", "color", "size", "backgroundColor", "transparent", "aliasing", "transform"];
			var lookup = ["f", "c", "s", "bc", "ba", "a", "tf"];
			var settings = new Array();
			for (var j=0; j<props.length; ++j) {
				var prop = props[j];
				var name = lookup[j];
				var value = rule[prop]==undefined ? defaults[prop] : rule[prop];
				if (!value) continue;
				if (prop=="font") value = "../../" + value;
				settings.push (name + "=" + escape(value));
			}
			var elements = getElementsBySelector(rule.selector);
			if(elements.length > 0) {
				for(var j=0; j<elements.length; j++) {
					var element = elements[j];
					if (!element) continue;
					var text = extractText(element);
					var url = basepath + renderer + "?" + settings.join("&");
					while(element.hasChildNodes()) element.removeChild(element.firstChild);
					var tokens = wordwrap ? text.split(' ') : [text] ;
					for (var k=0; k<tokens.length; k++) {
						var token = tokens[k];
						var image = document.createElement("img");
						image.className = "ImageReplace";
						image.alt = token;
						token = escape(token);
						token = token.split("+").join("%2B");
						image.src = url + "&ie6=" + ie6 + "&t=" + token;
						element.appendChild(image);
					}
				}
			}
		}
	}
	function extractText (element) {
		if (typeof element == "string") return element;
		else if (typeof element == "undefined") return element;
		else if (element.innerText) return element.innerText;
		var text = "";
		var kids = element.childNodes;
		for(var i=0;i<kids.length;i++) {
			if (kids[i].nodeType == 1) text += extractText(kids[i]);
			else if(kids[i].nodeType == 3) text += kids[i].nodeValue;
		}
		return text;
	}
	function getElementsBySelector(selector) {
		var tokens = selector.split(' ');
		var currentContext = new Array(document);
		for(var i=0;i<tokens.length;i++) {
			var token = tokens[i].replace(/^\s+/,'').replace(/\s+$/,'');
			if (token.indexOf('#') > -1) {
				var bits = token.split('#');
				var tagName = bits[0];
				var id = bits[1];
				var element = document.getElementById(id);
				if(tagName && element.nodeName.toLowerCase() != tagName) return new Array();
				currentContext = new Array(element);
				continue;
			}
			if (token.indexOf('.') > -1) {
				var bits = token.split('.');
				var tagName = bits[0];
				var className = bits[1];
				if(!tagName) tagName = '*';
				var found = new Array;
				var foundCount = 0;
				for(var h=0;h<currentContext.length;h++) {
					var elements;
					if(tagName == '*') elements = currentContext[h].all ? currentContext[h].all : currentContext[h].getElementsByTagName('*');
					else elements = currentContext[h].getElementsByTagName(tagName);
					for(var j=0;j<elements.length;j++) found[foundCount++] = elements[j];
				}
				currentContext = new Array;
				var currentContextIndex = 0;
				for(var k=0;k<found.length;k++) {
					if(found[k].className && found[k].className.match(new RegExp('\\b'+className+'\\b'))) currentContext[currentContextIndex++] = found[k];
				}
				continue;
			}
			if(token.match(/^(\w*)\[(\w+)([=~\|\^\$\*]?)=?"?([^\]"]*)"?\]$/)) {
				var tagName = RegExp.$1;
				var attrName = RegExp.$2;
				var attrOperator = RegExp.$3;
				var attrValue = RegExp.$4;
				if(!tagName) tagName = '*';
				var found = new Array;
				var foundCount = 0;
				for(var h=0;h<currentContext.length;h++) {
					var elements;
					if (tagName == '*')elements = currentContext[h].all ? currentContext[h].all : currentContext[h].getElementsByTagName('*');
					else elements = currentContext[h].getElementsByTagName(tagName);
					for (var j=0;j<elements.length;j++) found[foundCount++] = elements[j];
				}
				currentContext = new Array;
				var currentContextIndex = 0;
				var checkFunction;
				switch (attrOperator) {
					case '=':
						checkFunction = function(e) { return (e.getAttribute(attrName) == attrValue); };
						break;
					case '~':
						checkFunction = function(e) { return (e.getAttribute(attrName).match(new RegExp('\\b'+attrValue+'\\b'))); };
						break;
					case '|':
						checkFunction = function(e) { return (e.getAttribute(attrName).match(new RegExp('^'+attrValue+'-?'))); };
						break;
					case '^':
						checkFunction = function(e) { return (e.getAttribute(attrName).indexOf(attrValue) == 0); };
						break;
					case '$':
						checkFunction = function(e) { return (e.getAttribute(attrName).lastIndexOf(attrValue) == e.getAttribute(attrName).length - attrValue.length); };
						break;
					case '*':
						checkFunction = function(e) { return (e.getAttribute(attrName).indexOf(attrValue) > -1); };
						break;
					default :
						checkFunction = function(e) { return e.getAttribute(attrName); };
				}
				currentContext = new Array;
				var currentContextIndex = 0;
				for (var k=0;k<found.length;k++) {
					if(checkFunction(found[k])) currentContext[currentContextIndex++] = found[k];
				}
				continue;
			}
			tagName = token;
			var found = new Array;
			var foundCount = 0;
			for (var h=0;h<currentContext.length;h++) {
				var elements = currentContext[h].getElementsByTagName(tagName);
				for(var j=0;j<elements.length; j++) found[foundCount++] = elements[j];
			}
			currentContext = found;
		}
		return currentContext;
	}
	// public methods
	this.addRule = function(obj) {
		rules.push(obj);
	}
	this.setDefaults = function(obj) {
		for (var prop in obj) defaults[prop] = obj[prop];
	}
	this.setBasePath = function(path) {
		basepath = path;
	};
	// listen for DOM loading
	img.onload = imgInit;
	img.src = basepath + renderer + "?t=" + (new Date()).getTime();
	itdr.func.DOMLoad(domInit);
}

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;
