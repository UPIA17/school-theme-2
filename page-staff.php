<?php

/**
 * Template Name: Staff Template
 * Template Post Type: page
 *
 * The template for displaying all staff members.
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
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>

				<?php
				$taxonomy = 'school_theme_staff_term';
				$terms = get_terms(
					array(
						'taxonomy' => $taxonomy,
						'hide_empty' => false,
					)
				);

				if ($terms && !is_wp_error($terms)) {
					foreach ($terms as $term) {

						echo '<h2>' . esc_html($term->name) . '</h2>';

						$args = array(
							'post_type' => 'school_theme_staff',
							'posts_per_page' => -1,
							'order' => 'ASC',
							'orderby' => 'title',
							'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'slug',
									'terms' => $term->slug,
								),
							),
						);
						$query = new WP_Query($args);

						if ($query->have_posts()) {

							while ($query->have_posts()) {
								$query->the_post();
								$staff_name = get_the_title();
								$staff_biography = get_field('staff_biography');
								$staff_course = get_field('staff_course');
								$staff_website = get_field('staff_website');

								echo '<h3>' . esc_html($staff_name) . '</h3>';

								echo '<p>' . esc_html($staff_biography) . '</p>';

								if ($term->slug === 'faculty') {
									echo '<p> Courses: ' . esc_html($staff_course) . '</p>';

									echo '<p><a href="' . esc_url($staff_website) . '">Instructor Website</a></p>';
								}
							}

							wp_reset_postdata();
						}
					}
				}
				?>
			</div>

		</article>
	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
