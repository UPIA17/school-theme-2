<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>



<footer id="colophon" class="site-footer">


	<!-- Add a logo to the footer using an ACF Image field and have the logo link to the homepage. -->
	<!-- CREDIT: https://www.advancedcustomfields.com/resources/image/#display-image-id -->
	<section class="footer-logo">
		<?php
		$image = get_field('footer_logo');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)
		if ($image) {
			echo wp_get_attachment_image($image, $size);
		}
		?>
	</section>


















	<!-- FOOTER NAVIGATION MENU -->
	<nav id="footer-navigation-menu" class="footer-navigation-menu">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-footer-right',
				'menu_id'        => 'footer-right-menu',
			)
		);
		?>
	</nav>


	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'school-theme')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'school-theme'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'school-theme'), 'school-theme', '<a href="http://underscores.me/">Chris Kim, Massa Sakou</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>