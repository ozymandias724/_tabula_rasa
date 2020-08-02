<?php 
/**
 * 
 */

	$return = '';
	$guides = ['<div>%1$s</div>'];

	$return .= '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'"><div class="container '.$mC['width'].'">';
	
  $return .= sprintf(
    $guides[0]
    ,do_shortcode('[wpforms id="'.$mC['form']->ID.'" title="false" description="false"]')
  );
  
  echo $return;

 ?>