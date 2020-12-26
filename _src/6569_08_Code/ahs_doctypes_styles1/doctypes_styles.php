<?php
/*
Plugin Name: Add Document Type Styles
Plugin URI: http://springthistle.com/wordpress/plugin_doctypes
Description: Detects URLs in your post and page content and applies style to those that link to documents so as to identify the document type (supports: pdf, doc, mp3 and zip).
Version: 1.0
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

// this function implements the regular expression
function ahs_doctypes_regex($text) {
	$text = ereg_replace('href=([\'|"][[:alnum:]|[:punct:]]*)\.(pdf|doc|mp3|zip)([\'|"])','href=\\1.\\2\\3 class="link \\2"',$text);
	return $text;
}

// this functions prints a link to the stylesheet
function ahs_doctypes_styles() {
	echo "<style>\n.link {	background-repeat: no-repeat; padding: 2px 0 2px 20px; }";
	echo ".pdf { background-image: url('".WP_PLUGIN_URL."/ahs_doctypes_styles/icon-pdf.gif'); }";
	echo ".doc { background-image: url('".WP_PLUGIN_URL."/ahs_doctypes_styles/icon-doc.gif'); }";
	echo ".mp3 { background-image: url('".WP_PLUGIN_URL."/ahs_doctypes_styles/icon-mp3.gif'); }";
	echo ".zip { background-image: url('".WP_PLUGIN_URL."/ahs_doctypes_styles/icon-zip.gif'); }";
	echo "</style>";
}

add_filter('the_content', 'ahs_doctypes_regex');
add_action('wp_head', 'ahs_doctypes_styles');
?>
