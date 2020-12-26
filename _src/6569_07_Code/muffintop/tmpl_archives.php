<?php
/*
Template Name: Blog Archives
*/
?>
<?php get_header(); ?>

<div id="copy">

	<h3>Categories</h3>
	<ul>
		<?php wp_list_categories('title_li='); ?>
	</ul>
	
	<h3>Archives</h3>
	<ul>
		<?php wp_get_archives(); ?>
	</ul>
	
	<h3>Tags</h3>
	<?php wp_tag_cloud(''); ?>

</div><!-- /copy -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>