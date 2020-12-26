<?php get_header() ?>

<div id="copy" class="narrow">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="single-date"><?php the_time('F j, Y') ?></div>
			<?php the_content(); ?>
		<?php endwhile; ?>

	<?php endif; ?>
</div>

<?php get_sidebar() ?>
		
<?php get_footer() ?>
