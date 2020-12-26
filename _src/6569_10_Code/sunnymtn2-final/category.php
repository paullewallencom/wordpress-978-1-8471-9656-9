<?php get_header() ?>

<div id="copy">
	<?php if (have_posts()) : ?>

		<h2>Products &raquo; <?php single_cat_title(); ?></h2>

		<?php while (have_posts()) : the_post(); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php endwhile; ?>

	<?php endif; ?>
</div>
		
<?php get_footer() ?>
