<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="robots" content="index, follow"></meta>
	<meta name="distribution" content="global"></meta>
	<meta name="description" content="lorem ipsum"></meta>
	<meta name="keywords" content="april hodge silver, design, wordpress"></meta>
	<style type="text/css">@import url("<?php bloginfo('stylesheet_url'); ?>");</style>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body>

<a name="top"></a>

<div id="container">

	<div id="header">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div id="description"><?php bloginfo('description'); ?></div>
		
		<div id="farm-photo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/farm-photo.jpg" alt="farm-photo" width="800" height="191"/></div>

		<div id="mainnav">
			<ul>
				<?php wp_list_pages('title_li=' ); ?>
			</ul>
		</div><!-- /mainnav -->
	</div><!-- /header -->

	<div id="content">