<?php 
// 


/**
 * Filter the body_class function
 *
 * @param [type] $classes
 * @return void
 */
function do_filter_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name; // adds post-postname, page-pagename, customposttype-postname etc.
	}
	return $classes;
}
add_filter( 'body_class', 'do_filter_body_class' );












/**
 * TODO: FINISH THIS
 */
add_action( 'wp_footer', 'do_add_authoredby_subfooter' );
function do_add_authoredby_subfooter(){
	echo '<span id="madebykylemarcy">proudly built by <a href="kylemarcy.com" target="_blank">@kylemarcy.com</a></span>';
}







/**
 * TODO: FINISH THIS
 * Undocumented function
 *
 * @return void
 */
function tr__getLogo(){

	$return = '';
	if( has_custom_logo() ){
		$return .= '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'" class="logo logo--image"><img src="'.wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0].'"></a>';
	}
	else {
		$return .= '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'"><div class="logo logo--text">'.get_bloginfo('name').'</div></a>';
	}
	return $return;
}











 
/**
 * TODO: NEEDS WORK -- use a sprintf, and make it real nice please
 * 
 * 
 */
function get_the_address( $mapfield ){
	if( $mapfield ) {
		// Loop over segments and construct HTML.
		$address = '';
		foreach( array('street_number', 'street_name', 'city', 'state_short', 'post_code', 'country_short') as $i => $k ) {
			if( isset( $mapfield[ $k ] ) ) {
				$address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $mapfield[ $k ] );
			}
		}
		// Trim trailing comma.
		$address = trim( $address, ', ' );
		// Display HTML.
		return '<p>' . $address . '.</p>';
	}
}

/**
 * TODO: NEEDS WORK
 * Return Nav Menu Name by Location
 *
 * @param string $location
 * @return string
 */
function get_nav_menu_name($location = ''){
	$theme_locations = get_nav_menu_locations();
	$menu_obj = get_term( $theme_locations[$location], 'nav_menu' );
	return $menu_obj->name;
}


/**
 *  TODO: NEEDS WORK
 */
	function get_iconlinks( $iLs ){

		if( $iLs ){
			$return = '<ul class="iconlinks">';
			foreach( $iLs as $iL ){

				$return .= sprintf(
					'<li class="iconlinks-icon"><a href="%1$s" title="%2$s" target="%3$s">%4$s%5$s</a></li>'
					,$iL['link']['url']
					,$iL['link']['title']
					,$iL['link']['target']
					,$iL['icon']
					,$iL['text']
				);
			}

			$return .= '</ul>';

			return $return;
		}
		
	}
// 


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
		'icon_url'      => '',
		'position' 		=> 2,
		// 'redirect'		=> false,
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'General',
		'menu_title'	=> 'General', 
		'parent_slug'	=> 'theme-settings',
		'icon_url' => '',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Content',
		'menu_title'	=> 'Content', 
		'parent_slug'	=> 'theme-settings',
		'icon_url' => '',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social',
		'menu_title'	=> 'Social', 
		'parent_slug'	=> 'theme-settings',
		'icon_url' => '',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-settings',
		'icon_url' => '',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-settings',
		'icon_url' => '',
	));

	

}



/**
 * 
 *  Set ACF map API key (examples below)
 *       
 *   acf free uses this:
 * 
 *       add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
 *       function my_acf_google_map_api($api)
 *       {
 *           $api['key'] = 'xxx';
 *           return $api;
 *       }
 *       
 *       
 *   acf pro uses this
 * 
 *       add_action('acf/init', 'set_maps_api_key');
 *       function set_maps_api_key() {
 *           acf_update_setting('google_api_key', 'AIzaSyBBX0KJ6MEzWrMPeH84FNUftS9KcAA9-g4');
 *       }
 *       
 */
add_action('acf/init', 'set_maps_api_key');
function set_maps_api_key() {
		acf_update_setting('google_api_key', 'AIzaSyBBX0KJ6MEzWrMPeH84FNUftS9KcAA9-g4');

}

?>