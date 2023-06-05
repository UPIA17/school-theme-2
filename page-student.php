<?php
/*
 * Template Name: Student Page
 * Template Post Type: page
 */

get_header();

while (have_posts()) :
    the_post();
    ?>

    <!-- Output the page content -->
    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <!-- Output the student's name field value -->
    <h2><?php echo esc_html(get_field('name')); ?></h2>

    <!-- Output the student's biography field value -->
    <p><?php echo esc_html(get_field('biography')); ?></p>

<?php endwhile;

get_footer();
?>