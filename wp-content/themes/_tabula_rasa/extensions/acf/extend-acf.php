<?php 
include_once(__DIR__.'/acf-addressgroup.php');  

/**
 * 
 *  Add Options Pages
 * 
*/
if( function_exists('acf_add_options_page') ) {

	// Main Theme Settings
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'read_private_posts',
		'icon_url'      => 'dashicons-admin-settings',
		'redirect'		=> false,
        'position' 		=> 3,
    ));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-settings',
	));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-settings',
	));
}

?>