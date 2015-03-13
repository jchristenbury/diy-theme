<?php /*
	The template for displaying the main sidebar
	
	@package WordPress
	@subpackage DIY Theme

*/ ?>
<div class="sidebar">

	<?php if (is_active_sidebar('sidebar')) : 
		dynamic_sidebar('sidebar'); 
		else : ?>

		<div class="widget nav-sidebar">
			<h2><?php _e('Search', 'diy'); ?></h2>
			<?php get_search_form(); ?>
		</div>

		<div class="widget nav-sidebar">
			<h2><?php _e('Categories', 'diy'); ?></h2>
			<ul><?php wp_list_categories('show_count=1&title_li='); ?></ul>
		</div>
		
		<div class="widget nav-sidebar">
			<h2><?php _e('Pages', 'diy'); ?></h2>
			<ul><?php wp_list_pages(array('title_li' => '')); ?></ul>
		</div>
		
		<?php if (has_nav_menu('sidebar')) : ?>
		<div class="widget nav-sidebar">
			<h2>Sidebar Menu</h2>
			<?php wp_nav_menu(array(
				'theme_location' => 'sidebar', 
				'container' => false
			)); ?>
		</div>
		<?php endif; ?>
		
	<?php endif; ?>

</div>