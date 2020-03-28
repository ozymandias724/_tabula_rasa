<?php 
/**
 * Header Nav
 */

    //  declare array of return strings
    $return = ['header'];

    $return['header'] = '<header class="header"><div class="container wide">';


    // if there is a custom site logo
    if( has_custom_logo( ) ){
        $logo_src = wp_get_attachment_image_src(  get_theme_mod( 'custom_logo' ) , 'full' )[0];
        $return['header'] .= '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'" class="logo logo--image"><img src="'.$logo_src.'"></a>';
    }
    // if there is not a custom site logo
    else {
        $return['header'] .= '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'"><div class="logo logo--text">'.get_bloginfo('name').'</div></a>';
    }
    
    // if the header location has a nav menu
    // show the nav menu
    if (has_nav_menu('header')) {
        $return['header'] .= '<div class="navicons"><i class="fas fa-bars"></i><i class="fas fa-times"></i></div>'; // write in the mobile nav icons
        $return['header'] .= tr__header_nav();
    }

    // close header
    $return['header'] .= '</div></header>';

    echo $return['header'];


    // clean up
    unset($return);
?>