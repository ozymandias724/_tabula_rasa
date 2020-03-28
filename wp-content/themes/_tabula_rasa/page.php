<?php
/**
 * Template: Page
 * 
*/

	// 
	$fields = get_fields( get_the_ID() );

	get_header();

?>
<main>
	<?php
		include_once('includes/pagehero.php');
		/**
		 *  Loop thru the 'content blocks' flexible content field
		 *  include template parts by name if they are available
		 */
		if (!empty($fields['modular_content'])) {
			
			foreach ($fields['modular_content'] as $cB) {
				include_once('modules/'.$cB['acf_fc_layout'].'/module.'.$cB['acf_fc_layout'].'.php');
			}
			
		}
	?>
</main>
<?php
get_footer();
?>