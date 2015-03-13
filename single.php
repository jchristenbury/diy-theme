<?php /*
	The template for displaying all single posts
	
	@package WordPress
	@subpackage DIY Theme

*/ ?>
<?php get_header(); ?>

<div class="box content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p><?php _e('Posted by', 'diy'); ?> <?php the_author_posts_link(); ?> <?php _e('&bull;', 'diy'); ?> <?php the_category(', '); ?> <?php _e('&bull;', 'diy'); ?> <?php the_time('F jS, Y'); ?></p>
		
		<?php if (!post_password_required() && !is_attachment() && has_post_thumbnail()) the_post_thumbnail(); ?>
		
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
		<ul>
			<?php the_tags('<li><span>'. __('Tags:', 'diy') .'</span> ', ', ', '</li>'); ?>	
			<li><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
			<?php edit_post_link(__('Edit this post &raquo;', 'diy'), '<li>', '</li>'); ?>
		</ul>
	</div>
	
	<?php endwhile; ?>
	
	<div class="nav nav-post nav-single">
		<?php previous_post_link('<div class="prev">'. __('Previous entry:', 'diy') .' %link</div>', '%title'); ?>
		<?php next_post_link('<div class="next">'. __('Next entry: ', 'diy') .' %link</div>', '%title'); ?>
	</div>
	
	<?php comments_template(); ?>
	
	<?php else : ?>
	<?php get_template_part('inc/not-found'); ?>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>