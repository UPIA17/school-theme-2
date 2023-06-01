<?php

/**
 * The template for displaying Schedule PAGE
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;




		// course schedule
		if (have_rows('course_schedule')) :
			echo '<p>Weekly Course Schedule</p>';

			echo '<table>';

			echo '<thead>';

			echo '<tr> <th>Date</th> <th>Course</th> <th>Instructor</th> </tr>';

			echo '</thead>';

			echo '<tbody>';

			while (have_rows('course_schedule')) : the_row();
				echo '<tr> <td>' . date('F j, Y', strtotime(get_sub_field('date'))) . '</td> <td>' . get_sub_field('course') . '</td> <td>' . get_sub_field('instructor') . '</td> </tr>';
			endwhile;

			echo '</tbody>';
			echo '</table>';
		endif;

	endwhile; // End of the loop.
	?>





</main><!-- #main -->

<?php
get_sidebar();
get_footer();
