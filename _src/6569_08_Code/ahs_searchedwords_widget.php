<?
/*
Plugin Name: Top Searched Words Widget
Plugin URI: http://springthistle.com/wordpress/plugin_searchedwords
Description: Displays the top searched words in a widget in the sidebar.
Author: April Hodge Silver
Version: 1.0
Author URI: http://springthistle.com/
*/

function widget_searchedwords_init() {
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
	return;
	register_sidebar_widget('Searched Words', 'widget_searchedwords_render');
	register_widget_control('Searched Words', 'widget_searchedwords_admin');
}

function widget_searchedwords_admin() {
	// first check to see if the options have been changed by the user. if so, save them.
	if ($_POST['searchedwords_submit']=='1'){
		$options['searchedwords_title'] = $_POST['searchedwords_title'];
		$options['searchedwords_number'] = $_POST['searchedwords_number'];
		if ($_POST['searchedwords_showcount'] == 1) $options['searchedwords_showcount'] = 1; 
		else $options['searchedwords_showcount'] = 0; 
		update_option("widget_searchedwords",$options);
	}
	// retrieve the existing options. if they exist, display them in the widget control box.
	$options = get_option("widget_searchedwords");
	if (empty($options)) {
		$title = "Top Searched Words";
		$number = 5;
		$showcount = 0;
	} else {
		$title = $options['searchedwords_title'];
		$number = $options['searchedwords_number'];
		$showcount = $options['searchedwords_showcount'];
	}
	// print the items that belong in the widget control box
	echo '<p><label for="searchedwords_title">Title: <input class="widefat" id="searchedwords_title" name="searchedwords_title" value="'.$title.'" type="text"></label></p>';
	echo '<p><label for="searchedwords_number">Number of words to show: <select id="searchedwords_number" name="searchedwords_number">';
	for ($i=1;$i<=20;$i++) {
		echo '<option value="'.$i.'"';
		if ($i==$number) echo ' selected="selected"';
		echo '>'.$i.'</option>';
	}
	echo '</label></p>';
	echo '<p><label for="searchedwords_showcount"><input type="checkbox" id="searchedwords_showcount" name="searchedwords_showcount" value="1"';
	if ($showcount == 1) echo 'checked="checked"';
	echo '> Show counts</label></p>';
	echo "<input type='hidden' name='searchedwords_submit' value='1'>";
}

function widget_searchedwords_render($args) {
	extract($args);
	// retrieve saved options and set defaults if empty
	$options = get_option("widget_searchedwords");
	if (empty($options)) {
		$title = "Top Searched Words";
		$number = 5;
		$showcount = 0;
	} else {
		if (!empty($options['searchedwords_title'])) $title = $options['searchedwords_title'];
		else $title = "Top Searched Words";
		$number = $options['searchedwords_number'];
		$showcount = $options['searchedwords_showcount'];
	}

	// retrieve word search information from database
	global $wpdb;
	$result = mysql_query('SELECT COUNT(word) AS occurance, word FROM wp_searchedwords GROUP BY word ORDER BY occurance DESC LIMIT '.$number);
	$words = array();
	if (mysql_num_rows($result)>0) {
		while ($row = mysql_fetch_row($result)) {
			$words[] = array('word'=>$row[1],'count'=>$row[0]);
		}
	} else {
		$words[] = "No searches yet.";
	}
	
	//print the widget for the sidebar
	echo $before_widget;
	echo $before_title.$title.$after_title;
	echo '<ul>';
	foreach ($words as $info) {
		echo '<li><a href="/?s='.$info['word'].'">'.$info['word'].'</a>';
		if ($showcount==1) echo ' <span class="searchedwords_count">'.$info['count'].'</span>';
		echo '</li>';
	}
	echo '</ul>';
	echo $after_widget;
}
add_action('plugins_loaded', 'widget_searchedwords_init');


?>