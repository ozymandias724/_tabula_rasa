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

	$tS = !empty(get_field('social_settings', 'options')) ? get_field('social_settings', 'options') : '';


	$return .= sprintf(
		$guides[0]
		,'<div>'.tr__getLogo().'</div>'
		,isset($tS['map']) ? '<div>'.get_the_address( $tS['map'] ).'</div>' : ''
		,isset($tS['social_media_icon_links']) ? '<div>'.get_iconlinks($tS['social_media_icon_links']).'</div>' : ''
		,has_nav_menu('footer_1') ? '<div>'.tr__getMenu(false, 'footer_1').'</div>' : ''
		,has_nav_menu('footer_2') ? '<div>'.tr__getMenu(false, 'footer_2').'</div>' : ''
	);
	
		
		
	echo $return;

	wp_footer();
?>
</body>
</html>