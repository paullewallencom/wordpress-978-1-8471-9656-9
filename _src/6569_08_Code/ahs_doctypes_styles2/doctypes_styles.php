<?php
/*
Plugin Name: Add Document Type Styles
Plugin URI: http://springthistle.com/wordpress/plugin_doctypes
Description: Detects URLs in your post and page content and applies style to those that link to documents so as to identify the document type. Includes support for: pdf, doc, mp3 and zip; you can add more!
Version: 1.2
Author: April Hodge Silver
Author URI: http://springthistle.com

** Copyright 2008  April Hodge Silver **

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/* Future versions to:
   - generate stylesheet on the fly, based on supported types
   - allow user to upload new icons on the admin page
   - display supported icons on the admin page
   - on admin page form submit, check to see that icons for each type exists. if not, don't support it
*/


// this function does the magic
function ahs_doctypes_regex($text) {
	$types = get_option('ahs_supportedtypes');
	$types = ereg_replace(',[:space:]*','|',$types);
	$text = ereg_replace('href=([\'|"][[:alnum:]|[:punct:]]*)\.('.$types.')([\'|"])','href=\\1.\\2\\3 class="link \\2"',$text);
	return $text;
}

// this functions adds the stylesheet to the head
function ahs_doctypes_styles() {
	$types = split(",",get_option('ahs_supportedtypes'));
	echo "<style>\n.link {	background-repeat: no-repeat; padding: 2px 0 2px 20px; }";
	foreach ($types as $type) {
		echo ".".$type." { background-image: url('".WP_PLUGIN_URL."/ahs_doctypes_styles/icon-".$type.".gif'); }";
	}
	echo "</style>";
}

// used when the plugin is activated
function set_supportedtypes_options() {
	add_option("ahs_supportedtypes","pdf,doc,mp3,zip");
}

// used when the plugin is deactivated
function unset_supportedtypes_options () {
	delete_option("ahs_supportedtypes");
}

// adds our new option page to the admin menu
function modify_menu_for_supportedtypes() {
	add_management_page(
		'Document Types',	// Page <title>
		'Document Types', // Menu title
		7,				// What level of user
		__FILE__,            //File to open
		'supportedtypes_options'  //Function to call
		);  
}

// shows the option page
function supportedtypes_options () {
  echo '<div class="wrap"><h2>Supported Document Types</h2>';
  if ($_REQUEST['submit']) {
	   update_supportedtypes_options();
  }
  print_supportedtypes_form();
  echo '</div>';
}

function update_supportedtypes_options() {
  $updated = false;
  if ($_REQUEST['ahs_supportedtypes']) {  update_option('ahs_supportedtypes', $_REQUEST['ahs_supportedtypes']); $updated = true; }

  if ($updated) {
		echo '<div id="message" class="updated fade">';
		echo '<p>Supported Types successfully updated!</p>';
		echo '</div>';
   } else {
		echo '<div id="message" class="error fade">';
		echo '<p>Unable to update Supported Types!</p>';
		echo '</div>';
   }
}

function print_supportedtypes_form () {
   $val_ahs_supportedtypes = stripslashes(get_option('ahs_supportedtypes'));
   echo <<<EOF
<p>Document types supported by the Add Document Types plug-in are listed below.<br />To add a new type to be linked, take the following steps, in this order:
<ol>
	<li>1. Upload the icon file for the new doctype to the plug-in folder <i>wp-content/plugins/ahs_doctypes_styles/</i></li>
	<li>2. Add the extention of the new doctype to the list below, keeping with the comma-separated no-spaces format.</li>
</ol>
</p>
   
<form method="post">
	<input type="text" name="ahs_supportedtypes" size="50" value="$val_ahs_supportedtypes" />
	<input type="submit" name="submit" value="Save Changes" />
</form>
EOF;
}

add_action('admin_menu','modify_menu_for_supportedtypes');
register_activation_hook(__FILE__,"set_supportedtypes_options");
register_deactivation_hook(__FILE__,"unset_supportedtypes_options");

add_filter('the_content', 'ahs_doctypes_regex', 9);
add_action('wp_head', 'ahs_doctypes_styles');
?>
