
if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.CommentSpace) itdr.classes.CommentSpace = new function () {
	// private members
	var lookup = new Object();
	var comments_hideOnLoad = false;
	var comments_allowToggle = true;
	var comments_hideIfZero = true;
	var trackbacks_hideOnLoad = true;
	var trackbacks_allowToggle = true;
	var form_hideOnLoad = true;
	var form_allowToggle = true;
	var startWith = "CommentsWrapper";
	// private methods
	function toggleObject (entryid, type) {
		var entry = lookup[entryid];
		if (entry.current==type) {
			if (entry.current&&entry[entry.current]) entry[entry.current].style.display = entry[entry.current].style.display=="none" ? "block" : "none";
		} else {
			if (entry.current&&entry[entry.current]) entry[entry.current].style.display = "none";
			entry.current = type;
			if (entry.current&&entry[entry.current]) entry[entry.current].style.display = "block";
		}
	}
	function init() {
		var entries = itdr.func.getElementsByClassName("Entry", "div");
		for (var i=0; i<entries.length; ++i) {
			var dostart = true;
			var entry = entries[i];
			var commentspace = itdr.func.getElementsByClassName("CommentSpace", "div", entry)[0];
			if (!commentspace) return;
			// the pieces
			var commentswrapper = itdr.func.getElementsByClassName("CommentsWrapper", "div", entry)[0];
			var trackbackswrapper = itdr.func.getElementsByClassName("TrackbacksWrapper", "div", entry)[0];
			var commentformwrapper = itdr.func.getElementsByClassName("CommentFormWrapper", "div", entry)[0];
			// create an entry in the lookup
			lookup[entry.id] = new Object();
			lookup[entry.id]["CommentsWrapper"] = comments_allowToggle ? commentswrapper : undefined;
			lookup[entry.id]["CommentFormWrapper"] = form_allowToggle ? commentformwrapper : undefined;
			lookup[entry.id]["TrackbacksWrapper"] = trackbacks_allowToggle ? trackbackswrapper : undefined;
			// turn on/off
			if (trackbacks_hideOnLoad) {
				trackbackswrapper.style.display = "none";
			}
			if (trackbacks_allowToggle) {
				var showtrackbacks = itdr.func.getElementsByClassName("ShowTrackbacks", "span", entry)[0];
				var text = showtrackbacks.innerHTML;
				showtrackbacks.innerHTML = '<a href="javascript:itdr.classes.CommentSpace.toggle(\'' + entry.id + '\', \'TrackbacksWrapper\');">' + text + '</a>';
			}
			if (form_hideOnLoad) {
				commentformwrapper.style.display = "none";
			}
			if (form_allowToggle) {
				var showcommentform = itdr.func.getElementsByClassName("ShowCommentForm", "span", entry)[0];
				var text = showcommentform.innerHTML;
				showcommentform.innerHTML = '<a href="javascript:itdr.classes.CommentSpace.toggle(\'' + entry.id + '\', \'CommentFormWrapper\');">' + text + '</a>';
			}
			if (comments_hideOnLoad||(comments_hideIfZero&&commentswrapper.className.indexOf("Comments0")!=-1)) {
				dostart = false;
				commentswrapper.style.display = "none";
			}
			if (comments_allowToggle) {
				var showcomments = itdr.func.getElementsByClassName("ShowComments", "span", entry)[0];
				var text = showcomments.innerHTML;
				showcomments.innerHTML = '<a href="javascript:itdr.classes.CommentSpace.toggle(\'' + entry.id + '\', \'CommentsWrapper\');">' + text + '</a>';
			}
			if (dostart) toggleObject(entry.id, startWith);
		}
	}
	// public methods
	this.toggle = function(entryid, type) {
		toggleObject (entryid, type);
	};
	this.comments = function(hideOnLoad, allowToggle, hideIfZero) {
		comments_hideOnLoad = hideOnLoad;
		comments_allowToggle = allowToggle;
		comments_hideIfZero = hideIfZero;
	}
	this.trackbacks = function(hideOnLoad, allowToggle) {
		trackbacks_hideOnLoad = hideOnLoad;
		trackbacks_allowToggle = allowToggle;
	}
	this.form = function(hideOnLoad, allowToggle) {
		form_hideOnLoad = hideOnLoad;
		form_allowToggle = allowToggle;
	}
	// pconstructor
	itdr.func.DOMLoad(init);
}

// a little backwards compatibility
thetainteractive = itdr;
intothedarkroom = itdr;
