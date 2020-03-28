<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); ?></title>
	<?php wp_head(); ?>		
</head>
<body <?php body_class(); ?>>
<?php
	// call in wp nav
	include('includes/nav.header.php');
 ?>