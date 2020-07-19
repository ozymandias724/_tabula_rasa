// import {throttle, debounce} from 'underscore';

/**
 * @param {*} $ 
 * @param {*} window 
 * @param {*} document 
 */
(function ($, window, document) {
	/**
	 *   Fire Immediately 
	 */


	/**
	 *   jQuery Document Ready
	 */
	$(function () {



		if ($('.js__staff-filtering select').length) {


			$('.js__staff-filtering select').select2({
				placeholder: 'Select an option',
				theme: 'bootstrap4',
				minimumResultsForSearch: Infinity
			});


		}


		if ($('.tr__module-staff').length) {

			// ? this block of stuff works somehow it seems 

			$('.js__biolightbox').on('click', function (e) {
				e.preventDefault();
			});

			$('.js__biolightbox').magnificPopup({
				type: 'ajax',
				ajax: {
					settings: {
						url: tr__ajax.ajaxurl,
						action: 'tr__biolightbox'
					}
				},
				callbacks: {
					elementParse: function () {
						this.st.ajax.settings.data = {
							action: this.st.el.attr('data-action'),
							id: this.st.el.attr('data-postid')
						}
					}
				},
				parseAjax: function (response) {
					response.data = response.data.html;
				}
			});


		}

	});
}(window.jQuery, window, document));