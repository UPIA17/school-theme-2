
function school_theme_block_editor_templates()
{


	// page: home 45
	if (isset($_GET['post']) && '45' == $_GET['POST']) {
		$post_type_object = get_post_type_object('page');
		$post_type_object->template = array(
			array('core/paragraph'),
			array('core/shortcode')
		);
		$post_type_object->template_lock = 'all';
	}
}
add_action('init', 'school_theme_block_editor_templates');







<section class="home-intro">
		<?php
		$post_id = 39;
		$post = get_post($post_id);
		if ($post) {
			setup_postdata($post);
		?>
			<article <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
				<?php the_post_thumbnail('full-width'); ?>
			</article>
		<?php
			wp_reset_postdata();
		}
		?>
</section>




<?php

/**
 * The template for displaying all staff
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
	?>



		<article id=" post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
						$args = array(
							'post_type' => 'school_theme_staff',
							'post_per_page' => -1,
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
							// output terms name.
							echo '<h3>' . esc_html($term->name) . '</h3>';



							// output Content
							while ($query->have_posts()) {
								$query->the_post();

								if (function_exists('get_field')) {

									if (get_field('staff_name')) {
										echo '<h3 id="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</h3>';
										the_field('staff_name');
									}


									if (get_field('staff_biography')) {
										echo '<p>';
										the_field('staff_biography');
										echo '</p>';
									}


									if (get_field('staff_course')) {

										echo '<p>';
										the_field('staff_course');
										echo '</p>';
									};


									if (get_field('staff_website')) {
										echo '<p>';
										the_field('staff_website');
										echo '</p>';
									}
								}
							}
							wp_reset_postdata();
						};
					};
				};

				?>
			</div>

		</article>
	<?php endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();




