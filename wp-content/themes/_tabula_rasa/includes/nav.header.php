<?php 
/**
 * Header Nav
 */

	//  declare array of return strings
	$return = ['header'];

	$return['header'] = '<header class="header"><div class="container wide">';

	$return['header'] .= tr__getLogo();
	
	// if the header location has a nav menu
	// show the nav menu
	if( has_nav_menu('header') ){
		$return['header'] .= '<div class="navicons"><i class="fas fa-bars"></i><i class="fas fa-times"></i></div>'.tr__getMenu(false, 'header'); // write in the mobile nav icons
	}

	// close header
	$return['header'] .= '</div></header>';

	echo $return['header'];

	// clean up
	unset($return);
?>