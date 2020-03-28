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
 
 
 
 
 
?>