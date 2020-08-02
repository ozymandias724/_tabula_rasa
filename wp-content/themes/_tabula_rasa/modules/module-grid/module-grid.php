<?php
/**
 * 
 */

	$return = '';
	$guides = [
		'
			%5$s
				<h5>%1$s</h5>
				<img src="%2$s" srcset="%3$s" />
				<div>%4$s</div>
			%6$s
		'
	];
	
	$return .= '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'"><div class="container '.$mC['width'].' flexgrid cols-'.$mC['col_count'].'"><ul>';
	
	foreach( $mC['grid_items'] as $item ){

		$return .= '<li>';

		$return .= sprintf(
			$guides[0]
			,!empty($item['title']) ? $item['title'] : ''
			,!empty($item['image']['url']) ? $item['image']['url'] : ''
			,!empty($item['image']) ? wp_get_attachment_image_srcset( $item['image']->ID ) : ''
			,!empty($item['copy']) ? $item['copy'] : ''
			,!empty($item['link']['url']) ? '<a href="'.$item['link']['url'].'">' : ''
			,!empty($item['link']['url']) ? '</a>' : ''
		);
		
		$return .= '</li>';
	}
	

	$return .= '</ul></div></section>';

	
	echo $return;
// 
?>