	/**
	 * jquery.dlmenu.js v1.0.1
	 * http://www.codrops.com
	 *
	 * Licensed under the MIT license.
	 * http://www.opensource.org/licenses/mit-license.php
	 *
	 * Copyright 2013, Codrops
	 * http://www.codrops.com
	 */
	;( function( $, window, undefined ) {

		'use strict';

		// global
		var $body = $( 'body' );

		var MENU_MAX_HEIGHT = 305;
		var NAV_DEF = 'Main menu'

		var helperElem = document.createElement('div');

		var vendorPrefix = (function () {
		  var styles = window.getComputedStyle(document.documentElement, ''),
		    pre = (Array.prototype.slice
		      .call(styles)
		      .join('')
		      .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
		    )[1],
		    dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
		  return {
		    dom: dom,
		    lowercase: pre,
		    css: '-' + pre + '-',
		    js: pre[0].toUpperCase() + pre.substr(1)
		  };
		})();

		var supportAnimations = function () {
			var animation = false,
			    animationstring = 'animation',
			    keyframeprefix = '',
			    domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
			    pfx  = '';

			if( helperElem.style.animationName !== undefined ) { animation = true; }

			if( animation === false ) {
			  for( var i = 0; i < domPrefixes.length; i++ ) {
			    if( helperElem.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
			      pfx = domPrefixes[ i ];
			      animationstring = pfx + 'Animation';
			      keyframeprefix = '-' + pfx.toLowerCase() + '-';
			      animation = true;
			      break;
			    }
			  }
			}
			return animation;
		}();
		var supportTransitions = function(){
			var b = document.body || document.documentElement;
			var s = b.style;
			var p = 'transition';
			if (typeof s[p] == 'string') {
				return true;
			}

			// Tests for vendor specific prop
			var v = ['Moz', 'webkit', 'Webkit', 'Khtml', 'O', 'ms'],
				p = p.charAt(0).toUpperCase() + p.substr(1);
			for (var i = 0; i < v.length; i++) {
				if (typeof s[v[i] + p] == 'string') {
					return true;
				}
			}
			return false;
		}();


		$.DLMenu = function( options, element ) {
			this.$el = $( element );
			this._init( options );
		};

		// the options
		$.DLMenu.defaults = {
			// classes for the animation effects
			animationClasses : { classin : 'dl-animate-in-1', classout : 'dl-animate-out-1' },
			// callback: click a link that has a sub menu
			// el is the link element (li); name is the level name
			onLevelClick : function( el, name ) { return false; },
			// callback: click a link that does not have a sub menu
			// el is the link element (li); ev is the event obj
			onLinkClick : function( el, ev ) {
				var hr = $(el).find('a').attr('href');
				if (!hr) return;

				ev.preventDefault();
				$('body').addClass('blurry-body-out');
				location.href = hr;
				return false;
			}
		};

		$.DLMenu.prototype = {
			_init : function( options ) {
				// options
				this.options = $.extend( true, {}, $.DLMenu.defaults, options );
				// cache some elements and initialize some variables
				this._config();

				if (this.$menu.find('> li').length > 5) this.$shadowB.show();

				var animEndEventNames = {
						'webkitanimation' : 'webkitAnimationEnd',
						'mozanimation' : 'mozAnimationEnd',
						'oanimation' : 'oAnimationEnd',
						'msanimation' : 'MSAnimationEnd',
						'animation' : 'animationend'
					},
					transEndEventNames = {
						'webkittransition' : 'webkitTransitionEnd',
						'moztransition' : 'transitionend',
						'otransition' : 'oTransitionEnd',
						'mstransition' : 'MSTransitionEnd',
						'transition' : 'transitionend'
					};
				// animation end event name
				this.animEndEventName = animEndEventNames[ vendorPrefix.lowercase + 'animation' ] + '.dlmenu';
				// transition end event name
				this.transEndEventName = transEndEventNames[ vendorPrefix.lowercase + 'transition' ] + '.dlmenu',
				// support for css animations and css transitions
				this.supportAnimations = supportAnimations,
				this.supportTransitions = supportTransitions;

				this._initEvents();

			},
			_config : function() {
				this.open = false;
				this.reset = this._resetMenu;
				this.$blurry = this.$el.closest('#blurry-menu');
				this.$navbar = this.$blurry.find('#blurry-menu-navbar');
				this.$shadowB = this.$blurry.find('#blurry-menu-navbar-shadow-bottom');
				this.$trigger = this.$el.children( '.dl-trigger' );
				this.$menu = this.$el.children( 'ul.dl-menu' );
				this.$menuitems = this.$menu.find( 'li:not(.dl-back)' );
				this.$el.find( 'ul.dl-submenu' ).prepend( '<li class="dl-back"><a href="#">back</a></li>' );
				this.$back = this.$menu.find( 'li.dl-back' );
			},
			_initEvents : function() {

				var self = this;

				this.$trigger.on( 'click.dlmenu', function() {

					if( self.open ) {
						self._closeMenu();
					}
					else {
						self._openMenu();
					}
					return false;

				} );

				this.$menuitems.on( 'click.dlmenu', function( event ) {

					event.stopPropagation();

					var $item = $(this),
						$submenu = $item.children( 'ul.dl-submenu' );

					var _h;

					if( $submenu.length > 0 ) {

						$submenu.add($item).css('-webkit-overflow-scrolling', '');
						self.$shadowB.hide();

						var $flyin = $submenu.clone().css( 'opacity', 0 ).insertAfter( self.$menu ),
							onAnimationEndFn = function() {

								self.$menu.off( self.animEndEventName ).removeClass( self.options.animationClasses.classout ).addClass( 'dl-subview' );
								$item.addClass( 'dl-subviewopen' ).parents( '.dl-subviewopen:first' ).removeClass( 'dl-subviewopen' ).addClass( 'dl-subview' );
								$flyin.remove();
								$submenu.css( '-webkit-overflow-scrolling', 'touch' );

								if (_h >= MENU_MAX_HEIGHT) {
									self.$shadowB.fadeIn(); // TODO css3
								}
							};

						_h = $flyin.outerHeight();

						self.$navbar.html('<span>back</span>' || '<span>' + $item.find('> a').text() + '</span>');

						setTimeout( function() {

							$flyin.addClass( self.options.animationClasses.classin );
							self.$menu.addClass( self.options.animationClasses.classout );
							if( self.supportAnimations && self.animEndEventName.indexOf('moz') === -1) {

								self.$menu.on( self.animEndEventName, onAnimationEndFn );
							}
							else {
								onAnimationEndFn.call();
							}

							self.options.onLevelClick( $item, $item.children( 'a:first' ).text() );
						} );

						return false;

					}
					else {
						return false;
						//self.options.onLinkClick( $item, event );
					}

				}).find('a').click(function(e){
						e.preventDefault();
				});

				this.$back.on( 'click.dlmenu', function( event ) {

					var $this = $( this ),
						$submenu = $this.parents( 'ul.dl-submenu:first' ),
						$item = $submenu.parent(),

						$flyin = $submenu.clone().insertAfter( self.$menu ).css( 'opacity', 0 );

					var onAnimationEndFn = function() {

						self.$menu.off( self.animEndEventName ).removeClass( self.options.animationClasses.classin );
						$flyin.remove();
					};

					self.$shadowB.hide();

					setTimeout( function() {
						$flyin.addClass( self.options.animationClasses.classout );
						self.$menu.addClass( self.options.animationClasses.classin );
						if( self.supportAnimations ) {
							self.$menu.on( self.animEndEventName, onAnimationEndFn );
						}
						else {
							onAnimationEndFn.call();
						}

						$item.removeClass( 'dl-subviewopen' );

						var $subview = $this.parents( '.dl-subview:first' );
						if( $subview.is( 'li' ) ) {
							$subview.addClass( 'dl-subviewopen' );
						}
						$subview.removeClass( 'dl-subview' );

						if ($subview.outerHeight() >= MENU_MAX_HEIGHT) {
							self.$shadowB.fadeIn(); // TODO css3
						}

						if ($item.closest('ul').is('.dl-menu')) self.$navbar.html(NAV_DEF);
					} );

					return false;

				} );

				this.$navbar.click(function(){
					self.$menu.find('.dl-subviewopen .dl-submenu .dl-back a').click()
				});

			},
			closeMenu : function() {
				if( this.open ) {
					this._closeMenu();
				}
			},
			_closeMenu : function() {
				console.log('close')
				var self = this,
					onTransitionEndFn = function() {
						self.$menu.off( self.transEndEventName );
						self._resetMenu();
					};

				this.$menu.removeClass( 'dl-menuopen' );
				this.$menu.addClass( 'dl-menu-toggle' );
				this.$trigger.removeClass( 'dl-active' );

				if( this.supportTransitions ) {
					this.$menu.on( this.transEndEventName, onTransitionEndFn );
				}
				else {
					onTransitionEndFn.call();
				}

				this.open = false;
			},
			openMenu : function() {
				if( !this.open ) {
					this._openMenu();
				}
			},
			_openMenu : function() {
				var self = this;
				// clicking somewhere else makes the menu close
				$body.off( 'click' ).on( 'click.dlmenu', function() {
					self._closeMenu() ;
				} );
				this.$menu.addClass( 'dl-menuopen dl-menu-toggle' ).on( this.transEndEventName, function() {
					$( this ).removeClass( 'dl-menu-toggle' );
				} );
				this.$trigger.addClass( 'dl-active' );
				this.open = true;
			},
			// resets the menu to its original state (first level of options)
			_resetMenu : function() {
				this.$menu.removeClass( 'dl-subview' );
				this.$menuitems.removeClass( 'dl-subview dl-subviewopen' );
				this.$navbar.html(NAV_DEF)
			}
		};

		var logError = function( message ) {
			if ( window.console ) {
				window.console.error( message );
			}
		};

		$.fn.dlmenu = function( options ) {
			if ( typeof options === 'string' ) {
				var args = Array.prototype.slice.call( arguments, 1 );
				this.each(function() {
					var instance = $.data( this, 'dlmenu' );
					if ( !instance ) {
						logError( "cannot call methods on dlmenu prior to initialization; " +
						"attempted to call method '" + options + "'" );
						return;
					}
					if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
						logError( "no such method '" + options + "' for dlmenu instance" );
						return;
					}
					instance[ options ].apply( instance, args );
				});
			}
			else {
				this.each(function() {
					/*var instance = $.data( this, 'dlmenu' );
					if ( instance ) {
						instance._init();
					}
					else {
						instance = $.data( this, 'dlmenu', new $.DLMenu( options, this) );
					}*/
					var instance = new $.DLMenu( options, this);
					$.data( this, 'dlmenu', instance);
				});
			}
			return this;
		};

	} )( jQuery, window );
