
itdr.classes.CommentSpace.__toggle = itdr.classes.CommentSpace.toggle;
itdr.classes.CommentSpace.toggle = function (entryid, type) {
	itdr.classes.CommentSpace.__toggle(entryid, type);
	itdr.classes.Comments.showForm(entryid);
}

// make all external links popup in new window
itdr.func.DOMLoad(itdr.func.createExternalLinks);

// setup flash header
with (itdr.classes.FlashHeader) {
	use(true);
	setTransparency(true);
	setFlashVersion("7.0.0");
}

// setup twitter
with (itdr.classes.TwitterFeed) {
	use(true);
	setTwitterer("amelialyon", "14081542");
	setAutoHide(false);
	setStringTable({
		loading: "loading my tweets ...",
		anchor: "follow me on twitter",
		title: "TWITTER UPDATES"
	});
}

// setup image replacement
with (itdr.classes.ImageReplace) {
	setDefaults({
		wordwrap: false,
		font: "blog/fonts/broken15.ttf",
		color: "#000000",
		size: 18,
		backgroundColor: "#FFFFFF",
		transparent: false,
		aliasing: 2
	});
}

// setup comment space toggle
with (itdr.classes.CommentSpace) {
	comments (true, true, true); // hideOnLoad, allowToggle, hideIfZero
	trackbacks (true, true); // hideOnLoad, allowToggle
	form (true, true); // hideOnLoad, allowToggle
}
