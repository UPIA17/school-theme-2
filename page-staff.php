<?php
get_header();

while (have_posts()) :
    the_post();
    ?>
    <h2><?php the_title(); ?></h2>

    <!-- Output the featured image -->
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php if (get_field('biography')) : ?>
    <p><?php the_field('biography'); ?></p>
    <?php endif; ?>

    <!-- Output the page content -->
    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    

<?php endwhile;

get_footer();
?>
