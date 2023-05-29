<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

// if (!is_active_sidebar('sidebar-1')) {
// 	return;
// }
?>


// Blog 4 points
// Create a page called News to display the Blog posts (create at least 3 posts).

// On the News page show the excerpts of the posts instead of the full content and display the sidebar before the footer instead of next to the content.

// Setup Animate on Scroll so each blog post animates into the viewport when scrolling. Include the Animate on Scroll CSS and JS files in your theme instead of using the CDN links. Only enqueue the files for the Post Type of post.


<aside id="secondary" class="widget-area">

	<?php

	if (is_page()) {
		dynamic_sidebar('sidebar-1');
	}

	?>

</aside><!-- #secondary -->