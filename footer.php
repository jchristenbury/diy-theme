<?php /*
	The template for displaying the footer
	
	@package WordPress
	@subpackage DIY Theme

*/ ?>

			<div class="box footer">
				
				<?php if (is_active_sidebar('footer')) : 
					dynamic_sidebar('footer'); 
				else : ?>
				
					<?php if (has_nav_menu('footer')) :
						wp_nav_menu(array(
							'theme_location' => 'footer', 
							'container' => false
						));
					endif; ?>
				
					<p>
						<?php _e('&copy;', 'diy'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> 
					</p>
				
				<?php endif; ?>
				
			</div>
			
			<?php wp_footer(); ?>

		</div>
	</body>
</html>