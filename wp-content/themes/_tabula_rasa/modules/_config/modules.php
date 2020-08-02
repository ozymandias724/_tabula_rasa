<?php
/**
 * 
 */





function tr__frontend_ajax() {
	/**
	 * frontend ajax requests.
	 */
	wp_localize_script( 'tr_modules', 'tr__ajax',
			array( 
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
	);
}
add_action( 'wp_enqueue_scripts', 'tr__frontend_ajax' );

 

// TODO: (this should be able to go away!) for the admin area
add_action( 'wp_ajax_tr__biolightbox', 'tr__biolightbox_callback' );

// for the public area
add_action( 'wp_ajax_nopriv_tr__biolightbox', 'tr__biolightbox_callback' );

function tr__biolightbox_callback() {

	// $postid = intval( $_POST['id'] );
	$postid = intval( $_GET['id'] );
	$post = get_post( $postid );
	setup_postdata( $post );
	
	
	$rec = get_fields($post->ID)['staff_member'];
	$srcset = wp_get_attachment_image_srcset( $rec['headshot']['ID'] );

	include( locate_template( 'modules/module-staff/staff-lightbox.php', false, false ) ); 

	wp_die(); // ! this is required to terminate immediately and return a proper response
}




?>