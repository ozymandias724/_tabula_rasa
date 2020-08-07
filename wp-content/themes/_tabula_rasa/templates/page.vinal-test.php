<?php
/**
 * 		Template Name: VINAL Homepage
 * 		Template Post Type: Page
 */


	$fields = get_fields( get_the_ID() );

	get_header();
	
 ?>
	
	<main>
		<?php
			

			$rec = $fields['vinal_record_hero'];

			$return = '';
			$guides = ['
				<section class="hero pagehero vinalhero" style="background-image:url(%1$s);">
					<h1>%2$s</h1>
					<p>%3$s</p>
					%4$s
				</section>
			'];



			$return .= sprintf(
				$guides[0]
				,$rec['background_image']['url']
				,$rec['primary_text']
				,$rec['secondary_text']
				,wp_get_attachment_image( $rec['album_art']['ID'], 'full' )
			);


			
			
			echo $return;
			
			
			
			
			
		?>
	</main>

	
<?php

	get_footer();
	
 ?>