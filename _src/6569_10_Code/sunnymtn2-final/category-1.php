<?php get_header() ?>

<div id="copy" class="narrow">
	<?php if (have_posts()) : ?>
		<h2><?php single_cat_title(); ?> Archive</h2>
		<?php while (have_posts()) : the_post(); ?>
			<h3><?php the_time('F j') ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content('Read the rest...'); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_sidebar() ?>
		
<?php get_footer() ?>
