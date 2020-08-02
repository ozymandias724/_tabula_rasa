<?php
/**
 * 
 * 		Custom Posts	
 * 
 * 		TODO: the theme settings should be controlling what custom post types are created!
 * 		TODO: that also means CHECKING for existing types; and PROTECTING that data FFS
 * 		TODO: (figure that out more)
 */
class TR__CustomPosts
{


	public static function _init(){

		
		if( !empty(get_field('custom_content_types', 'options')) ){
			foreach( get_field('custom_content_types', 'options') as $cpt ){
				TR__CustomPosts::_register_custom_post_type(
					$name = !empty($cpt['name']) ? $cpt['name'] : ''
					,$singular = !empty($cpt['singular']) ? $cpt['singular'] : ''
					,$rewrite = !empty($cpt['rewrite']) ? $cpt['rewrite'] : ''
					,$hierarchical = !empty($cpt['hierarchical']) ? $cpt['hierarchical'] : ''
				);
			}
		}

		// * STAFF
		// TR__CustomPosts::_register_custom_post_type($name = 'Staff', $singular = 'Staff Member', $rewrite = 'Our Team');

		// TODO: incorporate adding custom taxonomies, and preloading custom terms, through the CMS
		TR__CustomPosts::_register_custom_taxonomy($post_type = 'Staff', $name = 'Departments', $singular = 'Department', $rewrite = '');
		TR__CustomPosts::_register_custom_taxonomy($post_type = 'Staff', $name = 'Staff Tags', $singular = 'Staff Tag', $hierarchical = false);
		TR__CustomPosts::_add_taxonomy_terms($taxonomy = 'Staff Tags', $terms = ['Leadership', 'Faculty', 'Staff', 'Temporary', 'Contract']); // ? these cannot ever be deleted if this is here
		
		
		

	}



	/**
	 * Undocumented function
	 *
	 * @param string $taxonomy
	 * @param array $terms
	 * @return void
	 */
	public static function _add_taxonomy_terms($taxonomy = '', $terms = [] ){
		$taxonomy = sanitize_title( $taxonomy );
		if( !empty($terms) ){
			foreach($terms as $term ){
				if( !term_exists( $term, $taxonomy )	 ){
					wp_insert_term( $term, $taxonomy );
				}
			}
		}
	}

	/**
	 * Undocumented function
	 *
	 * @param string $post_type
	 * @param string $name
	 * @param string $singular
	 * @param string $rewrite
	 * @return void
	 */
	public static function _register_custom_taxonomy($post_type = '', $name = '', $singular = '', $rewrite = '', $hierarchical = true, $ui = true){

		// check that the post type to attach this taxonomy to exists
		if( post_type_exists( sanitize_title($post_type) ) ){
			
			$labels = array(
				'name' => _x( $name, 'taxonomy general name' ),
				'singular_name' => _x( $singular, 'taxonomy singular name' ),
				'search_items' =>  __( 'Search '.$name ),
				'all_items' => __( 'All '.$name ),
				'parent_item' => __( 'Parent '.$singular ),
				'parent_item_colon' => __( 'Parent '.$name.':' ),
				'edit_item' => __( 'Edit '.$singular ), 
				'update_item' => __( 'Update '.$singular ),
				'add_new_item' => __( 'Add New '.$singular ),
				'new_item_name' => __( 'New '.$singular.' Name' ),
				'menu_name' => __( $name ),
			);
		
			$taxObj = register_taxonomy( sanitize_title( $name ) ,[sanitize_title($post_type)], array(
				'hierarchical' => $hierarchical,
				'labels' => $labels,
				'show_ui' => $ui,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => empty($rewrite) ? sanitize_title( $name ) : sanitize_title( $rewrite ) ),
			));
		
		}		
		
	}






	/**
	 * 		Register Custom Post Types (passing some important args, not all tho)
	 *
	 * @param string $name
	 * @param string $singular
	 * @param string $rewrite
	 * @return void
	 */
	public static function _register_custom_post_type( $name = '', $singular = '', $rewrite = '',  $hierarchical = false ){

		// check if this post type already exists
		if( !post_type_exists( sanitize_title( $name ) ) ){

			$labels = array(
				'name'                  => _x( $name, 'Post type general name', 'textdomain' ),
				'singular_name'         => _x( $singular, 'Post type singular name', 'textdomain' ),
				'menu_name'             => _x( $name, 'Admin Menu text', 'textdomain' ),
				'name_admin_bar'        => _x( $singular, 'Add New on Toolbar', 'textdomain' ),
				'add_new'               => __( 'Add New '.$singular, 'textdomain' ),
				'add_new_item'          => __( 'Add New '.$singular, 'textdomain' ),
				'new_item'              => __( 'New '.$singular, 'textdomain' ),
				'edit_item'             => __( 'Edit '.$singular, 'textdomain' ),
				'view_item'             => __( 'View '.$singular, 'textdomain' ),
				'all_items'             => __( 'All '.$name, 'textdomain' ),
				'search_items'          => __( 'Search '.$name, 'textdomain' ),
				'parent_item_colon'     => __( 'Parent '.$name.':', 'textdomain' ),
				'not_found'             => __( 'No '.$name.' found.', 'textdomain' ),
				'not_found_in_trash'    => __( 'No '.$name.' found in Trash.', 'textdomain' ),
				'featured_image'        => _x( $singular.' Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'archives'              => _x( $singular.' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
				'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
				'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
				'filter_items_list'     => _x( 'Filter '.$name.' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
				'items_list_navigation' => _x( $name.' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
				'items_list'            => _x( $name.' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
			);
	
			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => empty($rewrite) ? sanitize_title( $name ) : sanitize_title( $rewrite ) ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => $hierarchical,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			);
	
			register_post_type( sanitize_title( $name ), $args );
			
		}

	}






}

add_action('init', 'TR__CustomPosts::_init' )
;
 
 
 
?>