// import 'underscore';
import {throttle, debounce} from 'underscore';

/**
 * @param {*} $ 
 * @param {*} window 
 * @param {*} document 
 */
(function ($, window, document, _) {
	/**
	 *   Fire Immediately 
	 */



	/**
	 *   jQuery Document Ready
	 */
	$(function () {


		var tr_nav = {

			// Constructor
			_init: function () {

				// 
				$('header.header .navlinks').on('click', 'li.menu-item-has-children > a', this._didClickParent);


				// 
				$('header.header').on('click', '.navicons', this._didClickNavIcons);

				$(window).on('resize scroll', throttle(this._onResizeScroll, 200));


			},


			// Methods
			_didClickNavIcons: function (e) {

				$(this).toggleClass('revealed');
				$(this).next('.navlinks').toggleClass('revealed');
				
				
			},
			_didClickParent: function (e) {
				
				// stop the click from navigating (only toggles the menu open)
				e.preventDefault();
				
				$(e.target.offsetParent).toggleClass('revealed');				// toggle this <li> reveal class (active state)

			},
			_onResizeScroll: function(e) {

				$('header.header .navicons.revealed, header.header .navlinks.revealed, li.menu-item-has-children.revealed').removeClass('revealed');

			}



		}
		tr_nav._init();



	});
}(window.jQuery, window, document, window._));