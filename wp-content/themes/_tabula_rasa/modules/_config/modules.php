<?php





/**
 * Localize AJAX to the front-end, or something?
 *
 * @return void
 */
function tr__frontend_ajax() {
	wp_localize_script( 'tr__modules', 'tr__ajax',[
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	]);
}
add_action( 'wp_enqueue_scripts', 'tr__frontend_ajax' );



 





/**
 * Staff Member Bio Lightbox AJAX Callback
 * passes the staff member's custom fields through AJAX to the lightbox
 *
 * @return void
 */
function tr__biolightbox_callback() {
	$postid = intval( $_GET['id'] );
	$post = get_post( $postid );
	setup_postdata( $post );
	$rec = get_fields($post->ID)['staff_member'];
	include( locate_template( 'modules/module-staff/staff-lightbox.php', false, false ) ); 
	wp_die(); // ! this is required to terminate immediately and return a proper response
}
add_action( 'wp_ajax_tr__biolightbox', 'tr__biolightbox_callback' ); // user is logged-in
add_action( 'wp_ajax_nopriv_tr__biolightbox', 'tr__biolightbox_callback' ); // user is not logged-in












/**
 * 
 * 	Redirect the staff single to the template in the module
 * 		
 */
function tr__redirect_staff_post_template($single_template){
	global $post;
	if ( 'staff' === $post->post_type ) {
		$single_template = get_template_directory().'/modules/module-staff/module-staff-single.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'tr__redirect_staff_post_template' );








?>