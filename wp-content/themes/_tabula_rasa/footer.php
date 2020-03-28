<?php
/**
 * 
 */

	$return = '';
	$guides = [
		'
			<footer class="footer">
				%1$s
			</footer>
		'
	];

	$return .= sprintf(
		$guides[0]
		,'<h2>FOOTER</h2>'
	);

	
	echo $return;




	wp_footer();
?>
</body>
</html>