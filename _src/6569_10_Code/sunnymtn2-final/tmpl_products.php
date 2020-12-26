<?php
/*
Template Name: Product Main Page
*/
?>

<?php get_header() ?>

<div id="copy">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<h3>Explore our Products</h3>
	<ul>
		<?php wp_list_categories('title_li=&child_of=3'); ?>
	</ul>

</div>
		
<?php get_footer() ?>
