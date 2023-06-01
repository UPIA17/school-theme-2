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

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>



	<!-- RECENT BLOGS -->
	<section class="recent-blog-posts">
		<h2> <?php esc_html_e('Recent Blog Posts', 'school_theme'); ?> </h2>
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
					<article>
						<a href=" <?php the_permalink(); ?>">
							<?php the_post_thumbnail('portrait-blog-crop'); ?>
							<h3> <?php the_title(); ?> </h3>
							<p class="publication-date"> <?php echo get_the_date(); ?> </p>
						</a>
					</article>
			<?php

				}
				wp_reset_postdata();
			}
			?>
		</div>


		<!-- Step 1: Add HTML / PHP (REST API in WordPress) -->
		<?php
		$args  = array(
			'post_type'      => 'post',
			'posts_per_page' => 4,
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
			<div id="modal-window" class="modal-window">
				<button id="close-modal" class="close-modal">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<title><?php _e('Close'); ?></title>
						<path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"></path>
					</svg>
				</button>
				<div id="modal-window-content"></div>
			</div>
			<div id="dimmer"></div>
		<?php endif; ?>
	</section>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
