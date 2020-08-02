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
      if( $('.js__dropdown').length ){
        
        var collapsables = $('.js__dropdown');

        
        collapsables.each(function(index, element){
        
        
          $(element).on('click', '> .js__dropdown-title', function(e){


            $(this).next('div').slideToggle();
            
            
          });
        });
      }
    });
  }(window.jQuery, window, document));