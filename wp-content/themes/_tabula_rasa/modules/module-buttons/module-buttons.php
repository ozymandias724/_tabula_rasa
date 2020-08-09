<?php
/**
 * 
 */

	$return = '';

	
  $guides = [
    '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'">
      <div class="container %1$s">
        %2$s
      </div>
		</section>'
	];
	


	$btnReturn = '';
	$btnGuides = [
		'<a href="%1$s" title="%2$s%5$s" class="button %3$s"%4$s><span>%2$s</span></a>'
	];
	
	if( !empty($mC['buttons']) ){
		
		$btnReturn = '<div class="buttons align-'.$mC['options']['alignment'].'">';
		

		// 
		foreach( $mC['buttons'] as $rec ){


			$btnReturn .= sprintf(
				$btnGuides[0]
				,$rec['link']['url']
				,$rec['text']
				,$rec['style']
				,!empty($rec['link']['target']) ? ' target="_blank"' : ''
				,!empty($rec['link']['target']) ? ' [will open in new tab/window]' : ''
			);
			
		}
		$btnReturn .= '</div>';
	}


	
	$return .= sprintf(
		$guides[0]
		,$mC['width']
		,$btnReturn
	);


	echo $return;

	
?>