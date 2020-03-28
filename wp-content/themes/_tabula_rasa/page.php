<?php
/**
 * Template: Page
 * 
 */

get_header();
?>
<main>
	<?php
		$fields = get_fields( get_the_ID() );
		include_once('includes/pagehero.php');
		/**
		 *  Loop thru the 'content blocks' flexible content field
		 *  include template parts by name if they are available
		 */
		if (!empty($fields['modular_content'])) {
			
			foreach ($fields['modular_content'] as $cB) {
				include_once(locate_template( 'modules/'.$cB['acf_fc_layout'].'/module.'.$cB['acf_fc_layout'].'.php'));
			}
			
		}
	?>
</main>
<?php
get_footer();
?>