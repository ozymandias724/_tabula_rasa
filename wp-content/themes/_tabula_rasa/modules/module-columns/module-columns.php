<?php
/**
 * 
 */

	$return = '';
	$guides = [
		''
	];


	$columns = $mC['columns'];

	// open section
	echo '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'"><div class="container '.$mC['width'].' flexgrid cols-'.count($columns).'"><ul>';

	
	foreach( $columns as $i => $column ){
		echo '<li>';
		foreach( $column as $i => $columnRows ){			
			foreach( $columnRows as $i => $columnRow ){
				$mC = $columnRow;
				include( get_template_directory().'/modules/module-'.$mC['acf_fc_layout'].'/module-'.$mC['acf_fc_layout'].'.php');
			}
		}
		echo '</li>';
	}
	

	// close section
	echo '</ul></div></section>';

	
// 
?>