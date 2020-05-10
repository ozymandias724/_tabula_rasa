<?php 
/**
 * 
 */



  $return = '';
  $guides = [
    '<a class="button" href="%2$s" title="%3$s">%1$s</a>'
  ];


	$return .= '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'"><div class="container '.$mC['buttons_module']['width'].' flexgrid cols-'.count($mC['buttons_module']['buttons']).'"><ul>';
	
	foreach( $mC['buttons_module']['buttons'] as $button ){

		$return .= '<li>';

		$return .= sprintf(
      $guides[0]
      ,$button['text']
      ,$button['link']['url']
      ,$button['link']['title']
		);
		
		$return .= '</li>';
	}
	

	$return .= '</ul></div></section>';

  
  echo $return;

 ?>