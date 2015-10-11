/* Comments class

<form class="CommentForm" method="post" action="">
	<div class="CommenterGreeting"></div>
	<div class="CommentFormInner">
		<input name="static" value="1" type="hidden">
		<input name="entry_id" value="66" type="hidden">
		<input name="__lang" value="en" type="hidden">
		<div class="CommentFormInput">
			<label>Name</label>
			<input name="author" value="">
		</div>
		<div class="CommentFormInput">
			<label>Name</label>
			<input name="email" value="">
		</div>
		<div class="CommentFormInput">
			<label>Name</label>
			<input name="url" value="">
		</div>
		<div class="CommentFormInput">
			<textarea name="text"></textarea>
		</div>
		<div class="SubmitWrapper">
			<input accesskey="s" value="Submit" type="submit">
		</div>
		<div class="CommentMemory">
			<label>Remember personal info?</label>
			<input name="bakecookie" onclick="itdr.classes.Comments.toggleMemory(this);" type="checkbox">
		</div>
	</div>
</form>

*/

if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.Comments) itdr.classes.Comments = new function () {
	// private members
	var _allow = false;
	var _captcha = false;
	var _regRequired = false;
	var _regAllowed = false;
	var _blogid;
	var _basepath;
	var blogroot = "/";
	var _signout;
	// these are default values from the defualt, lets just use them, even if they are confugsing
	var mtcmtauth = itdr.classes.Cookie.get("mtcmtauth"); // "commenter name"
	var mtcmthome = itdr.classes.Cookie.get("mtcmthome"); // "commenter url"
	var mtcmtmail = itdr.classes.Cookie.get("mtcmtmail"); // "commenter email"
	// these next four, i assume, are cookies set by the comments application, not by javascript
	var commenter_name;
	var commenter_id;
	var commenter_url;
	var commenter_blog_ids;
	// stats hit
	var counter;
	// private functions
	function init () {
		var forms = itdr.func.getElementsByClassName("CommentForm", "form");
		if (_allow==false) {
			for (var i=0; i<forms.length; ++i) {
				var form = forms[i];
				var inner = itdr.func.getElementsByClassName("CommentFormInner", "div", form)[0];
				inner.style.display = "none";
			}
			return;
		} else {
			if (_regAllowed) {
				var bits = unescape(itdr.classes.Cookie.get("commenter_id")).split(":");
				commenter_name = itdr.classes.Cookie.get("commenter_name");
				commenter_id = bits[0] || "";
				commenter_blog_ids = bits[1] || "";
				commenter_url = itdr.classes.Cookie.get('commenter_url');
			}
			for (var i=0; i<forms.length; ++i) setupForm (forms[i]);
		}
		// log the stats hit
		counter = new Image();
		if (!commenter_id) commenter_id = '';
		counter.src = blogroot + "stats.php?u=" + escape(document.location.href) + "&r=" + escape(document.referrer) + "&a=" + commenter_id + "&b=1&t=&i=";
	}
	function pseudoFocus () {
		this.className = "Focused";
	}
	function validateFormInput () {
		var isValid = this.value!="" && this.value!=undefined && this.value!=null;
		if (isValid) this.className = "Valid";
		else this.className = "";
	}
	function toggleMemory () {
		var form = this;
		while (!form.action) form = form.parentNode;
		var commentmemory = itdr.func.getElementsByClassName("CommentMemory", "fieldset", form)[0];
		var newstate = this.checked;
		if (newstate==true) {
			itdr.classes.Cookie.set("mtcmtauth", form.author.value, 365);
			itdr.classes.Cookie.set("mtcmtmail", form.email.value, 365);
			itdr.classes.Cookie.set("mtcmthome", form.url.value, 365);
		} else {
			itdr.classes.Cookie.kill("mtcmtauth");
			itdr.classes.Cookie.kill("mtcmtmail");
			itdr.classes.Cookie.kill("mtcmthome");
		}
	}
	function setupForm (form) {
		form.action = _basepath;
		var entry_id = form.entry_id.value;
		var commentergreeting = itdr.func.getElementsByClassName("CommenterGreeting", "div", form)[0];
		var commentforminner = itdr.func.getElementsByClassName("CommentFormInner", "div", form)[0];
		var commentforminputwrapper = itdr.func.getElementsByClassName("CommentFormInputWrapper", "fieldset", commentforminner)[0];
		var userinformation = itdr.func.getElementsByClassName("UserInformation", "div", commentforminputwrapper)[0];
		var commentmemory = itdr.func.getElementsByClassName("CommentMemory", "fieldset", commentforminner)[0];
		var greeting = '';
		if (_regAllowed) {
			var url = '';
			if (commenter_name && (commenter_id=="" || commenter_blog_ids.indexOf("'" + _blogid + "'")>-1)) { // user is signed in
				greeting += 'Thanks for signing in, ';
				if (commenter_id!="") {
					url = _basepath + '?__mode=edit_profile&commenter=' + commenter_id + '&blog_id=' + _blogid;
					if (entry_id) {
						url += '&entry_id=' + entry_id;
					} else {
						url += '&static=1';
					}
				} else if (commenter_url) {
					url = commenter_url
				}
				if (url=="") {
					greeting += commenter_name;
				} else {
					greeting += '<a href="' + url + '">' + commenter_name + '</a>';
				}
				greeting += '. Now you can comment. (<a href="' + _signout + '&entry_id=' + entry_id + '">sign out</a>)';
				commentergreeting.innerHTML = greeting;
				commentforminner.style.display = "block";
				var inputs = userinformation.getElementsByTagName("input");
				for (var i=0; i<inputs.length; ++i) {
					var input = inputs[i];
					input.disabled = "disabled";
				}
				commentmemory.style.display = "none";
			} else if (commenter_name) {
				greeting = 'You do not have permission to comment on this blog. (<a href="' + _signout + '&entry_id=' + entry_id + '">sign out</a>)';
				commentergreeting.innerHTML = greeting;
				commentforminner.style.display = "none";
			} else {
				greeting = '<a href="' + _basepath + '?__mode=login&entry_id=' + entry_id + '&blog_id=' + _blogid + '&static=1">Sign in</a> to comment on this entry';
				if (_regRequired) {
					greeting += '.';
				} else {
					greeting += ', or <a href="javascript:itdr.classes.Comments.showForm(\'entry-' + entry_id + '\');">comment anonymously.</a>'
				}
				if (commentergreeting) commentergreeting.innerHTML = greeting;
				commentforminner.style.display = "none";
			}
		}
		// use cookies to fill in the fields
		if (!commenter_name && form.email!=undefined) form.email.value = mtcmtmail;
		if (!commenter_name && form.author!=undefined) form.author.value = mtcmtauth;
		if (form.url != undefined) form.url.value = mtcmthome;
		if (form.bakecookie) {
			if (mtcmtauth||mtcmthome||mtcmtmail) {
				form.bakecookie.checked = "checked";
			} else {
				form.bakecookie.checked = "";
			}
		}
		// assign onblur functions
		var inputs = commentforminputwrapper.getElementsByTagName("input");
		for (var i=0; i<inputs.length; ++i) {
			var input = inputs[i];
			input.onfocus = pseudoFocus;
			input.onblur = validateFormInput;
			input.onblur();
		}
		var textarea = commentforminputwrapper.getElementsByTagName("textarea")[0];
		textarea.onfocus = pseudoFocus;
		textarea.onblur = validateFormInput;
		textarea.onblur();
		// assign a memory toggle
		var input = commentmemory.getElementsByTagName("input")[0];
		input.onclick = toggleMemory;
	}
	// public methods
	this.setBlogRoot = function (path) {
		blogroot = path;
	}
	this.setBlogID = function (id) {
		_blogid = id;
	}
	this.setBasePath = function (path) {
		_basepath = path;
	}
	this.setSignOut = function (path) {
		_signout = path;
	}
	this.allow = function (bool) {
		_allow = bool;
	}
	this.useCAPTCHA = function (bool) {
		_captcha = bool;
	}
	this.registration = function (allow, require) {
		_regAllowed = allow;
		_regRequired = require;
	}
	this.showForm = function (entry_id) {
		var entry = document.getElementById(entry_id);
		var form = itdr.func.getElementsByClassName("CommentForm", "form", entry)[0];
		var commentforminner = itdr.func.getElementsByClassName("CommentFormInner", "div", form)[0];
		commentforminner.style.display = "block";
	}
	// do everything on dom load
	itdr.func.DOMLoad(init);
}

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;
