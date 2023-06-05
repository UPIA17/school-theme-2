<?php
/**
 * Template Name: Home Page Template
 *
 * The template for displaying the home page.
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

	endwhile;
	?>

	<!-- Recent Blog Posts -->
	<section class="recent-blog-posts">
		<?php
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
		);
		$query = new WP_Query($args);
		?>
		<?php if ($query->have_posts()) : ?>
			<section class="blog-posts">
				<h2>Recent Blog Posts</h2>
				<div class="blog-posts-grid">
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<article class="blog-post">
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_post_thumbnail('medium'); ?>
								<div class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></div>
							</a>
						</article>
					<?php endwhile; ?>
				</div>
				<p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">See All News</a></p>
			</section>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</section>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
