<?php
/**
 * 
 */

	get_header();

	echo '<main>';

	$return = '';
	$guides = [
		'%1$s'
	];

	$return .= sprintf(
		$guides[0]
		,'HELLO WORLD'
	);
		
		

	echo $return;

	echo '</main>';


	get_footer();
// 
?>