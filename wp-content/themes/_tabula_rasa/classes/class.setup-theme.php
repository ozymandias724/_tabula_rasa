<?php 
/**
 * 	Setup The Theme
 */
class SetupTheme
{

	/**
	 * Initialize Setup Theme
	 *
	 * @return void
	 */
	public static function _init(){
		// 
		add_action( 'wp_enqueue_scripts', 'SetupTheme::enqueue_scripts');
		add_action( 'admin_enqueue_scripts', 'SetupTheme::admin_enqueue_scripts');
		// 
		add_action( "after_setup_theme", "SetupTheme::after_setup_theme");
		add_action(" init", "SetupTheme::init" );
		
		// clean up the head
		SetupTheme::clean_head();
	}


	/**
	 * Hooks into WordPress after_setup_theme action
	 *
	 * @return void
	 */
	public static function after_setup_theme(){
		add_theme_support( 'html5' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo' );

		register_nav_menus(array(
			'header' => 'Header'
			,'footer_1' => 'Footer (1st column)'
			,'footer_2' => 'Footer (2nd column)'
		));
	}
	
	/**
	 * Hook into WordPress Init action
	 *
	 * @return void
	 */ 
	public static function init(){
		add_post_type_support( 'page', 'excerpt' );
	}


	/**
	 * Register && Enqueue Theme Scripts
	 *
	 * @return void
	 */
	public static function enqueue_scripts(){


		wp_deregister_script('jquery'); // deregister default jQuery
		wp_enqueue_script('jquery', get_template_directory_uri().'/_precomp/js/_lib/jquery.min.js', array(), null, true); // register jQuery v3.4.1

		wp_register_style( 
			'fa5css'
			, get_template_directory_uri() . '/_precomp/sass/_lib/fa5/css/all.min.css'
		);
		
		wp_register_style( 
			'mfp-css'
			, get_template_directory_uri() . '/_precomp/sass/_lib/magnific-popup.css'
		);
		
		wp_register_style( 
			'select2-css'
			, get_template_directory_uri() . '/_precomp/sass/_lib/select2.min.css'
		);
		wp_register_style( 
			'select2-css-theme'
			, get_template_directory_uri() . '/_precomp/sass/_lib/select2-bootstrap4.min.css'
		);
		
		wp_register_style( 
			'main'
			, get_template_directory_uri() . '/_build/css/main.css'
			, array()
			, filemtime(get_template_directory() . '/_build/css/main.css')
			,'all'
		);
		
		
		wp_enqueue_style( 'fa5css' );
		wp_enqueue_style( 'mfp-css' );
		wp_enqueue_style( 'select2-css' );
		wp_enqueue_style( 'select2-css-theme' );
		wp_enqueue_style( 'main' );
	   
		
		// main theme scripts
		wp_register_script( 
			'main'
			, get_template_directory_uri() . '/_build/js/main.js'
			, array('jquery')
			, filemtime(get_template_directory() . '/_build/js/main.js')
			, true
		);
		// 
		wp_register_script( 
			'tr_nav'
			, get_template_directory_uri() . '/_build/js/nav.js'
			, array('main')
			, filemtime(get_template_directory() . '/_build/js/nav.js')
			, true
		);
		wp_register_script( 
			'tr_modules'
			, get_template_directory_uri() . '/_build/js/modules.js'
			, array('main')
			, filemtime(get_template_directory() . '/_build/js/modules.js')
			, true
		);

		wp_register_script(
			'mfp-js'
			, get_template_directory_uri() . '/_precomp/js/_lib/jquery.magnific-popup.min.js'
			,array()
			,false
			,true
		);

		wp_register_script(
			'select2-js'
			, get_template_directory_uri() . '/_precomp/js/_lib/select2.min.js'
			,array()
			,false
			,true
		);


		// 
		wp_enqueue_script( 'select2-js' );
		wp_enqueue_script( 'mfp-js' );
		wp_enqueue_script( 'main' );
		wp_enqueue_script( 'tr_nav' );
		wp_enqueue_script( 'tr_modules' );


	}
 
	/**
	 * Register && Enqueue Admin Styles
	 *
	 * @return void
	 */
	public static function admin_enqueue_scripts(){
		// 
		wp_register_style( 
			'admin'
			, get_template_directory_uri() . '/_build/css/admin.css'
			, array()
			, filemtime(get_template_directory() . '/_build/css/admin.css')
			,'all'
		);
		// 
		wp_enqueue_style( 'admin' );
		// 
		wp_enqueue_script( 'admin' );
	}
	
	/**
	 * Clean WP_Head() call
	 *
	 * @return void
	 */
	public static function clean_head(){
		remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
		remove_action('wp_head', 'wp_generator'); // remove wordpress version
		remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
		remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
		remove_action('wp_head', 'index_rel_link'); // remove link to index page
		remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
		remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
		remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink
		remove_action('wp_head', 'wp_resource_hints', 2 );
		remove_action('wp_print_styles', 'print_emoji_styles');
		// 
		add_filter( 'show_admin_bar', '__return_false' );
		add_filter( 'emoji_svg_url', '__return_false' );
		// 
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}
}
SetupTheme::_init();
