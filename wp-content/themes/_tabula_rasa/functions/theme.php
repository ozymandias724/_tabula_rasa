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
 
 
?>