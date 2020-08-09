<?php
/**
 * 
 */

	$return = '';
	$guides = [
		''
	];


	$dropdowns = isset($mC['dropdowns']) ? $mC['dropdowns'] : '';


	
	if( !empty($dropdowns) ){


		// open section
		echo '
			<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'">
			<div class="container '.$mC['width'].'">
			<div class="dropdowns">
		';

		foreach( $dropdowns as $ddRow ){
			// 
			echo '<div class="dropdown js__dropdown"><a class="js__dropdown-title dropdown-title" href="javascript:void(0);" title="Expand '.$ddRow['title'].'">'.$ddRow['title'].'</a>';

			foreach( $ddRow['content_columns'] as $i => $column ){
				echo '<div>';
				foreach( $column as $i => $columnRows ){			
					foreach( $columnRows as $i => $columnRow ){
						$mC = $columnRow;
						include( get_template_directory().'/modules/module-'.$mC['acf_fc_layout'].'/module-'.$mC['acf_fc_layout'].'.php');
					}
				}
				echo '</div>';
			}


			echo '</div>';
			// 
		}



		// close section
		echo '</div></div></section>';


	}

// 
?>