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
      if( $('.js__collapsable').length ){
        
        var collapsables = $('.js__collapsable');

        
        collapsables.each(function(index, element){
        
        
          $(element).on('click', '> .js__collapsable-title', function(e){


            $(this).next('div').slideToggle();
            
            
          });
        });
      }
    });
  }(window.jQuery, window, document));