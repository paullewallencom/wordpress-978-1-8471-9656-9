<?
/*
Plugin Name: Capture Searched Words
Plugin URI: http://springthistle.com/wordpress/plugin_searchedwords
Description: Captures all words searched on and displays a count for each.
Author: <a href="http://hasin.phpxperts.com">Hasin Hayder</a>, <a href="http://springthistle.com">April Hodge Silver</a>
Version: 1.1
Author URI: 
*/

function searchedwords_init($content) {
	if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
		global $wpdb;
		$result = mysql_list_tables(DB_NAME);
		$current_tables = array();
		while ($row = mysql_fetch_row($result)) {
			$current_tables[] = $row[0];
		}
		if (!in_array("wp_searchedwords", $current_tables)) {
			$result = mysql_query(
			"CREATE TABLE `wp_searchedwords` (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				word VARCHAR(255)
			)");
		}
	}
	if (!empty($_GET['s'])) {
		$current_searched_words = explode(" ",urldecode($_GET['s']));
		foreach ($current_searched_words as $word) {
			mysql_query("insert into wp_searchedwords values(null,'{$word}')");
		}
	}
}

function modify_menu_for_searchedwords() {
	if (function_exists('add_submenu_page')) {
		add_management_page(
			"Searched Words", 
			"Searched Words", 
			1, 
			__FILE__, 
			'searchedwords_page'
		);
	}
}

function searchedwords_page() {
	$result = mysql_query('SELECT COUNT(word) AS occurance, word FROM wp_searchedwords GROUP BY word ORDER BY occurance DESC');
	echo '<style>.searchwords { padding: 0px; border: 3px solid #ddd} .searchwords td { border-top: 2px solid #e0e0e0; padding: 3px; margin: 0;  }  .searchwords th { background-color: #e0e0e0; padding: 5px 3px 1px 3px; margin: 0; }</style>';
	echo '<div class="wrap"><h2>Searched Words</h2>';
	echo '<table class="searchwords">';
	if (mysql_num_rows($result)>0) {
		echo '<tr><th>Search words</th><th># searches</th></tr>';
		while ($row = mysql_fetch_row($result)) {
			echo "<tr><td>{$row[1]}</b></td><td>{$row[0]}</td></tr>";
		}
	} else {
		echo '<tr><td colspan="2"><h3>No searches have been preformed yet</h3></td></tr>';
	}
	echo '</table></div>';
}


add_filter('init', 'searchedwords_init');
add_action("admin_menu","modify_menu_for_searchedwords");

?>