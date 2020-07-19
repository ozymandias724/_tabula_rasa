<?php
/**
 * 
 */

	$return = '';
	$guides = [
		''
	];


	$columns = $mC['collapse_module']['content_columns'];

  $return .= '
    <section class="tr__module tr__module-'.$mC['acf_fc_layout'].'"><div class="container '.$mC['collapse_module']['width'].'">
      <div class="collapsable js__collapsable">
        <p class="js__collapsable-title collapsable-title">'.$mC['collapse_module']['title'].'</p>
        <div>
          <ul>
  ';

  echo $return;

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
  

	

	$return = '</ul></div></div></section>';

	
	echo $return;
// 
?>