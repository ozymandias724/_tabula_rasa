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
		,'%1$s'
  ];


	
	$mediaContent = '';

	if( isset($mC['media_type']) && $mC['media_type'] == 'image' ){
		$mediaContent .= '<div>';
		$mediaContent .= wp_get_attachment_image( $mC['image']['ID'], 'full' );
		if( !empty($mC['image_options']['show_caption']) && !empty($mC['image']['caption']) ){
			$mediaContent .= '<p class="wp-caption align-'.$mC['image_options']['align_caption'].'">'.$mC['image']['caption'].'</p>';
		}
		$mediaContent .= '</div>';
	}

	
	
	$return .= sprintf(
		$guides[0]
		,$mC['width']
		,$mediaContent
	);


	echo $return;

	
?>