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






	<section class="footer-logo">
		<?php
		if (function_exists('get_field') && get_field('footer_logo')) {
			$logo_url = get_template_directory_uri() . '/images/wicon.php';
		?>
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo esc_url($logo_url); ?>" alt="Logo">
			</a>
		<?php } ?>
	</section>

