<?php
/**
 * 			Hero Module
 */

	$guides = [''];
	$return = [''];

	if ($mC['type'] == 'color__gradient') {

		if( count($mC['color__gradient']) === 1 ) {
			$return['color__gradient-color'] = ' background: '.$mC['color__gradient'][0]['color'].';';
		}

		else if( !empty($mC['color__gradient']) ) {
			$guides['color__gradient-color'] = ', %1$s';
	
			$return['color__gradient-color'] = 'background-image: linear-gradient(to right';
			foreach( $mC['color__gradient'] as $i => $colorSelection ){
				$return['color__gradient-color'] .= sprintf(
					$guides['color__gradient-color']
					,$colorSelection['color']
				);
			}
			$return['color__gradient-color'] .= ');';
		}
		
		$guides['color__gradient'] .= '<section class="hero pagehero" style="%1$s"><div class="container%2$s%5$s">%3$s%4$s</div></section>';
		
		$return[0] .= sprintf(
			$guides['color__gradient']
			,$return['color__gradient-color']
			,' '.$mC['width']
			,!empty($mC['title']) ? '<h1>'.$mC['title'].'</h1>' : ''
			,!empty($mC['subtitle']) ? '<p>'.$mC['subtitle'].'</p>' : ''
			,!empty($mC['text_color']) ? ' light' : ' dark' 
		);

	}

	if( $mC['type'] == 'image' ){

		$guides['image'] = '<section class="hero pagehero %1$s" style="%2$s"><div class="container%3$s%6$s">%4$s%5$s</div></section>';

		$return['image'] = '';
		
		$return[0] .= sprintf(
			$guides['image']
			,$mC['type']
			,'background-image: url('.$mC['image']['url'].');'
			,' '.$mC['width']
			,!empty($mC['title']) ? '<h1>'.$mC['title'].'</h1>' : ''
			,!empty($mC['subtitle']) ? '<p>'.$mC['subtitle'].'</p>' : ''
			,!empty($mC['text_color']) ? ' light' : ' dark' 
		);
	}


	if( $mC['type'] == 'slider' && !empty($mC['gallery']) ){

		$guides['slider'] = '<section class="hero pagehero %1$s">%6$s<div class="container%2$s%5$s">%3$s%4$s</div></section>';
		$return['slider'] = '<div class="pagehero-slider">';
		$return['slider-slide'] = '';
		$guide['slider-slide'] = '<div class="pagehero-slider-slide" style="background-image: url(%1$s)"></div>';

		foreach( $mC['gallery'] as $slide ){

			$return['slider'] .= sprintf(
				$guide['slider-slide']
				,$slide['url']
			);

		}
		$return['slider'] .= '</div>';


		$return[0] .= sprintf(
			$guides['slider']
			,$mC['type']
			,' '.$mC['width']
			,!empty($mC['title']) ? '<h1>'.$mC['title'].'</h1>' : ''
			,!empty($mC['subtitle']) ? '<p>'.$mC['subtitle'].'</p>' : ''
			,!empty($mC['text_color']) ? ' light' : ' dark' 
			,$return['slider']
		);
	}
			




	if( $mC['type'] == 'video' && !empty($mC['video']) ){


		$guides['video'] = '<section class="hero pagehero %1$s">%6$s<div class="container%2$s%5$s">%3$s%4$s</div></section>';
		$return['video-video'] = '<video autoplay muted loop id="pagehero-video"><source src="'.$mC['video'].'" type="video/mp4"></video>';

		
		$return[0] .= sprintf(
			$guides['video']
			,$mC['type']
			,' '.$mC['width']
			,!empty($mC['title']) ? '<h1>'.$mC['title'].'</h1>' : ''
			,!empty($mC['subtitle']) ? '<p>'.$mC['subtitle'].'</p>' : ''
			,!empty($mC['text_color']) ? ' light' : ' dark'
			,$return['video-video']
		);

	}
	
	echo $return[0];

?>