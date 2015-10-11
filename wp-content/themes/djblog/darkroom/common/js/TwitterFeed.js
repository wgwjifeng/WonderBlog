/* TwitterFeed class

	<div id="twitter">
		<div id="twitter-title"></div>
		<div id="twitter-link"></div>
		<div id="twitter-tweet"></div>
	</div>
	<script type="text/javascript">
		itdr.classes.TwitterFeed.setTwitterer("hypergeneric", "14608808");
		// the following are all completely optional
		itdr.classes.TwitterFeed.setBasePath("/darkroom/");
		itdr.classes.TwitterFeed.setTweetTimeline("friends");
		itdr.classes.TwitterFeed.setAutoHide(true);
		itdr.classes.TwitterFeed.setStringTable({
			loading: "loading my tweets ...",
			anchor: "see my twitter page",
			title: "i am currently ..."
		});
	</script>

*/

if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.TwitterFeed) itdr.classes.TwitterFeed = new function () {
	// private members
	var _use = false;
	var loader;
	var basePath = "/darkroom/";
	var stringTable = {
		loading : "Please Wait ...",
		anchor : "Follow me on Twitter",
		title : "What am I doing ..."
	}
	var uid;
	var username;
	var timeline = "user";
	var hide = false;
	// private functions
	function relative_time(time_value) {
		var post_date = Date.parse(time_value);
		var now = new Date();
        var delta = parseInt((now.getTime() - post_date) / 1000);
        var r = '';
        if (delta < 60) {
            r = 'less than a minute ago';
        } else if(delta < 120) {
            r = 'about a minute ago';
        } else if(delta < (45*60)) {
            r = (parseInt(delta / 60)).toString() + ' minutes ago';
        } else if(delta < (2*90*60)) { // 2* because sometimes read 1 hours ago
            r = 'about an hour ago';
        } else if(delta < (24*60*60)) {
            r = 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
        } else if(delta < (48*60*60)) {
            r = '1 day ago';
        } else {
            r = (parseInt(delta / 86400)).toString() + ' days ago';
        }
        return r;
    }
	function loaded () {
		var xml = loader.getXML();
		var item = xml.getElementsByTagName("item")[0];
		var pubDate = relative_time(item.getElementsByTagName("pubDate")[0].firstChild.nodeValue);
		var title = item.getElementsByTagName("title")[0].firstChild.nodeValue;
		title = title.split(": ");
		title.shift();
		title = title.join(": ");
		var twitterTweet = document.getElementById("twitter-tweet");
		twitterTweet.innerHTML = title;
		var twitterTime = document.getElementById("twitter-time");
		twitterTime.innerHTML = pubDate;
		// unhide if necessary
		if (hide) {
			var twitter = document.getElementById("twitter");
			twitter.style.display = "block";
		}
	}
	function init () {
		if (_use==false) return;
		// hide if necessary
		if (hide) {
			var twitter = document.getElementById("twitter");
			twitter.style.display = "none";
		}
		// set the title text
		var twitterTitle = document.getElementById("twitter-title");
		twitterTitle.innerHTML = stringTable.title;
		// set the anchor
		var twitterLink = document.getElementById("twitter-link");
		twitterLink.innerHTML = '<a href="http://twitter.com/' + username + '" target="_blank">' + stringTable.anchor + '</a>';
		// set the loading text in the tweet area for the time being
		var twitterTweet = document.getElementById("twitter-tweet");
		twitterTweet.innerHTML = stringTable.loading;
		// load the rss feed
		loader = new itdr.classes.AjaxConnection();
		loader.setVariable("uid", uid);
		loader.setVariable("tl", timeline);
		loader.onLoad = loaded;
		loader.sendAndLoad(basePath + "common/php/get.twitter.feed.php", "POST");
	}
	// public methods
	this.use = function (bool) {
		_use = bool;
	}
	this.setAutoHide = function (bool) {
		hide = bool;
	}
	this.setBasePath = function (path) {
		basePath = path;
	}
	this.setTwitterer = function (name, id) {
		uid = id;
		username = name;
	}
	this.setTweetTimeline = function (type) {
		timeline = type;
	}
	this.setStringTable = function (obj) {
		for (var prop in obj) stringTable[prop] = obj[prop];
	}
	// do everything on dom load
	itdr.func.DOMLoad(init);
}

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;
