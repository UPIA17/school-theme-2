/**
 * Enqueue scripts and styles.
 */
function school_theme_scripts()
{
	wp_enqueue_style('school-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('school-theme-style', 'rtl', 'replace');

	wp_enqueue_script('school-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// animate on scroll
	if (is_singular('post')) {

		//enqueue aos css
		wp_enqueue_style('aos-css', get_template_directory_uri() . '/animate-on-scroll/aos.css', array(), '2.3.1', 'all');

		// enqueue aos js
		wp_enqueue_script('aos-js', get_template_directory_uri() . '/animate-on-scroll/aos.js', array('jquery'), '2.3.1', true);

		// initialize settings
		wp_enqueue_script('aos-settings', get_template_directory_uri() . '/animate-on-scroll/aos-settings.js', array('aos-js'), '2.3.1', true);
	}
}
add_action('wp_enqueue_scripts', 'school_theme_scripts');













// // remove the block editor from any pages in the array below
// function school_theme_post_filter($use_block_editor, $post)
// {

// 	$page_ids = array(45); // Remove the block Editor from the Home page id = 45.
// 	if (in_array($post->ID, $page_ids)) {
// 		return false;
// 	} else {

// 		return $use_block_editor;
// 	}
// }
// add_filter('use_block_editor_for_post', 'school_theme_post_filter', 10, 2);





















<!-- HOME PAGE -->




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
