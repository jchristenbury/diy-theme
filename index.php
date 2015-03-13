<?php /*
	The main template file

	This is the most generic template file in a WordPress theme and one
	of the two required files for a theme (the other being style.css).
	It is used to display a page when nothing more specific matches a query,
	e.g., it puts together the home page when no home.php file exists.
	
	@package WordPress
	@subpackage DIY Theme

*/ ?>
<?php get_header(); ?>

<div class="box content">

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
	<div <?php post_class(); ?>>
		<h1>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
		<?php the_excerpt(); ?>
	</div>
	
	<?php endwhile; ?>
	
	<div class="nav nav-post nav-archive">
		<div class="prev">
			<?php next_posts_link(); ?>
		</div>
		<div class="next">
			<?php previous_posts_link(); ?>
		</div>
	</div>
	
	<?php else : ?>
	<?php get_template_part('inc/not-found'); ?>
	
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>