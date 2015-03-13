<?php /*
	The template for the page header
	
	@package WordPress
	@subpackage DIY Theme

*/ ?><!doctype html>  
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div class="container">
			<div class="box header">
				<h1>
					<a href="<?php echo home_url(); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
				<h2><?php bloginfo('description'); ?></h2>
				
				<?php if (is_active_sidebar('header')) : 
					dynamic_sidebar('header'); 
				else : 
					if (has_nav_menu('header')) :
						wp_nav_menu(array(
						    'theme_location' => 'header', 
						    'container'      => false
						));
					endif;
				endif; ?>
			</div>
