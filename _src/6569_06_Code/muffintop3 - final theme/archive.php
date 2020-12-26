<?php get_header(); ?>

<div id="copy">

<h2 class="pagetitle">
 	  <?php if (is_category()) { ?>
		Archive for the '<?php single_cat_title(); ?>' Category
 	  <?php } elseif( is_tag() ) { ?>
		Posts Tagged '<?php single_tag_title(); ?>'
 	  <?php } elseif (is_month()) { ?>
		Archive for <?php the_time('F, Y'); ?>
 	  <?php } ?>
</h2>
 	  
 	  <?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<div class="post-date"><?php the_time('F jS, Y') ?></div>
	
				<?php the_excerpt(); ?>
	
				<div class="categories">Posted in: <?php the_category(', ') ?></div>
				<div class="tags">Tags: <?php the_tags(); ?></div>
				<div class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
			</div>
		<?php endwhile; ?>
	
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>

</div><!-- /copy -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>