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







			if( $('.tr__module-dropdowns').length ){
				
				$('.tr__module-dropdowns').each(function(index, element){


					$(element).on('click', '.js__dropdown-title', function(e){
						e.stopPropagation();
						e.preventDefault();
						
						$(this).next('div').slideToggle(); // toggle this dropdown up or down
						$(this).parents('.dropdown').siblings().children('div').slideUp(); // toggle up all sibling dropdowns if they exist

						
						
					});

				});
				
			}







				

            
    });
  }(window.jQuery, window, document));