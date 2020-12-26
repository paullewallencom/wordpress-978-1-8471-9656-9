<?php
if (in_category(1)) {
   include(TEMPLATEPATH . '/single-news.php');
} else {
   include(TEMPLATEPATH . '/single-products.php');
}
?>