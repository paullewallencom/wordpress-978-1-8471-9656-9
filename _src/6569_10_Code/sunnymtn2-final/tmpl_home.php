<?php
/*
Template Name: Home Page
*/
?>

<?php get_header() ?>

<div id="home-left">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<h2>Welcome!</h2>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

<!-- Via WP Posts in category Homeboxes -->
	<?php
	global $post;
	$myposts = get_posts('include=55,59');
	foreach($myposts as $post) :
			setup_postdata($post);
			global $more;
			$more = 0;
	?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	<?php endforeach; ?>

<!-- Via Text Snippets -->
<!--
	<?php // this will not work if you don't have the plugin installed, so it's commented out ?>
	<?php // get_textsnippet(1);?>
	<?php // get_textsnippet(2);?>
-->

</div>

<div id="home-right">
	<h2>Latest News</h2>

	<?php
	global $post;
	$myposts = get_posts('numberposts=6&category=1');
	foreach($myposts as $post) :
			setup_postdata($post);
			global $more;
			$more = 0;
	?>
		<h3><?php the_time('M j') ?> - <?php the_title(); ?></h3>
		<?php the_content('More &raquo;'); ?>
	<?php endforeach; ?>
	
	<p><a href="/category/news/">More news ...</a></p>
</div>
		
<?php get_footer() ?>
