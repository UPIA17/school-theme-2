<?php

/**
 * The template for displaying all pages
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

	// get_template_part('template-parts/content', 'page');

	// If comments are open or we have at least one comment, load up the comment template.
	// if (comments_open() || get_comments_number()) :
	// 	comments_template();
	// endif;

	endwhile; // End of the loop.
	?>


	<h1> <?php the_title(); ?> </h1>

	<section class="home-intro">

		<?php

		if (function_exists('get_field')) {

			if (get_field('home_intro')) {

				echo '<p>';
				the_field('home_intro');
				echo '</p>';
			}

			$image = get_field('intro_poster');
			if ($image) {
				echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
			}
		}

		?>
	</section>


	<div class="container-sections-left-right">
		<section class="home-left">

			<?php

			if (function_exists('get_field')) {

				if (get_field('left_section_heading')) {

					echo '<h2>';
					the_field('left_section_heading');
					echo '</h2>';
				}

				if (get_field('left_section_content')) {

					echo '<p>';
					the_field('left_section_content');
					echo '</p>';
				}
			}

			?>
		</section>

		<section class="home-right">

			<?php

			if (function_exists('get_field')) {

				if (get_field('right_section_heading')) {

					echo '<h2>';
					the_field('right_section_heading');
					echo '</h2>';
				}

				if (get_field('right_section_content')) {

					echo '<p>';
					the_field('right_section_content');
					echo '</p>';
				}
			}

			?>

		</section>

	</div>


	<section class="section-second-poster">

		<?php

		if (function_exists('get_field')) {

			$image_two = get_field('second_poster');
			if ($image_two) {
				echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '">';
			}

			if (get_field('second_poster_paragraph')) {

				echo '<p>';
				the_field('second_poster_paragraph');
				echo '</p>';
			}
		}

		?>
	</section>





	<!-- RECENT BLOGS -->
	<section class="recent-blog-posts">


		<?php
		$args  = array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
		);
		$query = new WP_Query($args);
		?>
		<?php if ($query->have_posts()) : ?>
			<section class="blog-posts entry-content">
				<h2>Recent Blog Posts</h2>
				<?php
				while ($query->have_posts()) :
					$query->the_post();
				?>
					<a href="<?php the_permalink(); ?>" class="open-modal" data-id="<?php echo get_the_ID(); ?>">
						<h3><?php the_title(); ?></h3>
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">See All News</a></p>
			</section>
		<?php endif; ?>





	</section>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
