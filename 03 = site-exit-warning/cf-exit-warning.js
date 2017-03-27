(function ( window, document, undefined ) {
	'use strict';

	var ExitWarning = {

		init: function() {
			this.siteHostname = this.getSiteHostname();
			this.links = document.getElementsByTagName('a');
			this.bindEvents();
		},

		getSiteHostname: function() {
			var sitelink = document.createElement('a');
			sitelink.href = cfExit.siteUrl;
			return sitelink.hostname;
		},

		bindEvents: function() {
			for ( var i = 0, length = this.links.length; i < length; i++ ) {
				// Only bind to external links
				if ( this.shouldWarnUser( this.links[i] ) ) {
					this.links[i].addEventListener( 'click', this.showWarning, true );
				}
			}
		},

		shouldWarnUser: function( link ) {
			// Link is external and doesn't have "no-warning" class name
			return link.hostname !== this.siteHostname && -1 === link.parentElement.className.indexOf( 'no-warning' ) && -1 === link.className.indexOf( 'no-warning' );
		},

		showWarning: function( event ) {
			event.preventDefault();
			if ( confirm( cfExit.warningText ) ) {
				if ( this.target == '_blank') {
					window.open( this.href);
				} else {
					window.location = this.href;
				}
			}
		}
	};

	ExitWarning.init();

})( window, document );
