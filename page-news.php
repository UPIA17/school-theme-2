<?php

/**
 * Template Name: News Template
 *
 * The template for displaying the News page.
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

	endwhile; // End of the loop.
	?>

	<!-- RECENT BLOGS -->
	<section class="recent-blog-posts">
		<h2><?php esc_html_e('Recent Blog Posts', 'school_theme'); ?></h2>
		<div class="container-recent-blog-posts">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4
			);

			$blog_query = new WP_Query($args);
			if ($blog_query->have_posts()) {
				while ($blog_query->have_posts()) {
					$blog_query->the_post();
			?>
					<article class="aos-item" data-aos="fade-up">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('portrait-blog-crop'); ?>
							<h3><?php the_title(); ?></h3>
							<p class="publication-date"><?php echo get_the_date(); ?></p>
							<p><?php the_excerpt(); ?></p>
						</a>
					</article>
			<?php

				}
				wp_reset_postdata();
			}
			?>
		</div>
	</section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
