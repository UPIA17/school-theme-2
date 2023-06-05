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

    <!-- Output the portfolio URL field -->
    <?php
    $portfolio_url = get_field('portfolio_url');
    if (!empty($portfolio_url) && is_array($portfolio_url)) :
        $portfolio_url = $portfolio_url['url'];
        ?>
        <div class="portfolio-url">
            <a href="<?php echo esc_url($portfolio_url); ?>" target="_blank">Portfolio</a>
        </div>
    <?php endif; ?>

<?php endwhile;

get_footer();
?>
