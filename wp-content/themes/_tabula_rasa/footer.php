<?php
/**
 * 
 */
$return = [''];
$guides = [
	'
		<footer class="footer">
			%1$s
		</footer>
	'
];
$tS = !empty(get_field('theme_settings', 'options')) ? get_field('theme_settings', 'options') : '';
// (template globals above)



	/**
	 * 	
	 */
	// 
	
	/**
	 * 	site logo
	 */

	/**
	 * 	nav 1 & 2
	 */

		$return['footer_nav'] = '';
		// 
		if (has_nav_menu('footer_1')) {
				
				$return['footer_nav'] .= '<div class="anim__fade anim__fade-up"><h3><span>'.get_nav_menu_name('footer_1').'</span></h3>';
				
				$args = array(
						'theme_location' => 'footer_1'
						,'walker' => new Tabula_Rasa_Nav_Menu
						,'echo' => false
						,'container' => 'nav'
						,'container_class' => 'navlinks'
						,'link_before' => '<span>'
						,'link_after' => '</span>'
				);
				// write the nav
				$return['footer_nav'] .= wp_nav_menu($args);
				$return['footer_nav'] .= '</div>';
		}
		
		if (has_nav_menu('footer_2')) {
				$return['footer_nav'] .= '<div class="anim__fade anim__fade-up"><h3><span>'.get_nav_menu_name('footer_2').'</span></h3>';
				$args = array(
						'theme_location' => 'footer_2'
						,'walker' => new Tabula_Rasa_Nav_Menu
						,'echo' => false
						,'container' => 'nav'
						,'container_class' => 'navlinks'
						,'link_before' => '<span>'
						,'link_after' => '</span>'
				);
				// write the nav
				$return['footer_nav'] .= wp_nav_menu($args);
				$return['footer_nav'] .= '</div>';
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