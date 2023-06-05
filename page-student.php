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
    <div class="student-taxonomy-links">
            <?php
            $terms = get_the_terms(get_the_ID(), 'student_skill');
            if ($terms && !is_wp_error($terms)) {
                echo '<h3>Other Students in the Same Skill:</h3>';
                foreach ($terms as $term) {
                    $term_link = get_term_link($term);
                    $term_name = $term->name;
                    echo '<a href="' . esc_url($term_link) . '">' . esc_html($term_name) . '</a><br>';

                    $term_args = array(
                        'post_type' => 'student',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'student_skill',
                                'field' => 'slug',
                                'terms' => $term->slug,
                            ),
                        ),
                        'exclude' => get_the_ID(), // Exclude the current student
                    );

                    $term_query = new WP_Query($term_args);
                    if ($term_query->have_posts()) {
                        echo '<ul>';
                        while ($term_query->have_posts()) {
                            $term_query->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    wp_reset_postdata();
                }
            }
            ?>
        </div>

<?php endwhile;

get_footer();
?>
