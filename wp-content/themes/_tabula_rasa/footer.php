<?php
/**
 * 		Page Footer
 * 
 */

	$return = '';

	$guides = [
		'
			<footer class="footer">
				<div class="container wide">
					<section>
						%1$s
						%2$s
					</section>
					<section>
						%3$s
					</section>
					<section>
						%4$s
						%5$s
					</section>
				</div>
			</footer>
		'
	];

	$tS = !empty(get_field('theme_settings', 'options')) ? get_field('theme_settings', 'options') : '';


	$return .= sprintf(
		$guides[0]
		,'<div>'.tr__getLogo().'</div>'
		,'<div>'.get_the_address( $tS['map'] ).'</div>'
		,'<div>'.get_iconlinks($tS['social_media_icon_links']).'</div>'
		,has_nav_menu('footer_1') ? '<div><p>'.get_nav_menu_name('footer_1').'</p>'.tr__getMenu(false, 'footer_1').'</div>' : ''
		,has_nav_menu('footer_2') ? '<div><p>'.get_nav_menu_name('footer_2').'</p>'.tr__getMenu(false, 'footer_2').'</div>' : ''
	);
	
		
		
	echo $return;

	wp_footer();
?>
</body>
</html>