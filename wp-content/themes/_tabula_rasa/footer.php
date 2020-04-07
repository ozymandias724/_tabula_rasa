<?php
/**
 * 
 */
$return = [''];
$guides = [
	'
		<footer class="footer">
			<div class="container wide">
				%1$s
				%2$s
				%3$s
			</div>
		</footer>
	'
];
$tS = !empty(get_field('theme_settings', 'options')) ? get_field('theme_settings', 'options') : '';
// (template globals above)



	/**
	 * 	
	 */
		// theme settings gives us address, map, phone and email
	
	
	// 
	

	
	/**
	 * 	site logo
	 */

		if( has_custom_logo( ) ){
			$return['logo'] = '';
			$logo_src = wp_get_attachment_image_src(  get_theme_mod( 'custom_logo' ) , 'full' )[0];
			$return['logo'] .= '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'" class="logo logo--image"><img src="'.$logo_src.'"></a>';
		}
		// if there is not a custom site logo
		else {
			$return['logo'] .= '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'"><div class="logo logo--text">'.get_bloginfo('name').'</div></a>';
		}

		$return['address'] = ( !empty($tS['address']) ? '<a href="#" title="">'.get_the_address($tS['address']).'</a>' : '' ); // acf.ext

	// 



	
	

	/**
	 * 	nav 1 & 2
	 */

		$return['footer_nav'] = '';
		// 
		if (has_nav_menu('footer_1')) {
				$return['footer_nav'] .= '<section class="footer-navmenu"><p>'.get_nav_menu_name('footer_1').'</p>';	
				$args = array(
						'theme_location' => 'footer_1'
						,'walker' => new Tabula_Rasa_Nav_Menu
						,'echo' => false
						,'container' => 'nav'
						,'container_class' => 'navlinks'
						,'link_before' => '<span>'
						,'link_after' => '</span>'
				);
				$return['footer_nav'] .= wp_nav_menu($args);
				$return['footer_nav'] .= '</section>';
		}
		
		if (has_nav_menu('footer_2')) {
				$return['footer_nav'] .= '<section class="footer-navmenu"><p>'.get_nav_menu_name('footer_2').'</p>';
				$args = array(
						'theme_location' => 'footer_2'
						,'walker' => new Tabula_Rasa_Nav_Menu
						,'echo' => false
						,'container' => 'nav'
						,'container_class' => 'navlinks'
						,'link_before' => '<span>'
						,'link_after' => '</span>'
				);
				$return['footer_nav'] .= wp_nav_menu($args);
				$return['footer_nav'] .= '</section>';
		}


	// /end 


	/**
	 * 	address / link to map etc
	 */

	/**
	 * 	contact / social
	 */


	/**
	 * 	build final return
	 */

		$return[0] .= sprintf(
			$guides[0]
			,'<section class="footer-address">'.$return['logo'].'</section>'
			,'<section class="footer-address">'.$return['address'].'</section>'
			,$return['footer_nav']
		);
	// 

		
	/**
	 * 	site logo
	 */
	
		echo $return[0];
	// 

	/**
	 * 	continue with wp_footer
	 */

		wp_footer();
	// 

	/**
	 * 
	 */
	// 
?>
</body>
</html>