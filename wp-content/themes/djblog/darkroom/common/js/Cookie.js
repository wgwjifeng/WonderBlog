
/**
 * Cookie singleton
 * comes in three flavors: set, get and kill -- pretty simple
 * i ripped most of the logic from www.quirksmode.org -- love that guy.
 */
if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.Cookie) itdr.classes.Cookie = new function () {
	/**
	 *
	 * Cookie.set
	 * set a session cookie
	 *
	 * @param name		String -- the name of the cookie name-value pair
	 * @param value		String -- the value of the cookie name-value pair
	 * @param days		Number -- the value of the cookie name-value pair
	 *
	 */
	this.set = function(name, value, days) {
		var expires = ""
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			expires = "; expires="+date.toGMTString();
		}
		document.cookie = name+"="+value+expires+"; path=/";
	};
	/**
	 *
	 * Cookie.get
	 * get a previously saved session cookie
	 *
	 * @param name		String -- the name of the cookie name-value pair
	 * @return			String -- the value of the name-pair in the form a of a string
	 *						or empty string if no value present
	 *
	 */
	this.get = function(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i< ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return "";
	};
	/**
	 *
	 * Cookie.kill
	 * delete a previously saved session cookie
	 *
	 * @param name		String -- the name of the cookie name-value pair to delete
	 *
	 */
	this.kill = function(name) {
		this.set(name,"",-1)
	};
}

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;
