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
			<h2>Subscribe</h2>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>">All Posts (RSS)</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
				<li><a href="<?php echo get_option('home'); ?>/category/podcast/feed">The Podcast</a></li>
				<li><a href="itpc://packt:8888/category/podcast/feed">iTunes Podcast feed</a></li>
			</ul>
		</li>

		<li>
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</li>
		
		<li class="ethicurian">
			<h2>Ethicurean News</h2>
			<?php RSSImport(4, "http://feeds.feedburner.com/ethicurean", false, false); ?>
		</li>
	<?php endif; ?>
	</ul>
</div><!-- /sidebar -->