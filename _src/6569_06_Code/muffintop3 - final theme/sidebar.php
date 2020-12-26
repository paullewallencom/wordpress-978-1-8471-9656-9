<div id="sidebar">
	<ul>
<?php if ( !function_exists('dynamic_sidebar')
	    || !dynamic_sidebar() ): ?>

		<li>
			<h2 class="first">Categories</h2>
			<ul>
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</li>
	
		<li>
			<h2>Archives</h2>
			<ul>
				<?php wp_get_archives(); ?>
			</ul>
		</li>
	
		<li>
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</li>
	<?php endif; ?>
	</ul>
</div><!-- /sidebar -->