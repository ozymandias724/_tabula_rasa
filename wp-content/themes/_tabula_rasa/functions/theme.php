<?php 
/**
 * Filter the body_class function
 *
 * @param [type] $classes
 * @return void
 */
function do_filter_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name; // add custom post type to body class
	}
	return $classes;
}
add_filter( 'body_class', 'do_filter_body_class' );
 
 
add_action( 'wp_footer', 'do_add_authoredby_subfooter' );
function do_add_authoredby_subfooter(){

	echo '<span id="madebykylemarcy">proudly built by <a href="kylemarcy.com" target="_blank">@kylemarcy.com</a></span>';
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
	function get_iconlinks($field){
		$guide['icon_links'] = '<li class="iconlinks-icon"><a href="%s" title="">%s</a></li>';
		$return['icon_links'] = '<ul class="iconlinks">';
		foreach( $field['icon_links'] as $iL ){
				$return['icon_links'] .= sprintf(
						$guide['icon_links']
						,'#'
						,'<i class="'.$iL['icon']->class.'"></i>'
				);        
		}
		$return['icon_links'] .= '</ul>';
		return $return['icon_links'];
	}
// 



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