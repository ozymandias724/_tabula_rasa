<?php
/**
 * 		Page Footer
 * 
 */


	$sS = !empty(get_field('social_settings', 'options')) ? get_field('social_settings', 'options') : '';
	$fS = !empty(get_field('footer_settings', 'options')) ? get_field('footer_settings', 'options') : '';

	$return = '';
	$guides = [
		'
			<footer class="footer">
				<div class="container wide">
					<section class="footer-siteinfo">
						%1$s
						%6$s
						%2$s
						%3$s
					</section>
					<section class="footer-menus">
						%4$s
						%5$s
					</section>
				</div>
			</footer>
		'
	];

	$gMap = '';
	if( !empty($fS['show_map']) && !empty($sS['map']) ){
		wp_enqueue_script( 'tr__googlemaps-api', 'https://maps.googleapis.com/maps/api/js?key='.get_option( 'google_api_key' ) );
		$guides['gmap'] = '<div data-lat="%1$s" data-lng="%2$s" class="tr__googlemap"></div>';
		$gMap .= sprintf(
			$guides['gmap']
			,$sS['map']['lat']
			,$sS['map']['lng']
		);
		
	}


	$return .= sprintf(
		$guides[0]
		,'<div>'.tr__getLogo().'</div>'
		,isset($sS['map']) ? '<div>'.$sS['map']['address'].'</div>' : ''
		,!empty($fS['show_social_media']) && isset($sS['social_media_icon_links']) ? '<div>'.get_iconlinks($sS['social_media_icon_links']).'</div>' : ''
		,has_nav_menu('footer_1') ? '<div>'.tr__getMenu(false, 'footer_1').'</div>' : ''
		,has_nav_menu('footer_2') ? '<div>'.tr__getMenu(false, 'footer_2').'</div>' : ''
		,$gMap
	);
	
		
		
	echo $return;

	wp_footer();
?>
</body>
</html>