<?php get_header() ?>

<div id="copy" class="narrow">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php 
				if ($season = get_post_meta($post->ID, 'season', true) ) {
					echo "<b>Growing Season:</b> ".$season;
				} 
			?>
		<?php endwhile; ?>

	<?php endif; ?>
</div>

<div id="sidebar">
	<h3>All Our Products</h3>
	
	<ul>
		<?php
		global $post;
		$myposts = get_posts('numberposts=-1&orderby=title&order=ASC&category=3');
		foreach($myposts as $post) :
		?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endforeach; ?>
	</ul>
	
</div>
		
<?php get_footer() ?>
