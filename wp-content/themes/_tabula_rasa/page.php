<?php


	$fields = get_fields( get_the_ID() );

	get_header();
	
 ?>
	
	<main>
		<?php
			
			if( !empty($fields['modular_content']) ){
				
				echo '<div class="sections">';
				
				foreach($fields['modular_content'] as $i => $mC) {

					include( get_template_directory().'/modules/module-'.$mC['acf_fc_layout'].'/module-'.$mC['acf_fc_layout'].'.php');

				}

				echo '</div>';

			}
		?>
	</main>

	
<?php

	get_footer();
	
 ?>