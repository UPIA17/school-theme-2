<?php
get_header();

while (have_posts()) :
    the_post();
    ?>

    <!-- Output the title with link to single student page -->
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <!-- Output the featured image -->
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>

    <!-- Output the full content -->
    <div class="entry-content">
        <?php the_content(); ?>
    </div>

<?php endwhile;

get_footer();
?>