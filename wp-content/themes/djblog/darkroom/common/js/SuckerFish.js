
/**
 *
 * SuckerFish Singleton.
 * automatically registers a parse function for ie.  runs through all the nav items and
 * adds the "sfhover" mouse events
 *
 * please visit http://www.htmldog.com/articles/suckerfish/dropdowns/ for the real deal
 *
 */
if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.Suckerfish) itdr.classes.Suckerfish = new function() {
	var ie6 = false /*@cc_on || @_jscript_version < 5.7 @*/;
	function parse (eid, tag) {
		var items;
		var block = document.getElementById(eid);
		if (block!=null) {
			items = block.getElementsByTagName(tag);
			for (var i=0; i<items.length; i++) {
				items[i].onmouseover = function() {
					this.className += " sfhover";
				}
				items[i].onmouseout = function() {
					this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
				}
			}
		}
	}
	function init () {
		parse("navigation", "li");
	}
	/**
	 *
	 * Suckerfish.repair
	 *
	 * @param eid:String
	 *	the block to search within
	 * @param tag:String
	 *	the tag names to repair
	 */
	this.repair = function (eid, tag) {
		parse(eid, tag);
	}
	if (ie6) window.attachEvent("onload", init);
};

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;