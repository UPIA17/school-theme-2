FAUX TEST
<section class="footer-logo">
  <?php
  if (function_exists('get_field')) {
    if (get_field('footer_logo')) {
      echo '<a>';
      get_template_part('iamges/wicon');
      the_field('footer_logo');
      echo '</a>';
    }
  }
  ?>
</section>




	<!-- FOOTER LOGO -->

	<div class="footer-logo">
		<a href="<?php echo esc_url(home_url('/')); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/images/wicon2.svg" alt="Wordpress Logo" width="100" height="100">
		</a>
	</div>



	<!-- Add a logo to the footer using WordPress’ Custom Logo feature and have the logo link to the homepage. -->








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
