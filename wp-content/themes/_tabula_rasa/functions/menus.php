<?php
/**
 * 
 */


  function tr__getMenu($echo = false, $location = null, $menu = null){

    // dynamically set args
    $args = array(
      // static $args:
      'container' => 'nav'                   // all nav menus use nav.navlinks pattern
      ,'container_class' => 'navlinks'        // all nav menus use nav.navlinks pattern
      ,'link_before' => '<span>'              // wrap link text in <span> for accentUnderlines
      ,'link_after' => '</span>'              // wrap link text in <span> for accentUnderlines
      // dynamic $args:
      ,'echo' => $echo
      ,'theme_location' => $location
      ,'menu' => $menu
    );

    // return the menu call
    return wp_nav_menu($args);
  }

  function tr__navMenu_classHandler( $classes, $item, $args, $depth ) {

    $useClasses = array(
			'menu-item-has-children'
			,'current-menu-item'
			,'current-menu-parent'
			,'current-menu-ancestor'
		);
    $classes = array_intersect($classes,$useClasses);
    
    return $classes;
  }
 
  add_filter( 'nav_menu_css_class', 'tr__navMenu_classHandler', 10, 4 ); 
  



// 
?>