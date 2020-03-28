<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="<?php bloginfo('description');?>">
	<meta name="copyright" content="<?=date('Y');?>">
	<title><?php bloginfo('name').' | '.bloginfo('description'); ?></title>
	<?php wp_head(); ?>		
</head>
<body <?php body_class(); ?>>
<?php
	// call in wp nav
	include('includes/nav.header.php');
 ?>