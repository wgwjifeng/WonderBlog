/**
 * "AjaxConnection"
 * a simple class to create AJAX functionality
 */
if (!itdr) var itdr = new Object();
if (!itdr.classes) itdr.classes = new Object();
if (!itdr.classes.AjaxConnection) itdr.classes.AjaxConnection = function () {
	/**
	 *
	 * Constructor
	 */
	var self = this;
	var variables = new Object();
	var XMLHTTP;
	/**
	 *
	 * Private AjaxConnection.getXMLHTTPObject
	 * return a new xmlhttp object for this browser
	 *
	 * @return XMLHTTP object
	 */
	function getXMLHTTPObject () {
		var req = false;
		if (window.XMLHttpRequest && !(window.ActiveXObject)) { // branch for native XMLHttpRequest object
			try {
				req = new XMLHttpRequest();
			} catch(e) {
				req = false;
			}
		} else if (window.ActiveXObject) { // branch for IE/Windows ActiveX version
			try {
				req = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				try {
					req = new ActiveXObject("Microsoft.XMLHTTP");
				} catch(e) {
					req = false;
				}
			}
		}
		if (req) {
			return req;
		}
	}
	/**
	 *
	 * Private AjaxConnection.getNameValuePairs
	 *
	 * @return String: a concatenated, escaped string of name-value pairs
	 */
	function getNameValuePairs () {
		var result = "";
		for (var prop in variables) result += "&" + escape(prop) + "=" + escape(variables[prop]);
		return result.substring(1);
	}
	/**
	 *
	 * Public AjaxConnection.load
	 *
	 * @param URI:String
	 *	the url to load in as text/xml
	 */
	this.load = function (URI) {
		XMLHTTP = getXMLHTTPObject();
		XMLHTTP.open("GET", URI, true);
		XMLHTTP.onreadystatechange = function() {
			if (XMLHTTP.readyState == 4) self.onLoad();
		}
		XMLHTTP.send(null);
	}
	/**
	 *
	 * Public AjaxConnection.sendAndLoad
	 *
	 * @param URI:String
	 *	the url to load in as text/xml
	 * @return String: a concatenated, escaped string of name-value pairs
	 */
	this.sendAndLoad = function (URI, method) {
		var query = getNameValuePairs();
		if (method==undefined) method = "POST";
		if (method=="GET") {
			URI += "?" + query;
			query = null;
		}
		XMLHTTP = getXMLHTTPObject();
		XMLHTTP.open(method, URI, true);
		XMLHTTP.onreadystatechange = function() {
			if (XMLHTTP.readyState == 4) self.onLoad();
		}
		XMLHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		XMLHTTP.send(query);
	}
	/**
	 *
	 * Public AjaxConnection.setVariable
	 *
	 * @param name:String
	 *	the variable name to send and store
	 * @param value:String
	 *	the variable value to send and store
	 */
	this.setVariable = function (name, value) {
		variables[name] = value;
	}
	/**
	 *
	 * Public AjaxConnection.getText
	 *
	 * @return String
	 *	the raw text response
	 */
	this.getText = function () {
		return XMLHTTP.responseText;
	}
	/**
	 *
	 * Public AjaxConnection.getXML
	 *
	 * @return Object
	 *	the parsed xml object
	 */
	this.getXML = function () {
		return XMLHTTP.responseXML;
	}
	/**
	 *
	 * Public AjaxConnection.onLoad
	 *	onLoad stub
	 */
	this.onLoad = function () {
	}
}

// a little backwards compatibility
if (!thetainteractive) var thetainteractive = itdr;
if (!intothedarkroom) var intothedarkroom = itdr;